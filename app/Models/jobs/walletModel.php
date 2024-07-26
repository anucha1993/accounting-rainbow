<?php

namespace App\Models\jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class walletModel extends Model
{
    use HasFactory;
    protected $table = 'wallet_type';
    protected $primaryKey = 'wallet_type_id';
    protected $fillable = [
        'wallet_type_name',
        'wallet_type_account_no',
        'wallet_type_price',
    ];
}
