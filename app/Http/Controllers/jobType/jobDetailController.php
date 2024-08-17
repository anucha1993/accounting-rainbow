<?php

namespace App\Http\Controllers\jobType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\jobType\jobDetailModel;


class jobDetailController extends Controller
{
    //

    public function index()
    {
        $jobDetail = jobDetailModel::leftjoin('job_type','job_type.job_type_id','job_detail.job_type')->latest('job_detail.created_at')->get();
        $jobType = DB::table('job_type')->get();
        return view('jobDetail.index',compact('jobDetail','jobType'));
    }

    public function store(Request $request)
    {
        jobDetailModel::create($request->all());
        return redirect()->back();
    }

    public function edit(jobDetailModel $jobDetailModel)
    {
        $jobType = DB::table('job_type')->get();
        return view('jobDetail.modal-edit',compact('jobDetailModel','jobType'));
    }

    public function update(jobDetailModel $jobDetailModel ,Request $request)
    {
        $jobDetailModel->update($request->all());
        return redirect()->back();
    }

    public function delete(jobDetailModel $jobDetailModel)
    {
        $jobDetailModel->delete();
        return redirect()->back();
    }

}
