<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use App\Models\Setting;
use App\Models\CarExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarExpenseController extends Controller
{
    public function car_expense($id)
    {
        $car = Car::findOrFail($id);
        $buy = Buy::where('car_id', $car->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $expenses = CarExpense::latest()->get();

        return view('blade.cars.carExpense', compact('car', 'expenses', 'buy'));
    }

    public function car_expense_store(Request $request, $id)
    {
        $data = $request->validate([
            'description' => 'required',
            'expense_price' => 'required|numeric',
        ]);
        $setting = Setting::find(3);
        $car = Car::findOrFail($id);

        $carExpense = new CarExpense($data);
        $carExpense->transaction_id = $setting->transaction_id;

        $car->carExpenses()->save($carExpense);

        return redirect()->back()->with('success', 'Car expense added successfully');
    }
    public function delete($id)
    {

        $expense = CarExpense::findOrFail($id);
        $expense->delete();

        return redirect()->back()->with('deleteStatus', 'Expense deleted successfully');
    }
   

    public function expense_edit($id){

        $carExpense = CarExpense::where('id', $id)->first();
        $car= Car::where('id',$carExpense->car_id)->first();
        return view('blade.cars.carExpenseEdid',compact('car','carExpense'));
    }

     public function car_expense_update(Request $request, $id)
    {
        $data = $request->validate([
            'description' => 'required',
            'expense_price' => 'required|numeric',
        ]);
        $carExpense = CarExpense::find($id);
        $carExpense->update($data);

        return redirect()->route('edit.expense', ['id' => $id])->with('updateStatus', 'Car Expense updated successfully');


    }
}