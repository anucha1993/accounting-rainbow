<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceModel extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'service_id';
    protected $fillable = [
        'service_name',
        'service_group',
        'service_type',
        'service_other',
    ];
}
