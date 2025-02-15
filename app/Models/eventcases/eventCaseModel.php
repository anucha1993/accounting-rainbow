<?php

namespace App\Models\eventcases;

use App\Models\jobs\JobOrderModel;
use App\Models\jobs\transactionModel;
use App\Models\jobs\walletModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventCaseModel extends Model
{
    use HasFactory;
    protected $table = 'event_case';
    protected $primaryKey = 'event_case_id';
    protected $fillable = [
        'event_case_log',
        'event_case_name',
        'event_case_status',
        'wallet_type_id',
        'job_order_id',
        'transaction_id',
        'job_transaction_id',
        'event_case_number',
        'grand_total',
        'wallet_grand_total',
        'created_by',
    ];


    public function wallet()
    {
        return $this->belongsTo(walletModel::class, 'wallet_type_id', 'wallet_type_id');
    }

    public function jobOrder()
    {
        return $this->belongsTo(JobOrderModel::class, 'job_order_id', 'job_order_id');
    }

    public function transactions()
    {
        return $this->belongsTo(transactionModel::class, 'job_order_id', 'transaction_job');
    }
    public function expenses()
    {
        $wallet = $this->wallet()->first();
        return $this->transactions()->where('transaction_type','expenses')->where('transaction_wallet',$wallet->wallet_type_id)->get()->sum('transaction_amount');
    }
    public function income()
    {
        $wallet = $this->wallet()->first();
        return $this->transactions()->where('transaction_type','income')->where('transaction_wallet',$wallet->wallet_type_id)->get()->sum('transaction_amount');
    }
    // public function Refund()
    // {
    //     $wallet = $this->wallet()->first();
    //     $refund = $this->where('wallet_type_id',$wallet->wallet_type_id)->where('event_case_name','Refund')->get()->sum('grand_total');
    //     return $refund;
    //     // return $this->transactions()->where('transaction_type','Refund')->where('transaction_wallet',$wallet->wallet_type_id)->get()->sum('transaction_amount');
    // }


}
