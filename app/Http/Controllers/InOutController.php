<?php

namespace App\Http\Controllers;

use App\Models\InOut;
use App\Models\Transaction;
use Illuminate\Http\Request;

class InOutController extends Controller
{
    public function inRegister(Request $request)
    {
        $request->validate([
            "date" => "required",
            "price" => "required",
            "transaction_id" => "required"
        ], ["transaction_id" => "Please choose  transaction name"]);

        $list = new InOut();
        $list->date = $request->input('date');
        $list->price = $request->input('price');
        $list->description = $request->input('description');
        $tran = Transaction::find($request->input('transaction_id'));
        $tran->inout()->save($list);


        return redirect()->back()->with('success', 'ရရန် Register is Successfull');
    }

    public function outRegister(Request $request)
    {
        $request->validate([
            "out_date" => "required",
            "out_price" => "required",
            "transaction_id" => "required"
        ], ["transaction_id" => "Please choose a transaction name"]);

        $inoutList = new InOut();
        $inoutList->out_date = $request->input('out_date');
        $inoutList->out_price = $request->input('out_price');
        $inoutList->out_description = $request->input('out_description');
        $transaction = Transaction::find($request->input('transaction_id'));
        $transaction->inout()->save($inoutList);

        return redirect()->back()->with('success', 'ပေးရန် Register is Successfull');
    }
    public function inout()
    {

        $transaction = Transaction::all();
        $inouts = InOut::with('transaction')->latest()->get();
        return view('blade.inout.inout', compact('inouts', 'transaction'));
    }

    // public function out()
    // {
    //     $out = InOut::all();
    //     return view('blade.inout.inout', compact('out'));
    // }


    public function show($id)
    {
        $inout = InOut::find($id);
        $transaction = Transaction::latest()->get();
        return view('blade.inout.inout_edit', compact('inout', 'transaction'));
    }

    public function outShow($id)
    {
        $out = InOut::find($id);
        $transaction = Transaction::all();
        return view('blade.inout.out_edit', compact('out', 'transaction'));
    }
    public function delete($id)
    {
        $inout = InOut::find($id);
        $inout->delete();
        return redirect()->back()->with('deleteStatus', 'InOut Delete is Successfull');
    }

    public function update(Request $request, $id)
    {
        $inout = InOut::find($id);
        if ($inout->transaction_id != $request->input('transaction_id')) {
            $inout->transaction()->associate(Transaction::find($request->input('transaction_id')));
        }

        $inout->date = $request->date;
        $inout->price = $request->price;
        $inout->description = $request->description;

        $inout->update();

        return redirect('/inout')->with('updateStatus', ' ရရန် Update is Successfull');
    }

    public function outUpdate(Request $request, $id)
    {
        $inout = InOut::find($id);
        if ($inout->transaction_id != $request->input('transaction_id')) {
            $inout->transaction()->associate(Transaction::find($request->input('transaction_id')));
        }
        $inout->out_date = $request->out_date;
        $inout->out_price = $request->out_price;
        $inout->out_description = $request->out_description;

        $inout->update();

        return redirect('/inout')->with('updateStatus', ' ‌ပေးရန် Update is Successfull');
    }
}
