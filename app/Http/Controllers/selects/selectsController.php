<?php

namespace App\Http\Controllers\selects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class selectsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function nationality(Request $request)
    {
        $query = $request->q;
        $nationality = DB::table('nationality')
                        ->where('nationality_name', 'like', "%$query%")
                        ->orWhere('nationality_id',$query)
                        ->orderBy('nationality_code', 'ASC')
                        ->get();
    
        return response()->json($nationality);
    }

    public function visaType(Request $request)
    {
        $query = $request->q;
    
        if ($query) {
            $visaType = DB::table('visa_type')->where('visa_type_id', $query)->get();
        } else {
            // หากไม่มีการค้นหา ให้แสดงข้อมูลทั้งหมดของ visa type
            $visaType = DB::table('visa_type')->get();
        }
    
        // คืนค่าข้อมูลในรูปแบบ JSON กลับไปยังหน้าเว็บ
        return response()->json(['visaType'=>$visaType]);
    }



}


