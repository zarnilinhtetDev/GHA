<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use App\Models\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function transaction()
    {
        $account = Account::all();
        $transaction = Transaction::with('account')->latest()->get();
        $sumByIn = Payment::where('status', 'in')
            ->groupBy('transaction_id')
            ->selectRaw('transaction_id, SUM(amount) as total')
            ->pluck('total', 'transaction_id');
        $sumByOut = Payment::where('status', 'out')
            ->groupBy('transaction_id')
            ->selectRaw('transaction_id, SUM(amount) as total')
            ->pluck('total', 'transaction_id');
        $diff = collect($sumByIn)->map(function ($totalIn, $transactionId) use ($sumByOut) {
            $totalOut = $sumByOut->get($transactionId, 0);

            return $totalIn - $totalOut;
        });


        return view('blade.transaction.transaction', compact('account', 'transaction', 'diff'));
    }
    public function register(Request $request)
    {
        $request->validate([
            "transaction_code" => "required",
            "transaction_name" => "required",
            "status" => "required",
            "account_id" => "required",


        ], ["account_id" => "The account name is required."]);
        // $payment = new Payment();
        // $transactions = Transaction::all();

        // $payment->transaction_id = count($transactions) + 1;
        // $payment->description = 'Opening Amount';
        // $payment->amount = $request->transaction_code;
        // $payment->status = $request->status;
        // $account = Account::find($request->input('account_id'));
        // // dd($account);
        // // $account->payment()->save($payment);
        // $payment->account_id = $account->account_name;
        // $payment->save();

        $trasaction = new Transaction();
        $trasaction->transaction_code = $request->transaction_code;
        $trasaction->transaction_name = $request->transaction_name;
        $trasaction->status = $request->status;


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


        if ($transaction->account_id != $request->input('account_id')) {
            $transaction->account()->associate(Account::find($request->input('account_id')));
        }
        $transaction->update([
            'transaction_code' => $request->input('transaction_code'),
            'transaction_name' => $request->input('transaction_name'),
            'status' => $request->input('status'),            'description' => $request->input('description'),
        ]);
        return redirect('transaction')->with('updateStatus', 'Transaction Update is Successfull');
    }
    public function payment($id)
    {
        $accounts = Account::all();
        $transaction = Transaction::find($id);
        $payment = Payment::where('transaction_id', $id)->get();
        return view('blade.transaction.transaction_payment', compact('accounts', 'transaction', 'payment'));
    }
    public function payment_register(Request $request, $id)
    {
        $data = new Payment();
        $data->fill($request->all());
        $data->save();

        return redirect()->back()->with('success', 'Payment created successfully');
    }
    public function payment_delete($id)
    {
        $delete = payment::find($id);
        $delete->delete();
        return back()->with('deleteStatus', 'Payment Delete Successful');
    }
    public function payment_edit($id)
    {
        $show = Payment::find($id);
        return view('blade.transaction.transaction_payment_edit', compact('show'));
    }
    public function payment_update(Request $request, $id)
    {
        $update = Payment::find($id);
        $update->status = $request->input('status');
        $update->amount = $request->input('amount');
        $update->description = $request->input('description');
        $update->save();
        return back()->with('updateStatus', 'Payment Update Successful');
    }
}
