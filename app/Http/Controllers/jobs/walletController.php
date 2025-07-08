<?php

namespace App\Http\Controllers\jobs;

use Illuminate\Http\Request;
use App\Models\jobs\walletModel;
use App\Models\jobs\JobOrderModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\jobs\transactionModel;
use App\Models\transfer\transferModel;
use App\Models\eventcases\eventCaseModel;

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

    public function jobtransaction(JobOrderModel $JobOrderModel,walletModel $walletModel)
    {
        $eventCase1 = eventCaseModel::select('event_case.*','event_case.created_at as event_created_at','job_order.*','job_trasaction.*')->where('event_case.wallet_type_id', $walletModel->wallet_type_id)
        ->where('event_case.event_case_status', 'success')
        ->leftJoin('job_order', 'job_order.job_order_id', '=', 'event_case.job_order_id') // เข้าร่วมกับตาราง job_trasaction
        ->leftJoin('job_trasaction', 'job_trasaction.job_trasaction_id', '=', 'event_case.transaction_id')
        // ->leftJoin('transactions', 'transactions.transaction_group', '=', 'job_trasaction.job_trasaction_id')
        ->where('event_case.job_order_id', $JobOrderModel->job_order_id);
        $eventCase1 = $eventCase1->orderBy('event_case.event_case_id','ASC')
        ->paginate(10);

        $transactions = transactionModel::where('transaction_job', $JobOrderModel->job_order_id)->get();
        return view('wallet.jobwallertransation', compact('eventCase1','walletModel','transactions') + ['jobOrderId' => $JobOrderModel->job_order_id]);
    }
    public function wallettransaction(Request $request, walletModel $walletModel)
    {
        //
        $search = $request->search;
        $eventCase1 = eventCaseModel::where('event_case.wallet_type_id', $walletModel->wallet_type_id)
        //->where('event_case_log','!=','คืนยอด Debit')
        ->leftJoin('job_order', 'job_order.job_order_id', '=', 'event_case.job_order_id') // เข้าร่วมกับตาราง job_trasaction
        ->leftJoin('job_trasaction', 'job_trasaction.job_trasaction_id', '=', 'event_case.transaction_id')
        ->where('job_order.job_order_id','!=', NULL);
        // ->groupBy('job_order.job_order_id','event_case.job_order_id');
        // ->groupBy('event_case.event_case_name','event_case.grand_total')
        // ->select('event_case.event_case_number','event_case.event_case_log','event_case.event_case_name', 'event_case.grand_total', DB::raw('count(*) as total'));
        if ($search) {
            $eventCase1->where('job_order.job_order_number', 'LIKE', "%$search%")->orWhere('event_case.event_case_number', 'LIKE', "%$search%");
        }
        
        $eventCase1 = $eventCase1->orderBy('event_case.event_case_id','DESC')
        ->paginate(10);
  

        // $eventCase = eventCaseModel::with('jobOrder')
        // ->where('event_case.wallet_type_id', $walletModel->wallet_type_id)
        // ->groupBy('event_case.job_order_id')
        // ->orderBy('event_case.event_case_id','DESC')
        // ->paginate(10);
        $eventCase = eventCaseModel::select(
            'job_order_id',
            'wallet_type_id',
            'event_case.created_at',
            DB::raw('MAX(event_case_id) as max_event_case_id'),
            DB::raw('SUM(grand_total) as sum_grand_total'),
            DB::raw('SUM(CASE WHEN event_case_name = "Credit" THEN grand_total ELSE 0 END) as credit_total'),
            DB::raw('SUM(CASE WHEN event_case_name = "Debit" THEN grand_total ELSE 0 END) as debit_total'),
            DB::raw('SUM(CASE WHEN event_case_name = "Refund" THEN grand_total ELSE 0 END) as refund_total')
        )
            ->with(['jobOrder' => function ($query) { // Eager load jobOrder relationship
                $query->select('job_order_id', 'job_order_number'); // Select only necessary columns
            }])
            ->where('event_case.wallet_type_id', $walletModel->wallet_type_id)
            ->groupBy('event_case.job_order_id')
            ->orderBy('max_event_case_id', 'DESC')
            ->paginate(10);

            $transfers = transferModel::where('wallet_type_id',$walletModel->wallet_type_id)->orWhere('wallet_transfer',$walletModel->wallet_type_id)->latest()->limit(15)->get();

        

        return view('wallet.Wallettransaction', compact('walletModel','eventCase','request','eventCase1','transfers'));
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


    public function money(walletModel $walletModel)
    {
        $listWallets = walletModel::get();
        return view('wallet.modal-money',compact('walletModel','listWallets'));
    }

    public function transfer(walletModel $walletModel, Request $request)
    {
       $wallerMoney = $walletModel->wallet_type_price;

       $walletTransfer = walletModel::where('wallet_type_id',$request->wallet_transfer)->first();

       if($wallerMoney > $request->transfer_price)
       {
         if($request->transfer_type === 'โอนเงิน') {
            transferModel::create([
                'transfer_date' => date('Y-m-d'),
                'transfer_type' => 'โอนเงิน',
                'wallet_type_id' => $walletModel->wallet_type_id,
                'transfer_price' => $request->transfer_price,
                'wallet_transfer' => $request->wallet_transfer,
                'created_by' => Auth::user()->name.' '.Auth::user()->lastname,
            ]);
            // Update wallet ที่ถอนออก
            $walletModel->update([
                'wallet_type_price' =>  $walletModel->wallet_type_price - $request->transfer_price,
            ]);
            //updated Wallet ที่ ฝากเข้า
            $walletTransfer->update([
                'wallet_type_price' =>  $walletTransfer->wallet_type_price + $request->transfer_price,
            ]);

            return redirect()->back();
            
         }

       }else{
        echo 'ยอดเงินไม่เพี่ยงพอ'.$wallerMoney;
       }
    }

 



}
