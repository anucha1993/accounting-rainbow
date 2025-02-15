<?php

namespace App\Models\jobs;

use Illuminate\Database\Eloquent\Model;
use App\Models\eventcases\eventCaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transactionModel extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'transaction_type',
        'transaction_date',
        'transaction_wallet',
        'transaction_amount',
        'transaction_job',
        'transaction_group',
        'transaction_job_number',
    ];

     public function eventCase()
    {
        return $this->belongsTo(eventCaseModel::class, 'transaction_id', 'job_transaction_id');
    }



}
