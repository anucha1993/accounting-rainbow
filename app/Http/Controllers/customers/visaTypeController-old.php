<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Models\customers\visaRenewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class visaTypeController extends Controller
{
    //

    public function edit(Request $request, visaRenewModel $visaRenewModel) 
    {
        $visaType =  DB::table('visa_type')->get();
        return view('customers.modal-edit-visa',compact('visaRenewModel','visaType'));
    }

    public function update(Request $request, visaRenewModel $visaRenewModel) 
    {
         $visaRenewModel->update($request->all());
         return redirect()->back()->with('success', 'Updated Visa Renew  Days successfully');
    }

    public function delete (Request $request)
    {
        $delete = visaRenewModel::where('visa_renew_id',$request->dataID)->delete();
        
        if($delete) {
           return response()->json(['success' => 'Delete Visa Renew  successfully']);
        }else {
            return response()->json(['error' => 'Delete Visa Renew Failed']);
        }
        
    }
}
