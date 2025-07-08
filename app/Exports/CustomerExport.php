<?php

namespace App\Exports;

use App\Models\customers\customersModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings
{
    protected $filters;
    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = customersModel::query();
        // Filter ตามฟอร์ม
        if (!empty($this->filters['visaType'])) {
            $query->where('customer_visa_type', $this->filters['visaType']);
        }
        if (!empty($this->filters['Nationality'])) {
            $query->where('customer_nationality', $this->filters['Nationality']);
        }
        if (!empty($this->filters['passportNumber'])) {
            $query->where('customer_passport', 'like', '%' . $this->filters['passportNumber'] . '%');
        }
        if (!empty($this->filters['name'])) {
            $query->where('customer_name', 'like', '%' . $this->filters['name'] . '%');
        }
        if (!empty($this->filters['code'])) {
            $query->where('customer_code', 'like', '%' . $this->filters['code'] . '%');
        }
        if (!empty($this->filters['startDate']) && !empty($this->filters['endDate'])) {
            $query->whereBetween('customer_visa_date_expiry_0', [$this->filters['startDate'], $this->filters['endDate']]);
        }
        // เลือกฟิลด์ตาม visa type
        $fields = $this->getFieldsByVisaType($this->filters['selectedFormType'] ?? null);
        return $query->select($fields)->get();
    }

    public function headings(): array
    {
        $fields = $this->getFieldsByVisaType($this->filters['selectedFormType'] ?? null);
        // Mapping ชื่อหัวตารางสวยๆ
        $map = [
            // --- Retirement ---
            'customer_prefix' => 'Prefix',
            'customer_name' => 'Name',
            'customer_nationality' => 'Nationality',
            'customer_passport' => 'Passport No.',
            'customer_birthday' => 'Date of Birth',
            'customer_passport_expire_date' => 'Passport Expiry Date',
            'customer_visa_date_expiry_0' => 'Visa Expiry',
            'customer_re_entry' => 'Re-Entry',
            'customer_contact_media' => 'Contact',
            'customer_address_thailand' => 'Address In Thai',
            'customer_email' => 'E-Mail',
            'customer_note' => 'Note',
            // --- ED ---
            'customer_code' => 'Code',
            'customer_visa_date_expiry_1' => 'Extension1',
            'customer_visa_date_expiry_2' => 'Extension2',
            'customer_visa_date_expiry_3' => 'Extension3',
            'customer_date_entry' => 'Date of Entry',
            // --- Default/Other ---
            'customer_visa_type' => 'Visa Type',
            'marriage_certificate_no' => 'Marriage Certificate No.',
        ];
        return array_map(function($f) use ($map) {
            return $map[$f] ?? $f;
        }, $fields);
    }

    private function getFieldsByVisaType($formType)
    {
        switch ($formType) {
            case 'retirement':
                return [
                    'customer_prefix', 'customer_name', 'customer_nationality', 'customer_passport', 'customer_birthday',
                    'customer_passport_expire_date', 'customer_visa_date_expiry_0', 'customer_re_entry',
                    'customer_contact_media', 'customer_address_thailand', 'customer_email', 'customer_note',
                ];
            case 'ed':
                return [
                    'customer_name', 'customer_code', 'customer_nationality', 'customer_passport', 'customer_passport_expire_date',
                    'customer_visa_date_expiry_0', 'customer_visa_date_expiry_1', 'customer_visa_date_expiry_2', 'customer_visa_date_expiry_3',
                    'customer_date_entry', 'customer_contact_media', 'customer_note',
                ];
            case 'marriage':
                return [
                    'customer_code', 'customer_name', 'customer_passport', 'customer_visa_type', 'customer_visa_date_expiry_0', 'customer_nationality', 'marriage_certificate_no',
                ];
            default:
                return [
                    'customer_code', 'customer_name', 'customer_passport', 'customer_visa_type', 'customer_visa_date_expiry_0', 'customer_nationality',
                ];
        }
    }
}
