<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use App\Models\Buyer;
use App\Models\Expense;
use App\Models\AddPayment;
use App\Models\CarExpense;
use App\Models\CompanyIncome;
use App\Models\InOut;
use App\Models\Account;
use App\Models\Transaction;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MonthlyReportController extends Controller
{
    public function index()
    {
        return view('blade.monthly_report.monthly_report');
    }

    public function car_report()
    {
        $expense = [];
        $cars = Car::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        $buyers = Buyer::with('car')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->latest()
            ->get();
        // foreach ($cars as $car) {
        //     $expenses = DB::table('cars')
        //         ->select(
        //             'cars.id',
        //             DB::raw('SUM(car_expenses.expense_price) as total_expense_price')
        //         )
        //         ->join('car_expenses', 'cars.id', '=', 'car_expenses.car_id')
        //         ->groupBy('cars.id')
        //         ->get();
        // }// Query to get total expenses for each car
        $expensesData = DB::table('cars')
            ->join('car_expenses', 'cars.id', '=', 'car_expenses.car_id')
            ->select(
                'cars.id',
                DB::raw('SUM(car_expenses.expense_price) as total_expense_price')
            )->whereMonth('car_expenses.created_at', Carbon::now()->month)
            ->groupBy('cars.id')
            ->get();


        $expensesByCarId = [];

        foreach ($expensesData as $expense) {
            $expensesByCarId[$expense->id] = $expense->total_expense_price;
        }





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
            // $total_payment = $buyer->selling - ($buyer->payment + $payment->tot_payment);
            $selling = is_numeric($buyer->selling) ? $buyer->selling : 0;
            $buyer_payment = is_numeric($buyer->payment) ? $buyer->payment : 0;
            $payment_total = is_numeric($payment->tot_payment) ? $payment->tot_payment : 0;

            // Perform the arithmetic operation
            $total_payment = $selling - ($buyer_payment + $payment_total);
            $total_payments[$car->id] = $total_payment;
        }
        return view('blade.monthly_report.car_report', compact('cars', 'buyers', 'profits', 'total_payments', 'expensesByCarId'));
    }


    public function filterData(Request $request)
    {



        $buyers = Buyer::with('car')
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
            // $total_payment = $buyer->selling - ($buyer->payment + $payment->tot_payment);

            $selling = is_numeric($buyer->selling) ? $buyer->selling : 0;
            $buyer_payment = is_numeric($buyer->payment) ? $buyer->payment : 0;
            $payment_total = is_numeric($payment->tot_payment) ? $payment->tot_payment : 0;

            // Perform the arithmetic operation
            $total_payment = $selling - ($buyer_payment + $payment_total);

            $total_payments[$car->id] = $total_payment;
        }
        $start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');
        $filterData = Car::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        $start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');

        $expensesData = DB::table('cars')
            ->join('car_expenses', 'cars.id', '=', 'car_expenses.car_id')
            ->select(
                'cars.id',
                DB::raw('SUM(car_expenses.expense_price) as total_expense_price')
            )
            ->whereBetween('car_expenses.created_at', [$start_date, $end_date])
            ->groupBy('cars.id')
            ->get();



        $expensesByCarId = [];

        foreach ($expensesData as $expense) {
            $expensesByCarId[$expense->id] = $expense->total_expense_price;
        }

        return view('blade.monthly_report.car_report', compact('filterData', 'profits', 'buyers', 'expensesByCarId'));
    }
    public function account_report()
    {

        $accounts = Account::whereMonth('created_at', Carbon::now()->month)
            ->with(['transaction' => function ($query) {
                $query->whereMonth('created_at', Carbon::now()->month);
            }])
            ->get();
        $sumByin = Transaction::where('status', 'in')
            ->groupBy('account_id')
            ->selectRaw('account_id, SUM(transaction_code) as total')
            ->pluck('total', 'account_id');

        $sumByout = Transaction::where('status', 'out')
            ->groupBy('account_id')
            ->selectRaw('account_id, SUM(transaction_code) as total')
            ->pluck('total', 'account_id');

        $balance = [];

        foreach ($sumByin as $accountId => $totalIn) {
            $totalOut = $sumByout[$accountId] ?? 0;
            $balance[$accountId] = $totalIn - $totalOut;
        }
        return view('blade.monthly_report.account_report', compact('accounts', 'sumByin', 'sumByout', 'balance'));
    }

    public function transactions($id)
    {
        $transactions = Transaction::where('account_id', $id)->get();

        $account = Account::find($id);
        return view('blade.monthly_report.account_transaction', compact('transactions', 'account'));
    }
}
