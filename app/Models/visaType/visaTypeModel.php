<?php

namespace App\Models\visaType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visaTypeModel extends Model
{
    use HasFactory;
    protected $table = 'visa_type';
    protected $primaryKey = 'visa_type_id';
    protected $fillable = [
        'visa_type_name',
        'visa_type_renew',
        'visa_type_from',
        'status',
    ];
}
