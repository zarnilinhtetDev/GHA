<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buy;
use App\Models\Car;
use App\Models\Buyer;
use App\Models\Offer;
use App\Models\AddPayment;
use App\Models\CarExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function carsRegister(Request $request)
    {
        $request->validate([
            "car_type" => "required",
            "car_model" => "required",
            "car_number" => "required",
            "manufacture_year" => "required|integer",
            "License_expire" => "required",
            "car_color" => "required",
            "car_images" => 'required|image|max:1024',


        ], [
            "car_images" => 'Image must be less than 1 MB',
        ]);

        $car = new Car();
        $car->car_type = $request->input('car_type');
        $car->car_model = $request->input('car_model');
        $car->car_number = $request->input('car_number');
        $car->manufacture_year = $request->input('manufacture_year');
        $car->License_expire = $request->input('License_expire');
        $car->car_color = $request->input('car_color');
        $car->description = $request->input('description', '');
        $car_images = $request->file('car_images');
        if ($car_images) {
            $imagename = time() . '.' . $car_images->getClientOriginalExtension();
            $car_images->move('carimage', $imagename);
            $car->car_images = $imagename;
        }


        $car->save();

        return redirect()->back()->with('success', 'Car Registration Successful');
    }

    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->back()->with('deleteStatus', 'Car Delete is Successful');
    }

    public function show($id)
    {
        $carShow = Car::find($id);
        return view('blade.cars.carsEdit', compact('carShow'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        $car->car_type = $request->car_type;
        $car->car_model = $request->car_model;
        $car->car_number = $request->car_number;
        $car->manufacture_year = $request->manufacture_year;
        $car->License_expire = $request->License_expire;

        $car->car_color = $request->car_color;
        $car->description = $request->description;

        $car_images = $request->file('car_images');
        if ($car_images) {
            $imagename = time() . '.' . $car_images->getClientOriginalExtension();
            $car_images->move('carimage', $imagename);
            $car->car_images = $imagename;
        }

        $car->update();

        return redirect('/dashboard')->with('updateStatus', 'Car Update is Successful');
    }
    public function car_detail($id)
    {
        $carDetail = Car::find($id);
        $buyprice = Buy::where('car_id', $carDetail->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $offerprice =
            Offer::where('car_id', $carDetail->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $carstatus = Buyer::where('car_id', $carDetail->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $carexpenses = CarExpense::all();
        return view('blade.cars.carDetail', compact('carDetail', 'buyprice', 'offerprice', 'carstatus', 'carexpenses'));
    }



    public function soldcar()
    {
        $buyers = Buyer::with('car')
            ->latest()
            ->get();

        $profits = [];
        $total_payments = [];
        foreach ($buyers as $buyer) {
            $car = $buyer->car;


            $buyprice = Buy::select('buys.price')
                ->join('cars', 'car_id', '=', 'cars.id')
                ->where('cars.id', $car->id)
                ->first();
            $payment = Car::select(
                DB::raw('SUM(add_payments.add_payment)as tot_payment')
            )
                ->leftJoin('add_payments', 'cars.id', '=', 'add_payments.car_id')
                ->where('cars.id', $car->id)
                ->groupBy('cars.car_type', 'cars.car_model', 'cars.car_number')
                ->first();

            $data = Car::select(
                DB::raw('SUM(car_expenses.expense_price) as total_expense_price', 'SUM(add_payments.add_payment)as tot_payment')
            )
                ->join('buys', 'cars.id', '=', 'buys.car_id')
                ->join('buyers', 'cars.id', '=', 'buyers.car_id')
                ->leftJoin('car_expenses', 'cars.id', '=', 'car_expenses.car_id')
                ->leftJoin('add_payments', 'cars.id', '=', 'add_payments.car_id')
                ->where('cars.id', $car->id)
                ->groupBy('cars.car_type', 'cars.car_model', 'cars.car_number')
                ->first();

            $profit = $buyer->selling - ($buyprice ? $buyprice->price : 0) - ($data ? $data->total_expense_price : 0);

            $profits[$car->id] = $profit;

            $selling = is_numeric($buyer->selling) ? $buyer->selling : 0;
            $buyer_payment = is_numeric($buyer->payment) ? $buyer->payment : 0;
            $payment_total = is_numeric($payment->tot_payment) ? $payment->tot_payment : 0;

            // Perform the arithmetic operation
            $total_payment = $selling - ($buyer_payment + $payment_total);
            $total_payments[$car->id] = $total_payment;
        }

        return view('blade.cars.Sold_Out', compact('buyers', 'profits', 'total_payments'));
    }


    public function Soldout_Detail($id)
    {
        $buyer = Buyer::where('car_id', $id)->orderBy('created_at', 'desc')->first();
        $cardata = Car::find($id);
        $buy = Buy::where('car_id', $cardata->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $pay = AddPayment::find($id);
        $carExpenses = CarExpense::where('car_id', $cardata->id)->get();
        $totalExpense = $carExpenses->sum('expense_price');
        // $totalAmount = AddPayment::sum('add_payment');
        $totalAmount = AddPayment::groupBy('car_id')
            ->select(DB::raw('SUM(add_payment) as total_amount'))->where('car_id', $cardata->id)
            ->get();
        // return $totalAmount;
        return view('blade.cars.Sold_Out_Detail', compact('buyer', 'cardata', 'buy', 'pay', 'totalExpense', 'totalAmount'));
    }
    public function filterData(Request $request)
    {
        $buyers = Buyer::with('car')
            ->latest()
            ->get();

        $profits = [];

        foreach ($buyers as $buyer) {
            $car = $buyer->car;


            $buyprice = Buy::select('buys.price')
                ->join('cars', 'car_id', '=', 'cars.id')
                ->where('cars.id', $car->id)
                ->first();


            $data = Car::select(
                DB::raw('SUM(car_expenses.expense_price) as total_expense_price')
            )
                ->join('buys', 'cars.id', '=', 'buys.car_id')
                // ->join('buyers', 'cars.id', '=', 'buyers.car_id')
                ->leftJoin('car_expenses', 'cars.id', '=', 'car_expenses.car_id')
                ->where('cars.id', $car->id)
                // ->groupBy('cars.car_type', 'cars.car_model', 'cars.car_number')
                ->first();

            $profit = ($buyer ? $buyer->selling : 0) - ($buyprice ? $buyprice->price : 0) - ($data ? $data->total_expense_price : 0);

            $profits[$car->id] = $profit;
        }
        $start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');

        $soldoutData = Buyer::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();


        return view('blade.cars.Sold_Out', compact('soldoutData', 'profits', 'buyers'));
    }
    public function search(Request $request)
    {

        $keyword = $request->search;



        $buyer = Buyer::where('car_number', 'LIKE', "%$keyword%")
            ->orWhere('buyer_ph', 'LIKE', "%$keyword%")
            ->get();




        $profits = [];
        $total_payments = [];
        foreach ($buyer as $buyers) {
            $car = $buyers->car;


            $buyprice = Buy::select('buys.price')
                ->join('cars', 'car_id', '=', 'cars.id')
                ->where('cars.id', $car->id)
                ->first();

            $data = Car::select(
                DB::raw('SUM(car_expenses.expense_price) as total_expense_price'),
                DB::raw('SUM(add_payments.add_payment) as total_payment_amount')
            )
                ->join('buys', 'cars.id', '=', 'buys.car_id')
                ->join('buyers', 'cars.id', '=', 'buyers.car_id')
                ->leftJoin('car_expenses', 'cars.id', '=', 'car_expenses.car_id')
                ->leftJoin('add_payments', 'cars.id', '=', 'add_payments.car_id') // Assuming 'add_payments.car_id' links to 'cars.id'
                ->where('cars.id', $car->id)
                ->groupBy('cars.car_type', 'cars.car_model', 'cars.car_number')
                ->first();

            $profit = $buyers->selling - ($buyprice ? $buyprice->price : 0) - ($data ? $data->total_expense_price : 0);

            $profits[$car->id] = $profit;

            // $total_payment = $buyers->selling - ($buyers->payment + optional($data)->total_payment_amount);
            // $total_payment = $buyer->selling - ($buyer->payment + $payment->tot_payment);
            $selling = is_numeric($buyer->selling) ? $buyer->selling : 0;
            $buyer_payment = is_numeric($buyer->payment) ? $buyer->payment : 0;
            $payment_total = is_numeric(optional($data)->total_payment_amount->tot_payment) ? optional($data)->total_payment_amount : 0;

            // Perform the arithmetic operation
            $total_payment = $selling - ($buyer_payment + $payment_total);
            $total_payments[$car->id] = $total_payment;
        }




        return view('blade.cars.Sold_Out', compact('buyer', 'profits', 'total_payments'));
    }

}
