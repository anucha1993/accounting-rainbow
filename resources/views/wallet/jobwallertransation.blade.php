@extends('layouts.main')

@section('content')
    <div class="container-fluid page-content">
        <div class="card">
            <div class="card-body">
                <h5> <span class="round text-white d-inline-block text-center rounded-circle bg-success">
                        <i data-feather="dollar-sign" class="mdi mdi-cash-usd"></i></span> ชื่อบัญชี :
                    {{ $walletModel->wallet_type_name }} &nbsp; &nbsp;เลขบัญชี : {{ $walletModel->wallet_type_account_no }}
                    <span class="float-end text-success">ยอดคงเหลือ :
                        {{ number_format($walletModel->wallet_type_price, 2, '.', ',') }}</span>
                </h5>

            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <form action="" method="get">
                        <div class="rwo">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    {{-- <div class="input-group mb-3">
                                        <span class="input-group-text" for="">กรอกข้อมูล</span>
                                        <input type="text" class="form-control" name="search" placeholder="Search.." value="{{$request->search}}">
                                        <button class="btn btn-success">Search</button>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="form-group">
                        <form id="exportForm" action="{{ route('wallet.job.export', [$jobOrderId, $walletModel->wallet_type_id]) }}" method="GET" target="_blank">
                            <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">
                            <input type="hidden" name="per_page" value="{{ $eventCase1->perPage() }}">
                            <input type="hidden" name="search" value="{{ request()->get('search', '') }}">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-file-excel-o"></i> Export Excel
                            </button>
                        </form>

                        <table class="table stylish-table mt-4 no-wrap v-middle">
                            <thead>
                                <tr>
                                    <th class="border-0 text-muted font-weight-medium" style="width: 90px">
                                        เลขที่ธุรกรรม
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium" style="width: 90px">
                                        ประเภท
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium" style="width: 90px">
                                        Transaction Date
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium" style="width: 250px">
                                        รายละเอียด
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium" style="width: 90px">
                                        ยอด
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium" style="width: 90px">
                                        ยอดคงเหลือ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($eventCase1 as $item1)
                                @php

                                $transaction = $transactions->Where('transaction_id',$item1->job_transaction_id)->first();
                                 @endphp

                                    <tr>
                                        {{-- <td>{{$item1->event_case_id}}</td> --}}
                                        <td>{{ $item1->event_case_number }}</td>
                                        <td><span class="
                                      @if ($item1->event_case_name === 'Credit') text-success        
                                      @elseif ($item1->event_case_name === 'Debit')
                                          text-danger        
                                      @elseif ($item1->event_case_name === 'Refund')
                                          text-warning @endif
                                      ">{{ $item1->event_case_log }}</span>
                                        </td>
                                        {{-- <td>{{$item1->transaction_id}}</td> --}}
                                        <td>{{date('d/m/Y',strtotime($transaction->transaction_date))}}</td>
                                        <td>

                                            <h6 class="mb-0 font-weight-medium">
                                                <a href="javascript:void(0)" class="link">Job No :
                                                    {{ $item1->job_order_number }} </a>
                                            </h6>
                                            <small class="text-muted">Product id :
                                                {{ $item1->job_trasaction_name ?? 'N/A' }}</small><br>
                                            <small class="text-muted">Wallet Name :
                                                {{ $walletModel->wallet_type_name ?? 'N/A' }}</small>
                                        </td>
                                        <td>
                                            <h5
                                                class="  @if ($item1->event_case_name === 'Credit') text-success        
                                      @elseif ($item1->event_case_name === 'Debit')
                                          text-danger        
                                      @elseif ($item1->event_case_name === 'Refund')
                                          text-warning @endif">
                                                {{ number_format($item1->grand_total, 2, '.', ',') }}</h5>
                                            <!-- แก้ไขให้เป็นฟิลด์ที่ต้องการ -->
                                        </td>
                                        <td>
                                            <h5>{{ number_format($item1->wallet_grand_total, 2, '.', ',') }}</h5>
                                            <!-- แก้ไขให้เป็นฟิลด์ที่ต้องการ -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Found Data</td>
                                        <!-- เพิ่ม colspan เพื่อให้ข้อมูลเต็มทุกคอลัมน์ -->
                                    </tr>
                                @endforelse



                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
