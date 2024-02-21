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
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MonthlyReportController extends Controller
{
    public function index()


    {

        $car = Car::whereMonth('created_at', Carbon::now()->month)
            ->get();
        $total_car = count($car);

        $total_expense = 0;
        $total_buy_price = 0;
        $total_sell_price = 0;
        $total_company_income = 0;
        $total_company_expense = 0;
        $total_in = 0;
        $total_out = 0;

        $car = Car::whereMonth('created_at', Carbon::now()->month)
            ->get();
        $total_car = count($car);

        $soldout_cars = Buyer::whereMonth('created_at', Carbon::now()->month)
            ->get();
        $total_sold_out_car = count($soldout_cars);

        $expenses = CarExpense::whereMonth('created_at', Carbon::now()->month)
            ->get();
        foreach ($expenses as $expense)
            $total_expense += $expense->expense_price;

        $buy_prices = Buy::whereMonth('created_at', Carbon::now()->month)
            ->get();
        foreach ($buy_prices as $buy_price)
            $total_buy_price += $buy_price->price;

        foreach ($soldout_cars as $soldout_car)
            $total_sell_price += $soldout_car->selling;

        $total_profit = $total_sell_price - ($total_buy_price + $total_expense);

        $company_incomes = CompanyIncome::whereMonth('created_at', Carbon::now()->month)
            ->get();
        foreach ($company_incomes as $company_income)
            $total_company_income += $company_income->company_price;

        $company_expenses = Expense::whereMonth('created_at', Carbon::now()->month)
            ->get();
        foreach ($company_expenses as $company_expense)
            $total_company_expense += $company_expense->expense_price;

        $total_company_profit = $total_company_income - $total_company_expense;

        $ins = InOut::whereMonth('out_date', Carbon::now()->month)
            ->get();
        foreach ($ins as $in)
            $total_in += $in->out_price;
        $outs = InOut::whereMonth('date', Carbon::now()->month)
            ->get();
        foreach ($outs as $out)
            $total_out += $out->price;

        return view('blade.monthly_report.monthly_report', compact('total_car', 'total_sold_out_car', 'total_expense', 'total_buy_price', 'total_sell_price', 'total_profit', 'total_company_income', 'total_company_expense', 'total_company_profit', 'total_in', 'total_out'));
    }

    public function search(Request $request)
    {

        $start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');

        $total_expense = 0;
        $total_buy_price = 0;
        $total_sell_price = 0;
        $total_company_income = 0;
        $total_company_expense = 0;
        $total_in = 0;
        $total_out = 0;

        $car = Car::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
        $total_car = count($car);
        $soldout_cars = Buyer::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
        $total_sold_out_car = count($soldout_cars);

        $expenses = CarExpense::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
        foreach ($expenses as $expense)
            $total_expense += $expense->expense_price;

        $buy_prices = Buy::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
        foreach ($buy_prices as $buy_price)
            $total_buy_price += $buy_price->price;

        foreach ($soldout_cars as $soldout_car)
            $total_sell_price += $soldout_car->selling;

        $total_profit = $total_sell_price - ($total_buy_price + $total_expense);

        $company_incomes = CompanyIncome::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
        foreach ($company_incomes as $company_income)
            $total_company_income += $company_income->company_price;

        $company_expenses = Expense::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
        foreach ($company_expenses as $company_expense)
            $total_company_expense += $company_expense->expense_price;

        $total_company_profit = $total_company_income - $total_company_expense;
        $ins = InOut::whereDate('out_date', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
        foreach ($ins as $in)
            $total_in += $in->out_price;
        $outs = InOut::whereDate('date', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
        foreach ($outs as $out)
            $total_out += $out->price;

        return view('blade.monthly_report.monthly_report', compact('total_car', 'total_sold_out_car', 'total_expense', 'total_buy_price', 'total_sell_price', 'total_profit', 'total_company_income', 'total_company_expense', 'total_company_profit', 'total_in', 'total_out'));
    }
}
