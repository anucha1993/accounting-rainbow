<?php

namespace App\Http\Controllers\jobTransaction;

use App\Http\Controllers\Controller;
use App\Models\jobTrasaction\jobTrasactionModel;
use App\Models\jobType\jobDetailModel;
use Illuminate\Http\Request;

class jobTransactionController extends Controller
{
    //
      public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $jobtrasactions = jobTrasactionModel::leftjoin('job_detail','job_detail.job_detail_id','job_trasaction.job_detail')
        ->leftjoin('job_type','job_type.job_type_id','job_trasaction.job_type')
        ->latest('job_trasaction.created_at')->get();

        $jobDetail = jobDetailModel::where('job_detail_status','active')->leftjoin('job_type','job_type.job_type_id','job_detail.job_type')->latest('job_detail.created_at')->get();
        return view('jobTransaction.index',compact('jobDetail','jobtrasactions'));
    }

    public function store(Request $request)
    {
        jobTrasactionModel::create($request->all());
        return redirect()->back();
    }

    public function edit(jobTrasactionModel $jobTrasactionModel)
    {
        $jobDetail = jobDetailModel::where('job_detail_status','active')->leftjoin('job_type','job_type.job_type_id','job_detail.job_type')->latest('job_detail.created_at')->get();
        return view('jobTransaction.modal-edit',compact('jobDetail','jobTrasactionModel'));
    }

    public function update(jobTrasactionModel $jobTrasactionModel, Request $request)
    {
        $jobTrasactionModel->update($request->all());
        return redirect()->back();
    }
}
