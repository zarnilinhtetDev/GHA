<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction()
    {
        $account = Account::all();
        $transaction = Transaction::with('account')->latest()->get();
        return view('blade.transaction.transaction', compact('account', 'transaction'));
    }
    // public function store()
    // {

    //     return view('blade.transaction.transaction', compact('transaction'));
    // }

    public function register(Request $request)
    {


        $request->validate([
            "transaction_code" => "required",
            "transaction_name" => "required",
            "account_id" => "required",
        ], ["account_id" => "The account name is required."]);

        $trasaction = new Transaction();
        $trasaction->transaction_code = $request->transaction_code;
        $trasaction->transaction_name = $request->transaction_name;
        $trasaction->description = $request->description;

        $account = Account::find($request->input('account_id'));

        $account->transaction()->save($trasaction);
        return redirect()->back()->with("success", "Transaction Register is Successfull");
    }

    public function delete($id)
    {

        Transaction::find($id)->delete();
        return redirect()->back()->with("deleteStatus", "Transaction Delete is Successfull");
    }

    public function show($id)
    {
        $accounts = Account::all();
        $transaction = Transaction::find($id);
        return view('blade.transaction.transactionEdit', compact('accounts', 'transaction'));
    }

    public function update(Request $request, $id)
    {

        $transaction = Transaction::find($id);
        // $transaction->transaction_code = $request->transaction_code;
        // $transaction->transaction_name = $request->transaction_name;
        // $transaction->description = $request->description;

        if ($transaction->account_id != $request->input('account_id')) {
            $transaction->account()->associate(Account::find($request->input('account_id')));
        }
        $transaction->update([
            'transaction_code' => $request->input('transaction_code'),
            'transaction_name' => $request->input('transaction_name'),
            'description' => $request->input('description'),
        ]);
        return redirect('transaction')->with('updateStatus', 'Transaction Update is Successfull');
    }
}
