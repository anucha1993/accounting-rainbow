<?php

namespace App\Http\Controllers\jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\jobs\transactionGroupModel;

class transactionGroupController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $transactionGroup = transactionGroupModel::orderBy('transaction_group_id', 'desc')->get();
        return view('transaction-group.index', compact('transactionGroup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('transaction-group.modal-create');
    }

    public function edit(Request $request, transactionGroupModel $transactionGroupModel)
    {
        return view('transaction-group.modal-edit',compact('transactionGroupModel'));
    }

    


    public function store(Request $request)
    {

        // สร้างรายการใหม่ในฐานข้อมูล
        $transactionGroup = transactionGroupModel::create([
            'transaction_group_name' => $request->transactionName,
            'transaction_group_type' => $request->transactionType,
            'transaction_group_status' => $request->transactionStatus,
        ]);

        return response()->json(['status' => 'success', 'transactionGroup' => $transactionGroup]);
    }



    public function update(Request $request)
    {
      
        transactionGroupModel::where('transaction_group_id', $request->transactionId)->update([
            'transaction_group_name' => $request->transactionName,
            'transaction_group_type' => $request->transactionType,
            'transaction_group_status' => $request->transactionStatus,
        ]);

        $transactionGroupModel =  transactionGroupModel::where('transaction_group_id', $request->transactionId)->first();

        return response()->json(['status' => 'success', 'transactionGroupModel' => $transactionGroupModel]);
    }


    public function delete(Request $request)
    {
        if($request->walletId) {
            transactionGroupModel::where('transaction_group_id',$request->walletId)->delete();
            return response()->json(['status' => 'success', 'message' => 'transaction Group deleted successfully']);
        }
    }

 
}
