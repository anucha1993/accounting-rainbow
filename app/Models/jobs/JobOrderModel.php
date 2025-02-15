<?php

namespace App\Models\jobs;

use App\Models\eventcases\eventCaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrderModel extends Model
{
    use HasFactory;
    protected $table = 'job_order';
    protected $primaryKey = 'job_order_id';
    protected $fillable = [
        'job_order_number',
        'job_order_customer',
        'job_order_date',
        'job_order_source_channel',
        'job_order_finish_date',
        'job_order_income',
        'job_order_expenses',
        'job_order_profit',
        'job_order_status',
        'job_order_details',
        'job_order_note',
        'job_order_receipt',
        'job_order_detail',
        'job_order_service_other',
        'job_order_type',
        'created_by',
        'update_by',
 
    ];

    // public function eventCase()
    // {
    //     return $this->belongsTo(eventCaseModel::class, 'job_order_id', 'job_order_id');
    // }

}
