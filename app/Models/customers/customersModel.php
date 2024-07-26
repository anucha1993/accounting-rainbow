<?php

namespace App\Models\customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customersModel extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
      'customer_prefix',
      'customer_name',
      'customer_code',
      'customer_date_entry',
      'customer_nationality',
      'customer_passport',
      'customer_birthday',
      'customer_passport_expire_date',
      'customer_visa_type',
      'customer_re_entry',
      'customer_visa_date_expiry_0',
      'customer_visa_date_expiry_1',
      'customer_visa_date_expiry_2',
      'customer_visa_date_expiry_3',
      'customer_ninety_start',
      'customer_ninety_end',
      'customer_address_thailand',
      'customer_tel',
      'customer_contact_media',
      'customer_email',
      'customer_note',
      'created_by',
      'updated_by'

    ];

}
