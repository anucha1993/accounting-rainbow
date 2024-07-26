<?php

namespace App\Http\Controllers\jobs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\jobs\transactionModel;

class transactionController extends Controller
{
    //
    public function create()
    {
        $walletType = DB::table('wallet_type')->orderBy('wallet_type_id', 'desc')->get();
        $transactionGroup = DB::table('transaction_group')->orderBy('transaction_group_id', 'desc')->get();
        return view('transaction.modal-create', compact('walletType', 'transactionGroup'));
    }

    public function edit(transactionModel $transaction)
    {
        $walletType = DB::table('wallet_type')->orderBy('wallet_type_id', 'desc')->get();
        $transactionGroup = DB::table('transaction_group')->orderBy('transaction_group_id', 'desc')->get();
        return view('transaction.modal-edit', compact('walletType', 'transactionGroup','transaction'));
    }
}
