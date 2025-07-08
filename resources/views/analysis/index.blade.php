@extends('layouts.main')

@section('content')
<div class="container-fluid py-5" style="background: #f4f6fb; min-height: 100vh;">
    <div class="row justify-content-center mb-5">
        <div class="col-12 col-lg-7">
            <div class="card shadow-lg border-0 rounded-5 overflow-hidden" style="min-height: 260px; min-width: 420px;">
                <div class="card-header bg-primary bg-gradient text-white border-0 text-center" style="padding: 2rem 1.5rem;">
                    <h2 class="mb-0 fw-bold" style="letter-spacing: 1px;">Analysis Dashboard</h2>
                </div>
                <div class="card-body bg-white" style="padding: 2rem 1.5rem;">
                    <form method="GET" action="{{ route('analysis.index') }}" class="row g-3 align-items-end justify-content-center">
                        <div class="col-12 col-md-5">
                            <label class="form-label fw-semibold">ปี</label>
                            <input type="number" name="year" class="form-control rounded-pill px-4" value="{{ request('year', date('Y')) }}">
                        </div>
                        <div class="col-12 col-md-5">
                            <label class="form-label fw-semibold">เดือน (ถ้าไม่เลือกจะแสดงทั้งปี)</label>
                            <input type="number" name="month" class="form-control rounded-pill px-4" min="1" max="12" value="{{ request('month') }}">
                        </div>
                        <div class="col-12 col-md-2 d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">วิเคราะห์</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="card shadow-lg border-0 rounded-5 mb-5 overflow-hidden" style="min-height: 420px; min-width: 420px;">
                <div class="card-header bg-info bg-gradient text-white border-0 d-flex align-items-center justify-content-between" style="padding: 1.25rem;">
                    <h4 class="mb-0 fw-bold">จำนวน Job Order รายเดือน (แยกตามสถานะ)</h4>
                    <a href="{{ route('analysis.export', request()->all()) }}" class="btn btn-success btn-lg rounded-pill fw-bold shadow ms-2">
                        Export Job Order Excel
                    </a>
                </div>
                <div class="card-body bg-white d-flex flex-column align-items-center justify-content-center" style="padding: 2rem 1rem; min-height: 300px;">
                    <canvas id="jobOrderChart" height="120" style="max-width: 100%; max-height: 320px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Statement Transaction Analysis -->
    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="card shadow-lg border-0 rounded-5 mb-5 overflow-hidden">
                <div class="card-header bg-success bg-gradient text-white border-0 d-flex align-items-center justify-content-between" style="padding: 1.25rem;">
                    <h4 class="mb-0 fw-bold">Statement Transaction (แยกประเภท รายรับ/รายจ่าย และคำนวณกำไร)</h4>
                    <a href="{{ route('analysis.export-statement', request()->all()) }}" class="btn btn-success btn-lg rounded-pill fw-bold shadow ms-2">
                        Export Statement Excel
                    </a>
                </div>
                <div class="card-body bg-white" style="padding: 2rem 1.5rem;">
                    <div class="table-responsive d-none"><!-- ซ่อนตารางไว้ก่อน -->
                        <table class="table table-bordered table-hover align-middle mb-0 rounded-4 overflow-hidden" style="background: #fafdff;">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Job Order</th>
                                    <th class="text-center">Transaction</th>
                                    <th class="text-center">ประเภท</th>
                                    <th class="text-end">รายรับ (บาท)</th>
                                    <th class="text-end">รายจ่าย (บาท)</th>
                                    <th class="text-end">กำไร (บาท)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalIncome = 0;
                                    $totalExpense = 0;
                                    $totalProfit = 0;
                                @endphp
                                @foreach($jobOrderStatement as $row)
                                    <tr>
                                        <td class="text-center">{{ $row->job_order_number }}</td>
                                        <td class="text-center">{{ $row->transaction_id }}</td>
                                        <td class="text-center">{{ $row->transaction_type == 'income' ? 'รายรับ' : 'รายจ่าย' }}</td>
                                        <td class="text-end">{{ $row->transaction_type == 'income' ? number_format($row->transaction_amount, 2) : '-' }}</td>
                                        <td class="text-end">{{ $row->transaction_type == 'expense' ? number_format($row->transaction_amount, 2) : '-' }}</td>
                                        <td class="text-end">
                                            @php
                                                if ($row->transaction_type == 'income') {
                                                    $totalIncome += $row->transaction_amount;
                                                    $totalProfit += $row->transaction_amount;
                                                } else {
                                                    $totalExpense += $row->transaction_amount;
                                                    $totalProfit -= $row->transaction_amount;
                                                }
                                            @endphp
                                            {{ number_format($totalProfit, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <th colspan="3" class="text-end">รวม</th>
                                    <th class="text-end">{{ number_format($totalIncome, 2) }}</th>
                                    <th class="text-end">{{ number_format($totalExpense, 2) }}</th>
                                    <th class="text-end">{{ number_format($totalProfit, 2) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Statement Transaction Chart -->
                    <div class="mt-5">
                        <h5 class="fw-bold mb-3 text-center">กราฟเปรียบเทียบรายรับ / รายจ่าย / กำไร (รายเดือน)</h5>
                        <canvas id="statementChart" height="100" style="max-width: 100%; max-height: 260px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wallet Analysis -->
    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="card shadow-lg border-0 rounded-5 mb-5 overflow-hidden" style="min-height: 320px; min-width: 420px;">
                <div class="card-header bg-warning bg-gradient text-dark border-0 d-flex align-items-center justify-content-between" style="padding: 1.25rem;">
                    <h4 class="mb-0 fw-bold">Wallet Analysis (ยอดคงเหลือแต่ละ Wallet)</h4>
                    <a href="{{ route('analysis.export-wallet') }}" class="btn btn-success btn-lg rounded-pill fw-bold shadow ms-2">
                        Export Wallet Excel
                    </a>
                </div>
                <div class="card-body bg-white" style="padding: 2rem 1.5rem;">
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-hover align-middle mb-0 rounded-4 overflow-hidden" style="background: #fafdff;">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Wallet Name</th>
                                    <th class="text-center">Account No</th>
                                    <th class="text-end">Balance (บาท)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($walletBalances as $wallet)
                                    <tr>
                                        <td class="text-center">{{ $wallet->wallet_type_name }}</td>
                                        <td class="text-center">{{ $wallet->wallet_type_account_no }}</td>
                                        <td class="text-end">{{ number_format($wallet->wallet_type_price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <canvas id="walletChart" height="100" style="max-width: 100%; max-height: 220px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Job Order Chart
        const ctx = document.getElementById('jobOrderChart').getContext('2d');
        const months = @json(collect($jobOrderStatus)->pluck('month')->unique()->sort()->values());
        const statuses = @json(collect($jobOrderStatus)->pluck('job_order_status')->unique()->values());
        const raw = @json($jobOrderStatus);
        const palette = [
            '#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff', '#ff9f40', '#e57373', '#81c784', '#ffd54f', '#64b5f6'
        ];
        // Prepare grouped bar data: each month is a group, each status is a bar in the group
        const chartData = {
            labels: months.map(m => 'เดือน ' + m),
            datasets: statuses.map((status, idx) => ({
                label: status,
                data: months.map(month => {
                    const found = raw.find(item => item.month == month && item.job_order_status == status);
                    return found ? found.count : 0;
                }),
                backgroundColor: palette[idx % palette.length],
                borderColor: palette[idx % palette.length],
                borderWidth: 3,
                borderRadius: 4,
                maxBarThickness: 16,
                barPercentage: 1.0, // as close as possible
                categoryPercentage: 0.1 // as close as possible
            }))
        };
        new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                aspectRatio: 2.2,
                plugins: {
                    legend: { position: 'top', labels: { font: { size: 16 } } },
                    title: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${context.parsed.y} รายการ`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        stacked: false,
                        grid: { display: false },
                        ticks: { font: { size: 15 } }
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true,
                        ticks: { font: { size: 15 }, stepSize: 1 }
                    }
                }
            }
        });

        // Statement Transaction Chart
        const stCtx = document.getElementById('statementChart').getContext('2d');
        const stData = @json($statementChartData);
        const stMonths = stData.months.map(m => 'เดือน ' + m);
        const stChart = new Chart(stCtx, {
            type: 'bar',
            data: {
                labels: stMonths,
                datasets: [
                    {
                        label: 'รายรับ',
                        data: stData.income,
                        backgroundColor: '#36a2eb',
                        borderColor: '#36a2eb',
                        borderWidth: 2,
                        borderRadius: 4,
                        maxBarThickness: 18,
                        categoryPercentage: 0.05,
                        barPercentage: 1.0
                    },
                    {
                        label: 'รายจ่าย',
                        data: stData.expense,
                        backgroundColor: '#ff6384',
                        borderColor: '#ff6384',
                        borderWidth: 2,
                        borderRadius: 4,
                        maxBarThickness: 18,
                        categoryPercentage: 0.05,
                        barPercentage: 1.0
                    },
                    {
                        label: 'กำไร',
                        data: stData.profit,
                        backgroundColor: '#4bc0c0',
                        borderColor: '#4bc0c0',
                        borderWidth: 2,
                        borderRadius: 4,
                        maxBarThickness: 18,
                        categoryPercentage: 0.05,
                        barPercentage: 1.0
                    }
                ]
            },
            options: {
                responsive: true,
                aspectRatio: 2.2,
                plugins: {
                    legend: { position: 'top', labels: { font: { size: 15 } } },
                    title: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${Number(context.parsed.y).toLocaleString()} บาท`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 14 } }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { font: { size: 14 }, callback: value => value.toLocaleString() }
                    }
                }
            }
        });

        // Wallet Chart
        const walletCtx = document.getElementById('walletChart').getContext('2d');
        const walletLabels = @json($walletBalances->pluck('wallet_type_name'));
        const walletData = @json($walletBalances->pluck('wallet_type_price'));
        new Chart(walletCtx, {
            type: 'bar',
            data: {
                labels: walletLabels,
                datasets: [{
                    label: 'ยอดคงเหลือ (บาท)',
                    data: walletData,
                    backgroundColor: '#ffd54f',
                    borderColor: '#ffb300',
                    borderWidth: 2,
                    borderRadius: 4,
                    maxBarThickness: 28
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 2.2,
                plugins: {
                    legend: { display: false },
                    title: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${Number(context.parsed.y).toLocaleString()} บาท`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 15 } }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { font: { size: 15 }, callback: value => value.toLocaleString() }
                    }
                }
            }
        });
    });
</script>
@endsection
