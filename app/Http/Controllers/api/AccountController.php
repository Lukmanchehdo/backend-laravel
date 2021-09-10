<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $account = Account::orderBy('id', 'ASC')->get();
        return response()->json([
            'account' => $account,
            'status' => 'OK',
        ]);

    }

    public function save(Request $request)
    {
        $account = new Account;

        $account->code = $request->code;
        $account->name = $request->name;

        $account->save();

        return response()->json([
            'account_data' => $account,
            'message' => 'Data Insert Successfully',
        ]);
    }

    public function update(Request $request)
    {

        $account = Account::find($request->id);

        $account->code = $request->code;
        $account->name = $request->name;

        $account->save();

        return response()->json([
            'account_data' => $account,
            'message' => 'Data Update Successfully',
        ]);

    }
}
