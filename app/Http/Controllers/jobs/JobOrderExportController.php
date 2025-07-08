<?php

namespace App\Http\Controllers\jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jobs\JobOrderModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobOrderExport;

class JobOrderExportController extends Controller
{
    public function export(Request $request)
    {
        // ส่ง filter ไปยัง JobOrderExport
        return Excel::download(new JobOrderExport(
            $request->all()
        ), 'job_orders.xlsx');
    }
}
