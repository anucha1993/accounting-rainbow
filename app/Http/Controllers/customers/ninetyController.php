<?php

namespace App\Http\Controllers\customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\customers\ninetyModel;

class ninetyController extends Controller
{
    //

    public function edit(Request $request, ninetyModel $modelNinety) 
    {
        return view('customers.modal-edit-ninety',compact('modelNinety'));
    }

    public function update(Request $request, ninetyModel $modelNinety) 
    {
         $modelNinety->update($request->all());
         return redirect()->back()->with('success', 'Updated Ninety Days successfully');
    }

    public function delete (Request $request)
    {
      
        $delete = ninetyModel::where('ninety_id',$request->dataID)->delete();
        
        if($delete) {
           return response()->json(['success' => 'Delete Ninety Days successfully']);
        }else {
            return response()->json(['error' => 'Delete Ninety Days Failed']);
        }
        
    }
}
