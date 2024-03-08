<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use App\Models\Setting;
use Illuminate\Http\Request;

class BuyController extends Controller
{

    public function buying_price(Request $request, $id)
    {

        $validation = request()->validate([
            'price' => 'required'
        ]);
        $carId = $request->input('car_id');
        $car = Car::find($id);
        $setting = Setting::find(2);
        if ($car) {
            $buy = new Buy($validation);
            $buy->car_id = $car->id;
            $buy->transaction_id = $setting->transaction_id;

            $buy->save();
        }

        return redirect()->back()->with('offerSuccess', 'Add Buying Price is Successful');
    }
    public function deleteCarPrice($carId)
    {
        // Find the car by its ID
        $car = Buy::where('car_id', $carId)->orderBy('created_at', 'desc')->first();

        if (!$car) {
            return redirect()->back()->with('deleteStatus', 'Car not found.');
        } else
            $car->delete();

        return redirect()->back()->with('deleteStatus', 'Car expense price deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $car = Buy::where('car_id', $id)->orderBy('created_at', 'desc')->first();
        if (isset($request->price)) {
            $car->price = $request->price;
            $car->save();
            return redirect()->back()->with('success', 'Buying Price Update is Successfull');
        } else {
            return redirect()->back()->with('error', 'Buying Price cannot be null');
        }
    }
}
