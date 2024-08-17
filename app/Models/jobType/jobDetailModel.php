<?php

namespace App\Models\jobType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobDetailModel extends Model
{
    use HasFactory;
    protected $table = 'job_detail';
    protected $primaryKey = 'job_detail_id';
    protected $fillable = [
        'job_detail_name',
        'job_type',
        'job_detail_status',
    ];
}
