<?php

namespace App\Models\jobTrasaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobTrasactionModel extends Model
{
    use HasFactory;
    protected $table = 'job_trasaction';
    protected $primaryKey = 'job_trasaction_id';
    protected $fillable = [
        'job_trasaction_name',
        'job_trasaction_status',
        'job_trasaction_type',
        'job_type',
        'job_detail',
    ];

}
