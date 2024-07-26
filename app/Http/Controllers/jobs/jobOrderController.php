<?php

namespace App\Http\Controllers\jobs;

use Illuminate\Http\Request;
use App\Models\jobs\JobOrderModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\jobs\transactionModel;
use App\Models\customers\customersModel;

class jobOrderController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nationality  = DB::table('nationality')->get();

        $jobs = JobOrderModel::leftjoin('customer', 'customer.customer_id', 'job_order.job_order_customer')
            ->leftJoin('nationality', 'nationality.nationality_id', 'customer.customer_nationality')
            ->orderBy('job_order.job_order_id', 'desc')->get();
        return view('jobs.index', compact('jobs', 'nationality'));
    }


    public function searchIndex(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $jobs = JobOrderModel::leftjoin('customer', 'customer.customer_id', 'job_order.job_order_customer')
            ->leftJoin('nationality', 'nationality.nationality_id', 'customer.customer_nationality');


        if ($startDate && $endDate) {

            $startDate = date('Y-m-d', strtotime($request->startDate));
            $endDate = date('Y-m-d', strtotime($request->endDate));

            $jobs->where(function ($query) use ($startDate, $endDate) {
                $query->whereDate('job_order_date', '>=', $startDate)
                    ->whereDate('job_order_date', '<=', $endDate);
            });
        }

        if ($request->JobStatus) {
            $jobs->where('job_order_status', 'LIKE', "%$request->JobStatus%");
        }

        if ($request->Name) {
            $jobs->where('customer.customer_name', 'LIKE', "%$request->Name%");
        }

        if ($request->Nationality) {
            $jobs->where('customer_nationality', $request->Nationality);
        }

        if ($request->channel) {
            $jobs->where('job_order_source_channel', 'LIKE', "%$request->channel%");
        }

        if ($request->passport) {
            $jobs->where('customer_passport', 'LIKE', "%$request->passport%");
        }



        $jobs =   $jobs->orderBy('job_order.job_order_id', 'desc')->get();



        $tableContent = View::make('jobs.table-search', compact('jobs', 'startDate'))->render();

        return response()->json($tableContent);
    }



    public function create()
    {
        $customer = NULL;
        $nationality  = DB::table('nationality')->get();
        $services = DB::table('services')->select('service_group')->distinct()->get();
        $customers = customersModel::orderBy('customer_id', 'desc')->get();
        return view('jobs.form-create', compact('customers', 'services','customer','nationality'));
    }



    public function selectCustomer(Request $request)
    {
        $customer = customersModel::where('customer_id', $request->id)
            ->leftJoin('nationality', 'nationality.nationality_id', 'customer.customer_nationality')
            ->first();

        return response()->json(['status' => 'successFully', 'customer' => $customer]);
    }

    // ฟังก์ชันในการสร้างรหัสรันนิ่ง
    private function generateRunningCode()
    {
        $today = date('Ymd'); // ได้วันที่ในรูปแบบ YYMMDD

        // ดึงเลขรันนิ่งสูงสุดจากฐานข้อมูลที่มีวันที่ปัจจุบัน
        $maxCode = DB::table('job_order')
            ->where('job_order_number', 'like', $today . '%')
            ->max('job_order_number');

        if ($maxCode) {
            // แยกส่วนเลขรันนิ่งออกจากรหัสสูงสุดที่ดึงมา
            $lastRunningNumber = intval(substr($maxCode, 8));
            $newRunningNumber = $lastRunningNumber + 1;
        } else {
            // หากยังไม่มีเลขรันนิ่งของวันที่ปัจจุบัน ให้เริ่มต้นที่ 1
            $newRunningNumber = 1;
        }

        // สร้างรหัสใหม่โดยรวมวันที่กับเลขรันนิ่ง
        $newCode = $today . str_pad($newRunningNumber, 3, '0', STR_PAD_LEFT);

        return $newCode;
    }

    // ฟังก์ชันในการบันทึกข้อมูล
    public function store(Request $request)
    {

        if($request->job_order_customer === 'CustomerNew') {
            $customer = customersModel::create($request->all());
            $request->merge(['job_order_customer' => $customer->customer_id]);
        }
        //dd($request);
        $newCode = $this->generateRunningCode();

        $request->merge(['job_order_number' => $newCode]);
        $request->merge(['transaction_job_number' => $newCode]);

        $request->merge(['created_by' => Auth::user()->name]);

        $jobOrder = JobOrderModel::create($request->all());

        if ($request->transaction_date) {
            foreach ($request->transaction_date as $key => $value) {
                transactionModel::create([
                    'transaction_type' => $request->transaction_type[$key],
                    'transaction_date' => $request->transaction_date[$key],
                    'transaction_wallet' => $request->transaction_wallet[$key],
                    'transaction_amount' => $request->transaction_amount[$key],
                    'transaction_job' => $jobOrder->job_order_id,
                    'transaction_group' => $request->transaction_group[$key],
                    'transaction_job_number' => $jobOrder->job_order_number,
                ]);
            }
        }
        return redirect()->route('joborder.edit', $jobOrder->job_order_id)->with('success', 'Created Job Order Successfully');
    }

    public function edit(Request $request, JobOrderModel $jobOrder)
    {
        $services = DB::table('services')->select('service_group')->distinct()->get();
        $transaction = transactionModel::where('transaction_job', $jobOrder->job_order_id)
            ->leftjoin('transaction_group', 'transaction_group.transaction_group_id', 'transactions.transaction_group')
            ->leftjoin('wallet_type', 'wallet_type.wallet_type_id', 'transactions.transaction_wallet')
            ->orderBy('transaction_id', 'desc')->get();

        $customers = customersModel::orderBy('customer_id', 'desc')->get();
        $jobOrder = JobOrderModel::where('job_order_id', $jobOrder->job_order_id)->leftjoin('services', 'services.service_id', 'job_order.job_order_service')->first();


        $walletType = DB::table('wallet_type')->orderBy('wallet_type_id', 'desc')->get();
        $transactionGroup = DB::table('transaction_group')->orderBy('transaction_group_id', 'desc')->get();


        return view('jobs.form-edit', compact('customers', 'jobOrder', 'transaction', 'services', 'transactionGroup', 'walletType'));
    }



    public function update(Request $request, JobOrderModel $jobOrder)
    {
        //dd($request);
      

        $jobOrder->update($request->all());
        // ตรวจสอบว่ามีการส่งค่า transaction_idEdit มาหรือไม่
        if ($request->transaction_idEdit) {
            // อัปเดตข้อมูลธุรกรรมแต่ละรายการ
            foreach ($request->transaction_idEdit as $key => $value) {
                transactionModel::where('transaction_id', $value)
                    ->update([
                        'transaction_type' => $request->transaction_typeEdit[$key],
                        'transaction_date' => $request->transaction_dateEdit[$key],
                        'transaction_wallet' => $request->transaction_walletEdit[$key],
                        'transaction_amount' => $request->transaction_amountEdit[$key],
                        'transaction_group' => $request->transaction_groupEdit[$key],
                    ]);
            }
        }

      
        // ลบข้อมูลธุรกรรมที่ไม่อยู่ใน transaction_idEdit
        if ($jobOrder->job_order_id && $request->transaction_idEdit) {
            transactionModel::where('transaction_job', $jobOrder->job_order_id)
                ->whereNotIn('transaction_id', $request->transaction_idEdit)
                ->delete();
        }

        if ($request->transaction_typeNew) {
            foreach ($request->transaction_typeNew as $key => $value) {
                if (!empty($request->transaction_typeNew[$key])) {
                    transactionModel::create([
                        'transaction_type' => $request->transaction_typeNew[$key],
                        'transaction_date' => $request->transaction_dateNew[$key],
                        'transaction_wallet' => $request->transaction_walletNew[$key],
                        'transaction_amount' => $request->transaction_amountNew[$key],
                        'transaction_job' => $jobOrder->job_order_id,
                        'transaction_group' => $request->transaction_groupNew[$key],
                        'transaction_job_number' => $jobOrder->job_order_number,
                    ]);
                }

            }

        }

        //คำนวนค่าใช้จ่าย
        $income = 0;
        $expenses = 0;

        $transactionProfit = transactionModel::where('transaction_job',$jobOrder->job_order_id)->get();
        foreach ($transactionProfit as  $key => $value ) {
              if($value->transaction_type === 'income') {
                 $income += $value->transaction_amount;
              }else{
                $expenses += $value->transaction_amount;
              }
        }

        $jobOrder->update([
            'job_order_income' => $income,
            'job_order_expenses' => $expenses,
            'job_order_profit' => $income - $expenses // กำไรควรเป็นรายรับลบด้วยรายจ่าย
        ]);

        
       

    return redirect()->route('joborder.edit', $jobOrder->job_order_id)->with('success', 'Update Job Order Successfully');

    }


    public function close(Request $request)
    {
        JobOrderModel::where('job_order_id', $request->JobId)->update([
            'job_order_status' => 'close',
            'job_order_finish_date' => date('Y-m-d'),
            'update_by' => Auth::user()->name
        ]);

        return response()->json(['status' => 'success']);
    }


    public function reOpen(Request $request)
    {
        JobOrderModel::where('job_order_id', $request->JobId)->update(['job_order_status' => 'open', 'update_by' => Auth::user()->name]);
        return response()->json(['status' => 'success']);
    }

    public function service(Request $request)
    {

        $services = DB::table('services')->where('service_group', $request->service)->get();
        // ส่งกลับข้อมูลในรูปแบบ JSON
        return response()->json($services);
    }

    public function delete(Request $request)
    {
        if ($request->JobId) {
            $deleted = JobOrderModel::where('job_order_id', $request->JobId)->delete();

            if ($deleted) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Job not found or already deleted']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid Job ID']);
        }
    }
}
