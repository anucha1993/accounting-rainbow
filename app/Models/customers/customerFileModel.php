<?php

namespace App\Models\customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerFileModel extends Model
{
    use HasFactory;
    
    protected $table = 'customer_file';
    protected $primaryKey = 'customer_file_id';
    protected $fillable = [
        'customer_file_customer_id',
        'customer_file_name',
        'customer_file_url',
    ];
}
