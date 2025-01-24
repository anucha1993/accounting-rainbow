<?php

namespace App\Http\Controllers\jobs;

use App\Http\Controllers\Controller;
use App\Models\eventcases\eventCaseModel;
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
    public function wallettransaction(Request $request, walletModel $walletModel)
    {
        //
        $search = $request->search;
        $eventCase = eventCaseModel::where('event_case.wallet_type_id', $walletModel->wallet_type_id)
        ->where('event_case_status','!=','cancel')
        ->leftJoin('job_order', 'job_order.job_order_id', '=', 'event_case.job_order_id') // เข้าร่วมกับตาราง job_trasaction
        ->leftJoin('job_trasaction', 'job_trasaction.job_trasaction_id', '=', 'event_case.transaction_id');


        if ($search) {
            $eventCase->where('job_order.job_order_number', 'LIKE', "%$search%")->orWhere('event_case.event_case_number', 'LIKE', "%$search%");
        }
        
        $eventCase = $eventCase->orderBy('event_case.event_case_id','DESC')
        ->paginate(10);
    

        //dd($eventCase);

        return view('wallet.Wallettransaction', compact('walletModel','eventCase','request'));
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
