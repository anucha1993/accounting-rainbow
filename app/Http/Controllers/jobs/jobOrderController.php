<?php

namespace App\Http\Controllers\jobs;

use Illuminate\Http\Request;
use App\Models\jobs\JobOrderModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\jobs\transactionModel;
use App\Models\jobType\jobDetailModel;
use App\Models\customers\customersModel;
use App\Models\jobTrasaction\jobTrasactionModel;
use App\Http\Controllers\wallets\WalletController;
use App\Models\eventcases\eventCaseModel;

class jobOrderController extends Controller
{
    //
    protected $walletController;

    public function __construct(WalletController $walletController)
    {
        $this->middleware('auth');
        $this->walletController = $walletController;
    }


    public function index()
    {
        $nationality = DB::table('nationality')->get();
        $jobs = JobOrderModel::leftjoin('customer', 'customer.customer_id', 'job_order.job_order_customer')->leftJoin('nationality', 'nationality.nationality_id', 'customer.customer_nationality')->orderBy('job_order.job_order_id', 'desc')->get();
        return view('jobs.index', compact('jobs', 'nationality'));
    }

    public function searchIndex(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $jobs = JobOrderModel::leftjoin('customer', 'customer.customer_id', 'job_order.job_order_customer')->leftJoin('nationality', 'nationality.nationality_id', 'customer.customer_nationality')->leftJoin('job_detail', 'job_detail.job_detail_id', 'job_order.job_order_detail');

        if ($startDate && $endDate) {
            $startDate = date('Y-m-d', strtotime($request->startDate));
            $endDate = date('Y-m-d', strtotime($request->endDate));

            $jobs->where(function ($query) use ($startDate, $endDate) {
                $query->whereDate('job_order_date', '>=', $startDate)->whereDate('job_order_date', '<=', $endDate);
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

        if ($request->receipt) {
            $jobs->where('job_order_receipt', 'LIKE', "%$request->receipt%");
        }

        if ($request->passport) {
            $jobs->where('customer_passport', 'LIKE', "%$request->passport%");
        }
        $jobs = $jobs->orderBy('job_order.job_order_id', 'desc')->get();

        $transactions = DB::table('transactions')->where('transaction_type', 'income')->get();

        $tableContent = View::make('jobs.table-search', compact('jobs', 'startDate', 'transactions'))->render();

        return response()->json($tableContent);
    }

    public function create()
    {
        $customer = null;
        $nationality = DB::table('nationality')->get();

        $jobType = DB::table('job_type')->latest()->get();

        $customers = customersModel::orderBy('customer_id', 'desc')->get();
        $walletType = DB::table('wallet_type')->orderBy('wallet_type_id', 'desc')->get();

        return view('jobs.form-create', compact('customers', 'customer', 'nationality', 'walletType', 'jobType'));
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
        if ($request->job_order_customer === 'CustomerNew') {
            $customer = customersModel::create($request->all());
            $request->merge(['job_order_customer' => $customer->customer_id]);
        }
        //dd($request);
        $newCode = $this->generateRunningCode();

        $request->merge(['job_order_number' => $newCode]);
        $request->merge(['transaction_job_number' => $newCode]);

        $request->merge(['created_by' => Auth::user()->name]);

        $jobOrder = JobOrderModel::create($request->all());

        if ($request->transaction_type) {
            foreach ($request->transaction_type as $key => $value) {
                if (!empty($request->transaction_type[$key])) {
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
        }

      


        $income = 0;
        $expenses = 0;

        $transactionProfit = transactionModel::where('transaction_job', $jobOrder->job_order_id)->get();
        foreach ($transactionProfit as $key => $value) {
            if ($value->transaction_type === 'income') {
                $income += $value->transaction_amount;
                // Call credit() immediately after calculating income
                $this->walletController->credit($value->transaction_wallet, $value->transaction_amount, $jobOrder->job_order_id, $value->transaction_group);
            } else {
                $expenses += $value->transaction_amount;
                // Call debit() immediately after calculating expenses
                $this->walletController->debit($value->transaction_wallet, $value->transaction_amount, $jobOrder->job_order_id, $value->transaction_group);
            }
        }

        $jobOrder->update([
            'job_order_income' => $income,
            'job_order_expenses' => $expenses,
            'job_order_profit' => $income - $expenses, // กำไรควรเป็นรายรับลบด้วยรายจ่าย
        ]);

        return redirect()
            ->route('joborder.edit', $jobOrder->job_order_id)
            ->with('success', 'Created Job Order Successfully');
    }

    public function edit(Request $request, JobOrderModel $jobOrder)
    {
        $customer = customersModel::where('customer_id', $jobOrder->job_order_customer)->first();
        $nationality = DB::table('nationality')->get();
        $customers = customersModel::orderBy('customer_id', 'desc')->get();
        $walletType = DB::table('wallet_type')->orderBy('wallet_type_id', 'desc')->get();
        $jobType = DB::table('job_type')->latest()->get();
        $jobDetail = DB::table('job_detail')
            ->where('job_type', $jobOrder->job_order_type)
            ->latest()
            ->get();

        $wallerLogs = eventCaseModel::where('event_case.job_order_id', $jobOrder->job_order_id )
        ->where('event_case.event_case_status', 'success')
        ->leftJoin('job_order', 'job_order.job_order_id', '=', 'event_case.job_order_id') // เข้าร่วมกับตาราง job_trasaction
        ->leftJoin('job_trasaction', 'job_trasaction.job_trasaction_id', '=', 'event_case.transaction_id')
        ->leftJoin('wallet_type', 'wallet_type.wallet_type_id', '=', 'event_case.wallet_type_id')
        ->get();

        if (Auth::user()->isAdmin === 'Admin') {
            $Jobtransactions = DB::table('job_trasaction')
                ->where('job_detail', $jobOrder->job_order_detail)
                ->latest()
                ->get();
        } else {
            $Jobtransactions = DB::table('job_trasaction')
                ->where('job_detail', $jobOrder->job_order_detail)
                ->where('job_trasaction_type', '+')
                ->latest()
                ->get();
        }

        if (Auth::user()->isAdmin === 'Admin') {
            $transactions = DB::table('transactions')
                ->where('transaction_job', $jobOrder->job_order_id)
                ->latest()
                ->get();
        } else {
            $transactions = DB::table('transactions')
                ->where('transaction_job', $jobOrder->job_order_id)
                ->where('transaction_type', 'income')
                ->latest()
                ->get();
        }

        // dd($Jobtransactions);
        return view('jobs.form-edit', compact('wallerLogs','nationality', 'customer', 'customers', 'jobOrder', 'walletType', 'jobType', 'jobDetail', 'Jobtransactions', 'transactions'));
    }

    public function update(Request $request, JobOrderModel $jobOrder)
    {
        //dd($request);
        $jobOrder->update($request->all());

        $eventCaseCount = eventCaseModel::where('job_order_id', $jobOrder->job_order_id)->count();

        if ($eventCaseCount > 0) {
            // เรียกฟังก์ชัน refund จาก WalletController โดยส่ง $jobOrder
            $this->walletController->refund($request, $jobOrder);
        }

        // ตรวจสอบว่ามีการส่งค่า transaction_idEdit มาหรือไม่
        if ($request->transaction_type) {
            //ลบรายการเดิมออก
            transactionModel::where('transaction_job', $jobOrder->job_order_id)->delete();
            // อัปเดตข้อมูลธุรกรรมแต่ละรายการ
            foreach ($request->transaction_type as $key => $value) {
                if ($request->transaction_type[$key]) {
                    transactionModel::create([
                        'transaction_job' => $jobOrder->job_order_id,
                        'transaction_number' => $jobOrder->job_order_number,
                        'transaction_type' => $request->transaction_type[$key],
                        'transaction_date' => $request->transaction_date[$key],
                        'transaction_wallet' => $request->transaction_wallet[$key],
                        'transaction_amount' => $request->transaction_amount[$key],
                        'transaction_group' => $request->transaction_group[$key],
                    ]);
                }
            }
        }

        // if ($request->transaction_type) {
        //     // ดึงข้อมูลเดิมทั้งหมดที่เกี่ยวข้องกับ jobOrder
        //     $existingTransactions = transactionModel::where('transaction_job', $jobOrder->job_order_id)->get();
        //     // อัปเดตหรือสร้างข้อมูลใหม่
        //     $updatedTransactions = []; // Array เก็บข้อมูลที่ถูกอัปเดต
        //     foreach ($request->transaction_type as $key => $value) {
        //         $existingTransaction = $existingTransactions->where('transaction_id', $value->transaction_id)->first();
        //         if ($existingTransaction) {
        //             // อัปเดตข้อมูล
        //             $existingTransaction->update([
        //               'transaction_type' => $request->transaction_type[$key],
        //               'transaction_date' => $request->transaction_date[$key],
        //               'transaction_wallet' => $request->transaction_wallet[$key],
        //               'transaction_amount' => $request->transaction_amount[$key],
        //               'transaction_group' => $request->transaction_group[$key],
        //             ]);
        //             $updatedTransactions[] = $existingTransaction->transaction_id;
        //         } else {
        //             // สร้างข้อมูลใหม่
        //             $newTransaction = transactionModel::create([
        //              'transaction_job' => $jobOrder->job_order_id,
        //              'transaction_number' => $jobOrder->job_order_number,
        //              'transaction_type' => $request->transaction_type[$key],
        //              'transaction_date' => $request->transaction_date[$key],
        //              'transaction_wallet' => $request->transaction_wallet[$key],
        //              'transaction_amount' => $request->transaction_amount[$key],
        //              'transaction_group' => $request->transaction_group[$key],
        //             ]);
        //             $updatedTransactions[] = $newTransaction->transaction_id;
        //         }
        //     }
        
        //     // ลบข้อมูลเดิมที่ไม่ได้ถูกอัปเดต (ถ้าต้องการ)
        //     $existingIds = $existingTransactions->pluck('id')->toArray();
        //     $deletedIds = array_diff($existingIds, $updatedTransactions);
        //     transactionModel::whereIn('id', $deletedIds)->delete();
        // }

       


      
        $income = 0;
        $expenses = 0;

        $transactionProfit = transactionModel::where('transaction_job', $jobOrder->job_order_id)->get();
        foreach ($transactionProfit as $key => $value) {
            if ($value->transaction_type === 'income') {
                $income += $value->transaction_amount;
                // Call credit() immediately after calculating income
                $this->walletController->credit($value->transaction_wallet, $value->transaction_amount, $jobOrder->job_order_id, $value->transaction_group);
            } else {
                $expenses += $value->transaction_amount;
                // Call debit() immediately after calculating expenses
                $this->walletController->debit($value->transaction_wallet, $value->transaction_amount, $jobOrder->job_order_id, $value->transaction_group);
            }
        }

        $jobOrder->update([
            'job_order_income' => $income,
            'job_order_expenses' => $expenses,
            'job_order_profit' => $income - $expenses, // กำไรควรเป็นรายรับลบด้วยรายจ่าย
        ]);

        return redirect()
            ->route('joborder.edit', $jobOrder->job_order_id)
            ->with('success', 'Update Job Order Successfully');
    }

    public function close(Request $request)
    {
        JobOrderModel::where('job_order_id', $request->JobId)->update([
            'job_order_status' => 'close',
            'job_order_finish_date' => date('Y-m-d'),
            'update_by' => Auth::user()->name,
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
        $services = DB::table('services')
            ->where('service_group', $request->service)
            ->get();
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

    public function CustomerUpdate(customersModel $customersModel, Request $request)
    {
        $customersModel->update($request->all());
        return redirect()->back();
    }

    public function jobType(Request $request)
    {
        $jobDetail = jobDetailModel::where('job_type', $request->jobType)->get();
        // $jobTrasaction = jobTrasactionModel::where('job_type',$request->jobType)->get();

        return response()->json(['jobDetail' => $jobDetail]);
    }

    public function serviceTrasaction(Request $request)
    {
        if (Auth::user()->isAdmin === 'Admin') {
            $jobTrasaction = jobTrasactionModel::where('job_detail', $request->serviceTrasaction)->get();
        } else {
            $jobTrasaction = jobTrasactionModel::where('job_detail', $request->serviceTrasaction)
                ->where('job_trasaction_type', '+')
                ->get();
        }

        return response()->json(['jobTrasaction' => $jobTrasaction]);
    }
}
