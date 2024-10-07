<?php

namespace App\Models\eventcases;

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
        'wallet_type_id',
        'job_order_id',
        'transaction_id',
        'event_case_number',
        'grand_total',
        'wallet_grand_total',
        'created_by',
    ];

}
