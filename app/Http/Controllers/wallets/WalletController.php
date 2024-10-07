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
                'event_case_log' => 'เติมเงิน',
                'event_case_name' => 'Credit',
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
                'event_case_log' => 'ถอนเงิน',
                'event_case_name' => 'Debit',
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
     
             // ดึงรายการธุรกรรมที่เกี่ยวข้องกับ job_order_id ทั้งหมด
             $eventCases = eventCaseModel::where('job_order_id', $jobOrder->job_order_id)->get();
     
             $totalCredit = 0;
             $totalDebit = 0;
     
             // วนลูปเพื่อคำนวณยอดรวมของ credit และ debit
             foreach ($eventCases as $event) {
                 if ($event->event_case_name == 'Credit') {
                     $totalCredit += $event->grand_total; // รวมยอด credit
                 } elseif ($event->event_case_name == 'Debit') {
                     $totalDebit += $event->grand_total; // รวมยอด debit
                 }
             }
     
             // คำนวณยอดสุทธิที่ต้องคืนเงิน (refund)
             $refundAmount = $totalCredit - $totalDebit;
     
             if ($refundAmount > 0) {
                 // ดึงข้อมูลกระเป๋าเงินที่เกี่ยวข้อง
                 $wallet = walletModel::find($eventCases->first()->wallet_type_id);
     
                 // ทำการคืนเงิน (เพิ่มยอดเงินกลับ)
                 $wallet->wallet_type_price += $refundAmount;
                 $wallet->save();
     
                 // สร้างรหัสธุรกรรมการคืนเงิน
                 $transactionNumber = $this->generateTransactionId();
     
                 // บันทึกข้อมูลการทำธุรกรรม Refund
                 eventCaseModel::create([
                     'event_case_log' => 'Refund',
                     'event_case_name' => 'Refund',
                     'event_case_number' => $transactionNumber,
                     'wallet_type_id' => $wallet->wallet_type_id,
                     'job_order_id' => $jobOrder->job_order_id,
                     'grand_total' => $refundAmount,
                     'wallet_grand_total' => $wallet->wallet_type_price,
                     'created_by' => Auth::user()->name,
                 ]);
     
                 DB::commit();
                 return response()->json(['message' => 'Refund completed successfully!', 'refund_amount' => $refundAmount], 200);
             } else {
                 DB::rollBack();
                 return response()->json(['message' => 'No amount to refund!'], 400);
             }
         } catch (\Exception $e) {
             DB::rollBack();
             throw $e;
         }
     }
     

    



}
