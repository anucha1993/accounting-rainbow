<?php

namespace App\Models\jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
