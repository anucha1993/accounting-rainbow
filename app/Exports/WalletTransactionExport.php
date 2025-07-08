<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use App\Models\eventcases\eventCaseModel;

class WalletTransactionExport implements FromCollection, WithHeadings, Responsable
{
    protected $filters;
    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = eventCaseModel::query();
        if (!empty($this->filters['wallet_type_id'])) {
            $query->where('wallet_type_id', $this->filters['wallet_type_id']);
        }
        if (!empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('event_case_number', 'like', "%$search%")
                  ->orWhere('event_case_log', 'like', "%$search%")
                  ->orWhere('job_order_id', 'like', "%$search%")
                  ->orWhere('grand_total', 'like', "%$search%")
                  ->orWhere('wallet_grand_total', 'like', "%$search%")
                  ->orWhere('created_by', 'like', "%$search%")
                  ;
            });
        }
        $rows = $query->orderByDesc('event_case_id')->get([
            'event_case_number',
            'job_order_id',
            'created_at',
            'grand_total',
            'wallet_grand_total',
        ]);
        // Format export: No., Job No., วันที่ทำธุรกรรม, รายจ่าย, รายรับ, ยอดทั้งหมด, ยอดคงเหลือในบัญชี
        $result = [];
        $no = 1;
        foreach ($rows as $item) {
            $expense = $item->grand_total < 0 ? abs($item->grand_total) : 0;
            $income = $item->grand_total > 0 ? $item->grand_total : 0;
            $result[] = [
                $no++,
                ' '.$item->jobOrder->job_order_number,
                $item->created_at ? date('d/m/Y', strtotime($item->created_at)) : '',
                number_format($expense, 2, '.', ''),
                number_format($income, 2, '.', ''),
                number_format($item->grand_total, 2, '.', ''),
                number_format($item->wallet_grand_total, 2, '.', ''),
            ];
        }
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'No.',
            'Job No.',
            'วันที่ทำธุรกรรม',
            'รายจ่าย',
            'รายรับ',
            'ยอดทั้งหมด',
            'ยอดคงเหลือในบัญชี',
        ];
    }

    public function toResponse($request)
    {
        return \Maatwebsite\Excel\Facades\Excel::download($this, 'wallet_transactions.xlsx');
    }
}
