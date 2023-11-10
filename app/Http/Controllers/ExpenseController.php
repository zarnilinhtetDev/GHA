<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function expense()
    {
        $transaction = Transaction::all();
        $expense = Expense::with('transaction')->latest()->get();
        return view('blade.expense.expenses', compact('expense', 'transaction'));
    }

    public function register(Request $request)
    {

        $request->validate([
            'transaction_id' => 'required',
            'expense_date' => 'required',
            'expense_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        ]);

        $expense = new Expense();
        $expense->expense_date = $request->expense_date;
        $expense->expense_description = $request->expense_description;
        $expense->expense_price = $request->expense_price;

        $transaction = Transaction::find($request->input('transaction_id'));

        // if (!$transaction) {
        //     return redirect()->back()->with('error', 'Transaction not found');
        // }

        $transaction->expenses()->save($expense);

        return redirect()->back()->with('success', 'Company Expense Register is Successfull');
    }

    public function delete($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->back()->with('deleteStatus', 'Company Expense Delete is Successfull');
    }



    public function show($id)
    {

        $expenseData = Expense::find($id);
        $transaction = Transaction::all();
        return view('blade.expense.expensesEdit', compact('expenseData', 'transaction'));
    }

    public function update(Request $request, $id)
    {

        $expense = Expense::find($id);
        if ($expense->transaction_id != $request->input('transaction_id')) {
            $expense->account()->associate(Transaction::find($request->input('transaction_id')));
        }
        $expense->update([
            'expense_date' => $request->input('expense_date'),
            'expense_description' => $request->input('expense_description'),
            'expense_price' => $request->input('expense_price'),
        ]);
        return redirect('expense')->with('updateStatus', 'Company Expense Update is Successfull');
    }
    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $expenseCategory = ExpenseCategory::all();


        $companyExpense = Expense::whereDate('expense_date', '>=', $start_date)
            ->whereDate('expense_date', '<=', $end_date)
            ->get();

        $transaction = Transaction::all();

        return view('blade.expense.expenses', compact('companyExpense', 'expenseCategory', 'transaction'));
    }
    public function dailyShow()
    {

        $today = now();
        $todayDate = $today->toDateString();

        $dailyData = DB::table('expenses')
            ->whereDate('expense_date', $todayDate)
            ->get();


        return view('blade.daily_expense.dailyExpense', compact('dailyData'));
    }
}
