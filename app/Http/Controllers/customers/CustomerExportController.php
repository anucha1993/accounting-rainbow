<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;

class CustomerExportController extends Controller
{
    public function export(Request $request)
    {
        return Excel::download(new CustomerExport($request->all()), 'customers.xlsx');
    }
}
