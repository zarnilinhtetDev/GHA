<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use App\Models\Offer;
use App\Models\Expense;

use App\Models\CarExpense;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ExpenseCategory;

class CarCompanyController extends Controller
{
    public function show()
    {
        $car_expenses = CarExpense::all();
        $company_expenses = Expense::all();
        $car = Car::all();
        // return $company_expenses->all();

        return view('blade.car_company_expense.car_company_expnese', compact('car_expenses', 'company_expenses', 'car'));
    }

    public function filter(Request $request)
    {

        $start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');

        $car_expenses = CarExpense::all();

        // Use Eloquent query to filter records by date range
        $search_company_expenses = Expense::whereDate('expense_date', '>=', $start_date)
            ->whereDate('expense_date', '<=', $end_date)
            ->get();

        return view('blade.car_company_expense.car_company_expnese', compact('car_expenses', 'search_company_expenses'));
    }
}
