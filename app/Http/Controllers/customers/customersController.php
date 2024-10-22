<?php

namespace App\Http\Controllers\customers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Models\customers\ninetyModel;
use Illuminate\Support\Facades\Session;
use App\Models\customers\customersModel;
use App\Models\customers\visaRenewModel;
use App\Models\customers\customerFileModel;

class customersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */


    private $passportNumber;
    private $name;
    private $NationalitySelect;
    private $customerVisaType;
    private $visaDateOfExpire;

    public function index(Request $request)
    {
        // โค้ดก่อนหน้านี้ไม่ได้เปลี่ยนแปลง

        $this->passportNumber = $request->input('passport_number');
        $this->name = $request->input('name');
        $this->NationalitySelect = $request->input('Nationality');
        $this->customerVisaType = $request->input('customer_visa_type');
        $this->visaDateOfExpire = $request->input('visa_date_of_expire');

        $passportNumber = $request->passportNumber;


        $Nationality  = DB::table('nationality')->get();
        $visaType = DB::table('visa_type')->get();


        return view('customers.index', compact('Nationality', 'visaType', 'passportNumber'));
    }

    public function tableIndex(Request $request)
    {
        // รับค่าจากฟอร์ม
        $passportNumber = $request->passportNumber;
        $name = $request->name;
        $NationalitySelect = $request->Nationality;
        $customerVisaType = $request->visaType;
        $code = $request->code;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
    
        // สร้าง query builder สำหรับการค้นหาข้อมูล
        $customers = customersModel::leftJoin('nationality', 'nationality.nationality_id', 'customer.customer_nationality');
    
        // เพิ่มเงื่อนไขในการค้นหาข้อมูล
        if ($passportNumber) {
            $customers->where('customer_passport', 'LIKE', "%$passportNumber%");
        }
        if ($name) {
            $customers->where('customer_name', 'LIKE', "%$name%");
        }
        if ($NationalitySelect) {
            $customers->where('customer_nationality', 'LIKE', "%$NationalitySelect%");
        }
        if ($customerVisaType) {
            $customers->where('customer_visa_type', $customerVisaType);
        }
        
        if ($code) {
            $customers->where('customer_code', 'LIKE', "%$code%");
        }
        if ($startDate && $endDate) {
            $startDate = date('Y-m-d', strtotime($startDate));
            $endDate = date('Y-m-d', strtotime($endDate));
        
            // ใช้เงื่อนไข where หลายเงื่อนไขภายใต้กลุ่มเดียว
            $customers->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($subQuery) use ($startDate, $endDate) {
                    $subQuery->whereDate('customer_visa_date_expiry_0', '>=', $startDate)
                             ->whereDate('customer_visa_date_expiry_0', '<=', $endDate);
                })
                ->orWhere(function ($subQuery) use ($startDate, $endDate) {
                    $subQuery->whereDate('customer_visa_date_expiry_1', '>=', $startDate)
                             ->whereDate('customer_visa_date_expiry_1', '<=', $endDate);
                })
                ->orWhere(function ($subQuery) use ($startDate, $endDate) {
                    $subQuery->whereDate('customer_visa_date_expiry_2', '>=', $startDate)
                             ->whereDate('customer_visa_date_expiry_2', '<=', $endDate);
                })
                ->orWhere(function ($subQuery) use ($startDate, $endDate) {
                    $subQuery->whereDate('customer_visa_date_expiry_3', '>=', $startDate)
                             ->whereDate('customer_visa_date_expiry_3', '<=', $endDate);
                });
            });
        }
    
        $customers->selectRaw('*, CASE
                                    WHEN customer_visa_date_expiry_3 IS NOT NULL THEN customer_visa_date_expiry_3
                                    WHEN customer_visa_date_expiry_2 IS NOT NULL THEN customer_visa_date_expiry_2
                                    WHEN customer_visa_date_expiry_1 IS NOT NULL THEN customer_visa_date_expiry_1
                                    ELSE customer_visa_date_expiry_0
                                END AS latest_expiry_date');
    
        $customers = $customers->orderBy('customer_id','DESC')->get();
    
       
    
        $selectedFormType = $request->selectedFormType;
        if ($selectedFormType === "retirement") {
            $tableContent = View::make('customers.table-retirement', compact('customers'))->render();
        } else {
            $tableContent = View::make('customers.table-ed', compact('customers'))->render();
        }
    
        return response()->json($tableContent);
    }
    

    




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nationality  = DB::table('nationality')->get();
        $visaType = DB::table('visa_type')->get();
        return view('customers.form-add', compact('nationality', 'visaType'));
    }

    public function formType(Request $request)
    {
        $selectedFormType = $request->selectedFormType;
        $nationality  = DB::table('nationality')->get();
        $visaType = DB::table('visa_type')->get();

        if ($selectedFormType === "retirement") {
            $formContent = View::make('customers.form-retirement', compact('nationality', 'visaType'))->render();
        }
        if ($selectedFormType === "ed") {
            $formContent = View::make('customers.form-ed', compact('nationality', 'visaType'))->render();
        }

        return response()->json($formContent);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //
        $request->merge(['created_by' => Auth::user()->name . ' ' . Auth::user()->lastname]);
        $lastestID = customersModel::create($request->all());
        $files = $request->file('repeater-group');
        if ($files) {
            foreach ($files as $fileArray) {
                foreach ($fileArray as $key => $file) {
                    // ตรวจสอบชื่อฟิลด์เพื่อความแน่ใจ
                    $pathImg = '';
                    if ($key === 'customFile') {
                        // ใช้ชื่อเดิมของไฟล์
                        $fileName = $file->getClientOriginalName();
                        // ตำแหน่งเก็บไฟล์
                        $destinationPath = public_path('storage/customer/' . $lastestID->customer_id);
                        // บันทึกไฟล์
                        $pathImg = $file->move($destinationPath, $fileName);
                        // รับเฉพาะส่วนที่เป็นเส้นทางของไฟล์ภาพใหม่
                        $customer_file_url = 'storage/customer/' . $lastestID->customer_id . '/' . $fileName;

                        customerFileModel::create([
                            'customer_file_customer_id' => $lastestID->customer_id,
                            'customer_file_name' =>  $fileName,
                            'customer_file_url' => $customer_file_url
                        ]);
                    }
                }
            }
        }
        
         $customerID = $lastestID->customer_id;
        if($request->addJobOrder) {
            return redirect()->route('joborder.craete',compact('customerID'));
        }else{
            return redirect()->route('customer.index')->with('success', 'Create Customer Successfully');
        }




      
    }

    /**
     * Display the specified resource.
     */
    public function show(customersModel $cus)
    {
        //
        $nationality = DB::table('nationality')->get();
        $visaType = DB::table('visa_type')->get();
        $files = customerFileModel::where('customer_file_customer_id', $cus->customer_id)->get();

        return view('customers.form-view', compact('cus', 'nationality', 'visaType', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customersModel $cus, Request $request)
    {
        //


        $nationality = DB::table('nationality')->get();
        $visaType = DB::table('visa_type')->get();
        $files = customerFileModel::where('customer_file_customer_id', $cus->customer_id)->get();

        return view('customers.form-edit', compact('cus', 'nationality', 'visaType', 'files'));
    }


    public function formTypeEdit(Request $request)
    {
        $selectedFormType = $request->selectedFormType;
        $nationality  = DB::table('nationality')->get();
        $visaType = DB::table('visa_type')->get();
        $cus = customersModel::where('customer_id', $request->customer)->first();
        $files = customerFileModel::where('customer_file_customer_id', $cus->customer_id)->get();

        if ($selectedFormType === "retirement") {
            $formContent = View::make('customers.form-retirement-edit', compact('nationality', 'visaType', 'cus', 'files'))->render();
        }
        if ($selectedFormType === "ed") {
            $formContent = View::make('customers.form-ed-edit', compact('nationality', 'visaType', 'cus', 'files'))->render();
        }
        if($selectedFormType === NULL){
            $formContent = View::make('customers.form-null-edit', compact('nationality', 'visaType', 'cus', 'files'))->render();
        }


        return response()->json($formContent);
    }

    public function formTypeView(Request $request)
    {
        $selectedFormType = $request->selectedFormType;
        $nationality  = DB::table('nationality')->get();
        $visaType = DB::table('visa_type')->get();
        $cus = customersModel::where('customer_id', $request->customer)->first();
        $files = customerFileModel::where('customer_file_customer_id', $cus->customer_id)->get();

        if ($selectedFormType === "retirement") {
            $formContent = View::make('customers.form-retirement-view', compact('nationality', 'visaType', 'cus', 'files'))->render();
        }
        if ($selectedFormType === "ed") {
            $formContent = View::make('customers.form-ed-view', compact('nationality', 'visaType', 'cus', 'files'))->render();
        }

        return response()->json($formContent);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customersModel $customersModel)
    {
        //
    
        $request->merge(['updated_by' => Auth::user()->name . ' ' . Auth::user()->lastname]);

        $customersModel->update($request->all());


        $files = $request->file('repeater-group');

        if ($files) {
            foreach ($files as $fileArray) {
                foreach ($fileArray as $key => $file) {
                    // ตรวจสอบชื่อฟิลด์เพื่อความแน่ใจ 
                    $pathImg = '';
                    if ($key === 'customFile') {
                        // ใช้ชื่อเดิมของไฟล์
                        $fileName = $file->getClientOriginalName();
                        // ตำแหน่งเก็บไฟล์
                        $destinationPath = public_path('storage/customer/' . $customersModel->customer_id);
                        // บันทึกไฟล์
                        $pathImg = $file->move($destinationPath, $fileName);
                        // รับเฉพาะส่วนที่เป็นเส้นทางของไฟล์ภาพใหม่
                        $customer_file_url = 'storage/customer/' . $customersModel->customer_id . '/' . $fileName;

                        customerFileModel::create([
                            'customer_file_customer_id' => $customersModel->customer_id,
                            'customer_file_name' =>  $fileName,
                            'customer_file_url' => $customer_file_url
                        ]);
                    }
                }
            }
        }

        $customerID = $customersModel->customer_id;


        if($request->addJobOrder) {
            return redirect()->route('joborder.craete',compact('customerID'));
        }else{
            return redirect()->back()->with('success', 'Update Customer Successfully');
        }

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        //
        $dataID = $request->cusId;

        if (!empty($dataID)) {
            $customerPath = public_path('storage/customer/' . $dataID);
            if (File::isDirectory($customerPath)) {
                File::deleteDirectory($customerPath);
            }

            //daelete DB Customer
            customersModel::where('customer_id', $dataID)->delete();

            return response()->json(['success' => 'Delete Customer Successfully']);
        } else {
            return response()->json(['error' => 'Delete Customer Field Error']);
        }
    }

}
