<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        $company_expenses = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_balance_payments = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_expenses = Setting::whereNotNull('car_expense')
            ->orderBy('updated_at', 'desc')
            ->first();

        $transactions = Transaction::latest()->get();
        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys', 'company_expenses', 'car_balance_payments', 'car_expenses'));
    }
    public function car_sale(Request $request)
    {
        $car_sale = Setting::whereNotNull('car_sale')
            ->orderBy('created_at', 'desc')
            ->first();
        if (!isset($car_sale)) {
            $car_sale = new Setting();
            $car_sale->fill($request->all());
            $car_sale->save();
        }
        $transactions = Transaction::latest()->get();

        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('created_at', 'desc')
            ->first();
        // return $car_sales;
        // Add $car_sales to the session flash data
        // return redirect('setting')->with('car_sales', $car_sales);


        return view('blade.setting.setting', compact('transactions', 'car_sales'));
    }
    public function car_saleEdit(Request $request)
    {
        $car_sale = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_sale->car_sale = $request->car_sale;
        $car_sale->update();
        $transactions = Transaction::latest()->get();

        $company_expenses = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();


        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_balance_payments = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_expenses = Setting::whereNotNull('car_expense')
            ->orderBy('updated_at', 'desc')
            ->first();

        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys', 'company_expenses', 'car_balance_payments', 'car_expenses'));
    }
    public function car_buy(Request $request)
    {
        $car_buy = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        if (!isset($car_buy)) {
            $car_buy = new Setting();
            $car_buy->fill($request->all());
            $car_buy->save();
        }
        $transactions = Transaction::latest()->get();

        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();


        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys'));
    }
    public function car_buyEdit(Request $request)
    {
        $car_buy = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        // return $request;
        $car_buy->car_buy = $request->car_buy;
        $car_buy->update();
        $transactions = Transaction::latest()->get();

        $company_expenses = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();


        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_balance_payments = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_expenses = Setting::whereNotNull('car_expense')
            ->orderBy('updated_at', 'desc')
            ->first();

        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys', 'company_expenses', 'car_balance_payments', 'car_expenses'));
    }


    public function company_expense(Request $request)
    {
        $company_expense = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        if (!isset($company_expense)) {

            $company_expense = new Setting();
            $company_expense->fill($request->all());
            $company_expense->save();
        }
        $transactions = Transaction::latest()->get();

        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();


        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        $company_expenses = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys', 'company_expenses'));
    }
    public function company_expenseEdit(Request $request)
    {

        $company_expense = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();

        $company_expense->company_expense = $request->company_expense;
        $company_expense->update();
        $transactions = Transaction::latest()->get();

        $company_expenses = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();


        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_balance_payments = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_expenses = Setting::whereNotNull('car_expense')
            ->orderBy('updated_at', 'desc')
            ->first();

        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys', 'company_expenses', 'car_balance_payments', 'car_expenses'));
    }
    public function car_balance_payment(Request $request)
    {
        $car_balance_payment = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();
        if (!isset($car_balance_payment)) {

            $car_balance_payment = new Setting();
            $car_balance_payment->fill($request->all());
            $car_balance_payment->save();
        }
        $transactions = Transaction::latest()->get();
        $company_expenses = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();


        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_balance_payments = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();
        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys', 'company_expenses', 'car_balance_payments'));
    }
    public function car_balance_paymentEdit(Request $request)
    {

        $car_balance_payment = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();

        $car_balance_payment->car_balance_payment = $request->car_balance_payment;
        $car_balance_payment->update();
        $transactions = Transaction::latest()->get();

        $company_expenses = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();


        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_balance_payments = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_expenses = Setting::whereNotNull('car_expense')
            ->orderBy('updated_at', 'desc')
            ->first();

        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys', 'company_expenses', 'car_balance_payments', 'car_expenses'));
    }
    public function car_expense(Request $request)
    {

        $car_expense = Setting::whereNotNull('car_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        if (!isset($car_expense)) {
            $car_expense = new Setting();
            $car_expense->fill($request->all());
            $car_expense->save();
        }
        $transactions = Transaction::latest()->get();

        $company_expenses = Setting::whereNotNull('company_expense')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_sales = Setting::whereNotNull('car_sale')
            ->orderBy('updated_at', 'desc')
            ->first();


        $car_buys = Setting::whereNotNull('car_buy')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_balance_payments = Setting::whereNotNull('car_balance_payment')
            ->orderBy('updated_at', 'desc')
            ->first();
        $car_expenses = Setting::whereNotNull('car_expense')
            ->orderBy('updated_at', 'desc')
            ->first();

        return view('blade.setting.setting', compact('transactions', 'car_sales', 'car_buys', 'company_expenses', 'car_balance_payments', 'car_expenses'));
    }
    public function car_expenseEdit(Request $request)
    {

        $car_expense = Setting::whereNotNull('car_expense')
            ->orderBy('updated_at', 'desc')
            ->first();

        $car_expense->car_expense = $request->car_expense;
        $car_expense->update();
        return redirect()->back();
    }
}
