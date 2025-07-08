<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\jobs\walletModel;

class AnalysisController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month');

        $query = DB::table('transactions')
            ->select(DB::raw('MONTH(transaction_date) as month'), DB::raw('SUM(transaction_amount) as total'))
            ->whereYear('transaction_date', $year);

        if ($month) {
            $query->whereMonth('transaction_date', $month);
        }

        $monthly = $query->groupBy(DB::raw('MONTH(transaction_date)'))->orderBy('month')->get();
        $total = $monthly->sum('total');

        // Job Order Status Analysis
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

        // Statement Transaction Analysis
        $jobOrderStatement = DB::table('transactions')
            ->join('job_order', 'transactions.transaction_job', '=', 'job_order.job_order_id')
            ->select(
                'job_order.job_order_number',
                'transactions.transaction_id',
                'transactions.transaction_type',
                'transactions.transaction_amount'
            )
            ->orderBy('job_order.job_order_number')
            ->orderBy('transactions.transaction_id')
            ->get();

        // Statement Transaction Chart Data
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
        $statementChartData = [
            'months' => $allMonths,
            'income' => $income,
            'expense' => $expense,
            'profit' => $profit
        ];

        // Wallet Analysis
        $walletBalances = walletModel::select('wallet_type_name', 'wallet_type_account_no', 'wallet_type_price')->get();

        return view('analysis.index', compact('monthly', 'total', 'jobOrderStatus', 'jobOrderStatement', 'statementChartData', 'walletBalances'));
    }
}
