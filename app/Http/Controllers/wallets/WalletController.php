<?php

namespace App\Http\Controllers\wallets;

use Illuminate\Http\Request;
use App\Models\jobs\walletModel;
use App\Models\jobs\JobOrderModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\eventcases\eventCaseModel;
use Illuminate\Support\Str; // สำหรับการใช้งาน UUID (ถ้าจำเป็น)

class WalletController extends Controller
{
    // ฟังก์ชันสร้างรหัสธุรกรรม
    public function generateTransactionId()
    {
        // รับวันที่ในรูปแบบ YYYYMMDD
        $date = now()->format('Ymd');

        // นับจำนวนธุรกรรมในวันนั้น
        $transactionCount = eventCaseModel::whereDate('created_at', now())->count() + 1;

        // สร้างรหัสธุรกรรมในรูปแบบ TXYYYYMMDD-XXXX
        $transactionId = 'TX' . $date . '-' . str_pad($transactionCount, 4, '0', STR_PAD_LEFT);

        return $transactionId;
    }

    public function credit($walletId, $amount, $jobOrderId, $trasactionIds)
    {
        DB::beginTransaction();
        try {
            // ดึงข้อมูลกระเป๋าเงิน
            $wallet = walletModel::find($walletId);
    
            // อัปเดตยอดคงเหลือในกระเป๋าเงิน
            $wallet->wallet_type_price += $amount;
            $wallet->save();
            
            // สร้างรหัสธุรกรรม
            $transactionNumber = $this->generateTransactionId();
            // บันทึกข้อมูลการทำธุรกรรม
            eventCaseModel::create([
                'event_case_log' => 'รับยอด',
                'event_case_name' => 'Credit',
                'event_case_status' => 'success',
                'event_case_number' => $transactionNumber,
                'wallet_type_id' => $wallet->wallet_type_id,
                'job_order_id' => $jobOrderId,
                'transaction_id' => $trasactionIds, // บันทึก transaction_id เป็น JSON
                'grand_total' => $amount,
                'wallet_grand_total' => $wallet->wallet_type_price, // อัปเดตยอดคงเหลือหลังการเติมเงิน
                'created_by' => Auth::user()->name . ' ' .Auth::user()->lastname,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function debit($walletId, $amount, $jobOrderId, $trasactionIds)
    {
        DB::beginTransaction();
        try {
            // ดึงข้อมูลกระเป๋าเงิน
            $wallet = walletModel::find($walletId);
    
            // อัปเดตยอดคงเหลือในกระเป๋าเงิน
            $wallet->wallet_type_price -= $amount;
            $wallet->save();
            
            // สร้างรหัสธุรกรรม
            $transactionNumber = $this->generateTransactionId();

            // แปลง $trasactionIds เป็น JSON

            // บันทึกข้อมูลการทำธุรกรรม
            eventCaseModel::create([
                'event_case_log' => 'ถอนยอด',
                'event_case_name' => 'Debit',
                'event_case_status' => 'success',
                'event_case_number' => $transactionNumber,
                'wallet_type_id' => $wallet->wallet_type_id,
                'job_order_id' => $jobOrderId,
                'transaction_id' => $trasactionIds, // บันทึก transaction_id เป็น JSON
                'grand_total' => -$amount, // อัปเดตให้เป็นยอดลบสำหรับการถอน
                'wallet_grand_total' => $wallet->wallet_type_price, // อัปเดตยอดคงเหลือหลังการถอนเงิน
                'created_by' => Auth::user()->name . ' ' .Auth::user()->lastname,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

     // ฟังก์ชัน Refund คืนเงิน

     public function refund(Request $request, $jobOrder)
{
    DB::beginTransaction();
    try {
        // ดึงข้อมูล job order
        $jobOrder = JobOrderModel::find($jobOrder->job_order_id);

        // ดึงรายการธุรกรรมที่เกี่ยวข้องกับ job_order_id ทั้งหมดที่สถานะสำเร็จ
        $eventCases = eventCaseModel::where('job_order_id', $jobOrder->job_order_id)
            ->where('event_case_status', 'success')
            ->get();

        if ($eventCases->isEmpty()) {
            DB::rollBack();
            return response()->json(['message' => 'No event cases found for this job order!'], 400);
        }

        // วนลูปเพื่อตรวจสอบแต่ละรายการธุรกรรม
        foreach ($eventCases as $event) {
            // ดึงข้อมูลกระเป๋าเงินที่เกี่ยวข้องกับแต่ละธุรกรรม
            $wallet = walletModel::find($event->wallet_type_id);

            if (!$wallet) {
                DB::rollBack();
                return response()->json(['message' => 'Wallet not found!'], 400);
            }

            // ตรวจสอบว่าธุรกรรมเป็น Credit หรือ Debit
            $refundAmount = 0;
            $eventCaseLog = '';
            if ($event->event_case_name == 'Credit') {
                // Credit: คืนยอด โดยการลดยอดเงินในกระเป๋าเงิน
                $refundAmount = -$event->grand_total; // บันทึกยอด Refund เป็นลบ
                $wallet->wallet_type_price -= abs($refundAmount); // ลดยอดเงินจากกระเป๋า
              

                if($event->wallet_type_id ===  $wallet->wallet_type_id){
                $eventCaseLog = 'คืนยอด Credit-OLD';  // บันทึก log สำหรับ Credit
                }else{
                    $eventCaseLog = 'คืนยอด Credit';  // บันทึก log สำหรับ Credit
                }
            } elseif ($event->event_case_name == 'Debit') {
                // Debit: คืนยอด โดยการเพิ่มยอดเงินในกระเป๋าเงิน
                $refundAmount = abs($event->grand_total); // บันทึกยอด Refund เป็นบวก
                $wallet->wallet_type_price += $refundAmount; // เพิ่มยอดเงินเข้าไปในกระเป๋า
                $eventCaseLog = 'คืนยอด Debit';  // บันทึก log สำหรับ Debit
            }

            // อัปเดตยอดเงินในกระเป๋า
            $wallet->save();

            // สร้างรหัสธุรกรรมการคืนเงิน
            $transactionNumber = $this->generateTransactionId();

            // บันทึกข้อมูลการทำธุรกรรม Refund สำหรับแต่ละ Wallet
            eventCaseModel::create([
                'event_case_log' => $eventCaseLog, // บันทึก log ของ Credit/Debit ที่ถูกคืน
                'event_case_name' => 'Refund',
                'event_case_status' => 'refund',
                'event_case_number' => $transactionNumber,
                'wallet_type_id' => $wallet->wallet_type_id, // บันทึก Wallet ID ที่คืนยอด
                'job_order_id' => $jobOrder->job_order_id,
                'transaction_id' => $event->transaction_id, // บันทึก Transaction ID ที่คืนยอด
                'grand_total' => $refundAmount, // ยอดคืน (ลบในกรณี Credit)
                'wallet_grand_total' => $wallet->wallet_type_price, // ยอดคงเหลือหลังจากคืนเงิน
                'created_by' => Auth::user()->name,
            ]);

            // อัปเดตสถานะของ event case เดิมเป็น "cancel"
            $event->event_case_status = 'cancel';
            $event->save(); // บันทึกการเปลี่ยนแปลงสถานะ
        }

        DB::commit();
        return response()->json(['message' => 'Refund completed successfully!'], 200);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['message' => 'Refund failed: ' . $e->getMessage()], 500);
    }


}

     

    



}
