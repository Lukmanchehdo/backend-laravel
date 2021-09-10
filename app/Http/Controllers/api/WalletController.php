<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index()
    {
        //$wallet = Wallet::all();

        $wallet = DB::table('wallets')
            ->join('accounts', 'accounts.id', 'wallets.account_id')
            ->select('wallets.*', 'accounts.name as accounts_name')
            ->get();

        return response()->json([
            'wallet' => $wallet,
            'status' => 'OK',
        ]);
    }

    public function save(Request $request)
    {

        $wallet = new Wallet;

        $wallet->reference_code = $request->reference_code;
        $wallet->channel = $request->channel;
        $wallet->account_id = $request->account_id;
        $wallet->amount = $request->amount;

        $wallet->save();

        return response()->json([
            'wallet_data' => $wallet,
            'message' => 'Data Insert Successfully',
        ]);
    }

    public function chooseAccount()
    {
        //$wallet = Wallet::all();

        $wallet = DB::table('accounts')
            ->join('wallets', 'accounts.id', 'wallets.account_id')
            ->select('wallets.amount', 'accounts.*')
            ->get();

        return response()->json([
            'account' => $wallet,
            'status' => 'OK',
        ]);
    }

    public function chooseAccount2()
    {
        //$wallet = Wallet::all();

        $wallet = DB::table('accounts')
            ->join('wallets', 'accounts.id', 'wallets.account_id')
            ->select('wallets.amount', 'accounts.*')
            ->get();

        return response()->json([
            'account2' => $wallet,
            'status' => 'OK',
        ]);
    }
}
