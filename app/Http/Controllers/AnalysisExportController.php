<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AnalysisExportController extends Controller
{
    public function exportJobOrderStatus(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month');

        $jobOrderQuery = DB::table('job_order')
            ->select(
                DB::raw('MONTH(job_order_date) as month'),
                'job_order_status',
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('job_order_date', $year);
        if ($month) {
            $jobOrderQuery->whereMonth('job_order_date', $month);
        }
        $jobOrderStatus = $jobOrderQuery->groupBy(DB::raw('MONTH(job_order_date)'), 'job_order_status')
            ->orderBy('month')
            ->get();

        $months = collect($jobOrderStatus)->pluck('month')->unique()->sort();
        $statuses = collect($jobOrderStatus)->pluck('job_order_status')->unique();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'เดือน');
        $col = 'B';
        foreach ($statuses as $status) {
            $sheet->setCellValue($col.'1', $status);
            $col++;
        }
        $row = 2;
        foreach ($months as $month) {
            $sheet->setCellValue('A'.$row, $month);
            $col = 'B';
            foreach ($statuses as $status) {
                $count = collect($jobOrderStatus)->first(function($item) use ($month, $status) {
                    return $item->month == $month && $item->job_order_status == $status;
                })?->count ?? 0;
                $sheet->setCellValue($col.$row, $count);
                $col++;
            }
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'job_order_status_analysis.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($temp_file);
        return response()->download($temp_file, $filename)->deleteFileAfterSend(true);
    }

    public function exportStatementChart(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month');

        $statementRaw = DB::table('transactions')
            ->join('job_order', 'transactions.transaction_job', '=', 'job_order.job_order_id')
            ->select(
                DB::raw('MONTH(transactions.transaction_date) as month'),
                'transactions.transaction_type',
                DB::raw('SUM(transactions.transaction_amount) as total')
            )
            ->whereYear('transactions.transaction_date', $year)
            ->when($month, function($q) use ($month) {
                $q->whereMonth('transactions.transaction_date', $month);
            })
            ->where('job_order.job_order_status', 'close')
            ->groupBy(DB::raw('MONTH(transactions.transaction_date)'), 'transactions.transaction_type')
            ->orderBy('month')
            ->get();
        $incomeMonths = $statementRaw->where('transaction_type', 'income')->pluck('month')->all();
        $expenseMonths = $statementRaw->where('transaction_type', 'expenses')->pluck('month')->all();
        $allMonths = collect(array_unique(array_merge($incomeMonths, $expenseMonths)))->sort()->values()->all();
        $income = [];
        $expense = [];
        $profit = [];
        foreach ($allMonths as $m) {
            $incomeVal = $statementRaw->where('month', $m)->where('transaction_type', 'income')->first()->total ?? 0;
            $expenseVal = $statementRaw->where('month', $m)->where('transaction_type', 'expenses')->first()->total ?? 0;
            $income[] = (float)$incomeVal;
            $expense[] = (float)$expenseVal;
            $profit[] = (float)$incomeVal - (float)$expenseVal;
        }
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'เดือน');
        $sheet->setCellValue('B1', 'รายรับ');
        $sheet->setCellValue('C1', 'รายจ่าย');
        $sheet->setCellValue('D1', 'กำไร');
        $row = 2;
        foreach ($allMonths as $idx => $month) {
            $sheet->setCellValue('A'.$row, $month);
            $sheet->setCellValue('B'.$row, $income[$idx]);
            $sheet->setCellValue('C'.$row, $expense[$idx]);
            $sheet->setCellValue('D'.$row, $profit[$idx]);
            $row++;
        }
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'statement_transaction_analysis.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($temp_file);
        return response()->download($temp_file, $filename)->deleteFileAfterSend(true);
    }

    public function exportWalletAnalysis(Request $request)
    {
        $wallets = DB::table('wallet_type')->select('wallet_type_name', 'wallet_type_account_no', 'wallet_type_price')->get();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Wallet Name');
        $sheet->setCellValue('B1', 'Account No');
        $sheet->setCellValue('C1', 'Balance (บาท)');
        $row = 2;
        foreach ($wallets as $wallet) {
            $sheet->setCellValue('A'.$row, $wallet->wallet_type_name);
            $sheet->setCellValue('B'.$row, $wallet->wallet_type_account_no);
            $sheet->setCellValue('C'.$row, $wallet->wallet_type_price);
            $row++;
        }
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'wallet_analysis.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($temp_file);
        return response()->download($temp_file, $filename)->deleteFileAfterSend(true);
    }
}
