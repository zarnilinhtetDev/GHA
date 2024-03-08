<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $transactions = Transaction::latest()->get();
        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function car_sale(Request $request)
    {


        $sale = Setting::find(1);
        $sale->transaction_id = $request->transaction_id;
        $sale->save();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function car_saleEdit(Request $request)
    {

        $sale = Setting::find(1);
        $sale->transaction_id = $request->transaction_id;
        $sale->update();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function car_buy(Request $request)
    {


        $sale = Setting::find(2);
        $sale->transaction_id = $request->transaction_id;
        $sale->save();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function car_buyEdit(Request $request)
    {

        $sale = Setting::find(2);
        $sale->transaction_id = $request->transaction_id;
        $sale->update();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function car_expense(Request $request)
    {


        $car_expense = Setting::find(3);
        $car_expense->transaction_id = $request->transaction_id;
        $car_expense->save();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function car_expenseEdit(Request $request)
    {

        $car_expense = Setting::find(3);
        $car_expense->transaction_id = $request->transaction_id;
        $car_expense->update();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function company_expense(Request $request)
    {


        $company_expense = Setting::find(4);
        $company_expense->transaction_id = $request->transaction_id;
        $company_expense->save();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function company_expenseEdit(Request $request)
    {

        $company_expense = Setting::find(4);
        $company_expense->transaction_id = $request->transaction_id;
        $company_expense->update();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function car_balance_payment(Request $request)
    {


        $car_buy_payment = Setting::find(5);
        $car_buy_payment->transaction_id = $request->transaction_id;
        $car_buy_payment->save();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);
        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
    public function car_balance_paymentEdit(Request $request)
    {

        $car_buy_payment = Setting::find(5);
        $car_buy_payment->transaction_id = $request->transaction_id;
        $car_buy_payment->update();
        $transactions = Transaction::latest()->get();

        $sale_setting = Setting::with('transaction')->find(1);
        $buy_setting = Setting::with('transaction')->find(2);
        $car_expense_setting = Setting::with('transaction')->find(3);
        $company_expense_setting = Setting::with('transaction')->find(4);
        $car_buy_payment_setting = Setting::with('transaction')->find(5);

        return view('blade.setting.setting', compact('transactions', 'sale_setting', 'buy_setting', 'car_expense_setting', 'company_expense_setting', 'car_buy_payment_setting'));
    }
}
