<?php

namespace App\Models\transfer;

use App\Models\jobs\walletModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transferModel extends Model
{
    use HasFactory;
    protected $table = 'transfer';
    protected $primaryKey = 'transfer_id';
    protected $fillable = [
        'transfer_date',
        'transfer_type',
        'wallet_type_id',
        'transfer_price',
        'wallet_transfer',
        'created_by',
    ];

    public function wallet()
    {
        return $this->belongsTo(walletModel::class, 'wallet_type_id', 'wallet_type_id');
    }
    public function transferWallet()
    {
        return $this->belongsTo(walletModel::class, 'wallet_transfer', 'wallet_type_id');
    }
}
