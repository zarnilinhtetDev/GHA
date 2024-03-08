<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Buyer;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuyerController extends Controller
{
    public function buyingcar(Request $request, $id)
    {
        $data = $request->validate([
            'buyer_name' => 'required',
            'selling' => 'required',
            'payment' => 'required',
            'balance' => 'required',
            'buyer_ph' => 'required',
            'document' => 'required|file|mimes:jpeg,png,pdf|max:1024'
        ], ['document' => 'Document must be less than 1 MB']);
        $setting = Setting::find(1);
        $buyer = new Buyer($data);
        $buyer->transaction_id = $setting->transaction_id;
        $buyer->car_id = $id;
        $buyer->car_number = $request->car_number;

        $buyer->buyer_name = $request->input('buyer_name');
        $buyer->selling = $request->input('selling');
        $buyer->payment = $request->input('payment');
        $buyer->balance = $request->balance;
        $buyer->buyer_ph = $request->input('buyer_ph');


        // $document = $request->file('document');
        // if ($document) {
        //     $imagename = time() . '.' . $document->getClientOriginalExtension();
        //     $document->store('documentphoto');
        //     $buyer->document = 'documentphoto/' . $imagename;

        $document = $request->file('document');
        if ($document) {
            $imagename = time() . '.' . $document->getClientOriginalExtension();
            $document->move('documentUpload', $imagename);
            $buyer->document = $imagename;
        }
        // return $request->all();
        $buyer->save();
        return redirect()->back()->with('soldout', 'Car is Sold Out');
    }
}
