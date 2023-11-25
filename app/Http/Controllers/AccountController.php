<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account()
    {
        return view('blade.account.account');
    }

    public function accountRegister(Request $request)
    {

        request()->validate([
            "account_code" => "required",
            "account_name" => "required",
        ]);
        $accountData = new Account();
        $accountData->account_code = $request->account_code;
        $accountData->account_name = $request->account_name;
        // $accountData->description = $request->description;

        $accountData->save();
        return redirect()->back()->with('success', 'Account Register is Successfull');
    }

    public function accountStore()
    {
        $accountList = Account::latest()->get();
        return view('blade.account.account', compact('accountList'));
    }

    public function delete($id)
    {
        $account = Account::find($id);
        $account->delete();
        return redirect()->back()->with('deleteStatus', 'Account Delete is Successfull');
    }

    public function show($id)
    {
        $accounts = Account::find($id);
        return view('blade.account.accountsEdit', compact('accounts'));
    }

    public function update(Request $request, $id)
    {

        $account = Account::find($id);
        $account->update($request->all());
        return redirect('account')->with('updateStatus', 'Account Update is Successfull');
    }
}
