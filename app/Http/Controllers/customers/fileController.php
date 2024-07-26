<?php

namespace App\Http\Controllers\customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\customers\customerFileModel;

class fileController extends Controller
{
    //

    public function deletefile(Request $request)
{
    $dataCustomer = $request->dataCustomer;
    $dataName = $request->dataName;
    $dataID = $request->dataID;

    $deletePath = Storage::delete('public/customer/'.$dataCustomer.'/'.$dataName);
    
    if ($deletePath) {
        // ลบข้อมูลจากฐานข้อมูล
        customerFileModel::where('customer_file_id', $dataID)->delete();

        // โหลดข้อมูลไฟล์ใหม่
        $files = customerFileModel::where('customer_file_customer_id', $dataCustomer)->get();

        // ส่งข้อมูลการลบไฟล์และข้อมูลไฟล์ใหม่กลับไปยัง client
        return response()->json(['success' => 'ลบข้อมูลสำเร็จ!', 'files' => $files]);
    } else {
        return response()->json(['error' => 'ไม่สามารถลบไฟล์ได้']);
    }
}

}
