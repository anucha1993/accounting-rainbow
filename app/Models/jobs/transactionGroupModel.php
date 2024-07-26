<?php

namespace App\Models\jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionGroupModel extends Model
{
    use HasFactory;
    protected $table = 'transaction_group';
    protected $primaryKey = 'transaction_group_id';
    protected $fillable = [
        'transaction_group_name',
        'transaction_group_type',
        'transaction_group_status',
    ];
}
