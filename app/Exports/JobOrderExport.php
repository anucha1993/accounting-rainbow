<?php

namespace App\Exports;

use App\Models\jobs\JobOrderModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobOrderExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = JobOrderModel::select([
            'job_order_id',
            'job_order_number',
            'job_order_customer',
            'job_order_date',
            'job_order_finish_date',
            'job_order_source_channel',
            'job_order_income',
            'job_order_expenses',
            'job_order_profit',
            'job_order_status',
            'job_order_details',
            'job_order_note',
            'job_order_receipt',
            'job_order_detail',
            'job_order_service_other',
            'job_order_type',
            'created_by',
            'update_by',
        ]);

        // Apply filters
        if (!empty($this->filters['JobStatus'])) {
            $query->where('job_order_status', $this->filters['JobStatus']);
        }
        if (!empty($this->filters['Name'])) {
            $query->where('job_order_customer', 'like', '%' . $this->filters['Name'] . '%');
        }
        if (!empty($this->filters['channel'])) {
            $query->where('job_order_source_channel', $this->filters['channel']);
        }
        if (!empty($this->filters['passport'])) {
            $query->where('job_order_receipt', 'like', '%' . $this->filters['passport'] . '%');
        }
        if (!empty($this->filters['receipt'])) {
            $query->where('job_order_receipt', 'like', '%' . $this->filters['receipt'] . '%');
        }
        if (!empty($this->filters['startDate']) && !empty($this->filters['endDate'])) {
            $query->whereBetween('job_order_date', [$this->filters['startDate'], $this->filters['endDate']]);
        }
        if (!empty($this->filters['Nationality'])) {
            $query->where('job_order_customer_nationality', $this->filters['Nationality']);
        }
        // เพิ่ม filter อื่นๆ ตามต้องการ

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Job Order ID',
            'Job Order Number',
            'Customer',
            'Job Order Date',
            'Finish Date',
            'Source Channel',
            'Income',
            'Expenses',
            'Profit',
            'Status',
            'Details',
            'Note',
            'Receipt',
            'Detail',
            'Service Other',
            'Type',
            'Created By',
            'Updated By',
        ];
    }
}
