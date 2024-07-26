<?php

namespace App\Http\Controllers\jobs;

use App\Http\Controllers\Controller;
use App\Models\jobs\walletModel;
use Illuminate\Http\Request;

class walletController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
     
    public function index()
    {
        //
        $wallet = walletModel::orderBy('wallet_type_id', 'desc')->get();
        return view('wallet.index', compact('wallet'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create(Request $request)
    {
        return view('wallet.modal-create');
    }


    public function store(Request $request)
    {
        // สร้างรายการใหม่ในฐานข้อมูล
        $wallet = walletModel::create([
            'wallet_type_name' => $request->walletName,
            'wallet_type_account_no' => $request->walletAccount,
            'wallet_type_price' => $request->walletPrice,
        ]);

        return response()->json(['status' => 'success', 'wallet' => $wallet]);
    }


    public function edit(Request $request, walletModel $walletModel)
    {
        return view('wallet.modal-edit',compact('walletModel'));
    }

    public function update(Request $request)
    {


       walletModel::where('wallet_type_id', $request->walletId)->update([
            'wallet_type_name' => $request->walletName,
            'wallet_type_account_no' => $request->walletAccount,
            'wallet_type_price' => $request->walletPrice,
        ]);

        $wallet = walletModel::where('wallet_type_id', $request->walletId)->first();

        return response()->json(['status' => 'success', 'wallet' => $wallet]);
    }









    /**
     * Display the specified resource.
     */
    public function show(walletModel $walletModel)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    
    public function delete(Request $request)
    {
        $id = $request->id;

        // ลบรายการจากฐานข้อมูล
        walletModel::where('wallet_type_id', $id)->delete();

        return response()->json(['status' => 'success', 'message' => 'Wallet deleted successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(walletModel $walletModel)
    {
        //
    }
}
