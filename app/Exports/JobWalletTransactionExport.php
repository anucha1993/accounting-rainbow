<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use App\Models\eventcases\eventCaseModel;

class JobWalletTransactionExport implements FromCollection, WithHeadings, Responsable
{
    protected $eventCases;
    protected $transactions;
    protected $walletModel;
    public function __construct($eventCases, $transactions, $walletModel)
    {
        $this->eventCases = $eventCases;
        $this->transactions = $transactions;
        $this->walletModel = $walletModel;
    }

    public function collection()
    {
        $result = [];
        foreach ($this->eventCases as $item1) {
            $transaction = $this->transactions->where('transaction_id', $item1->job_transaction_id)->first();
            $result[] = [
                $item1->event_case_number,
                $item1->event_case_log,
                $transaction ? date('d/m/Y', strtotime($transaction->transaction_date)) : '',
                'Job No : ' . $item1->job_order_number . chr(10) .
                'Product id : ' . ($item1->job_trasaction_name ?? 'N/A') . chr(10) .
                'Wallet Name : ' . ($this->walletModel->wallet_type_name ?? 'N/A'),
                number_format($item1->grand_total, 2, '.', ','),
                number_format($item1->wallet_grand_total, 2, '.', ','),
            ];
        }
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'เลขที่ธุรกรรม',
            'ประเภท',
            'Transaction Date',
            'รายละเอียด',
            'ยอด',
            'ยอดคงเหลือ',
        ];
    }

    public function toResponse($request)
    {
        return \Maatwebsite\Excel\Facades\Excel::download($this, 'job_wallet_transactions.xlsx');
    }
}
