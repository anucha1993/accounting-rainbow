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
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" for="">กรอกข้อมูล</span>
                                        <input type="text" class="form-control" name="search" placeholder="Search.." value="{{$request->search}}">
                                        <button class="btn btn-success">Search</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="form-group">


                        <div class="d-flex justify-content-end mb-2">
                            <form id="exportWalletForm" action="{{ route('wallet.export.transactions') }}" method="GET" target="_blank" class="d-flex justify-content-end mb-2" style="margin-bottom:0;">
                                <input type="hidden" name="wallet_type_id" value="{{ $walletModel->wallet_type_id }}">
                                <input type="hidden" name="search" id="exportWalletSearch">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-file-excel-o"></i> Export Excel (ธุรกรรมบัญชี)
                                </button>
                            </form>
                        </div>

                        <table class="table stylish-table mt-4 no-wrap v-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Job No.</th>
                                    <th>วันที่ทำธุรกรรม</th>
                                    <th>รายจ่าย</th>
                                    <th>รายรับ</th>
                                    
                                    <th>ยอดทั้งหมด</th>
                                    <th>ยอดคงเหลือในบัญชี</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                use App\Models\eventcases\eventCaseModel;
                                @endphp
                                @forelse ($eventCase as $key => $item)
                                @php
                                 $maxEventCase = eventCaseModel::find($item->max_event_case_id);
                                 @endphp

                                  @if ($item->jobOrder)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="{{route('joborder.edit',$item->jobOrder->job_order_id)}}">{{$item->jobOrder->job_order_number ? $item->jobOrder->job_order_number : 'NUll'}}</a></td>
                                        <td>{{date('d/m/Y',strtotime($item->transactions->transaction_date))}}</td>
                                        <td class="text-danger">{{ number_format($item->expenses(),2)}}</td>
                                        <td class="text-success">{{ number_format($item->income(),2)}}</td>
                                         <td>{{number_format($item->income()-$item->expenses(),2)}}</td>
                                         <td>{{number_format($item->max_wallet_grand_total = $maxEventCase ? $maxEventCase->wallet_grand_total : 0.00,2)}}</td>
                                         <td><a href="{{route('wallet.jobtransaction',[$item->jobOrder->job_order_id,$item->wallet_type_id])}}">รายละเอียด</a></td>
                                    </tr>

                                    @else

                                    {{-- <tr>
                                        <td>{{$key+1}}</td>
                                         <td><a href="{{route('joborder.edit',1)}}">{{$item->jobOrder->job_order_number ? $item->jobOrder->job_order_number : 'NUll'}}</a></td>
                                        <td>NULL</td>
                                        <td class="text-danger">{{ number_format($item->expenses(),2)}}</td>
                                        <td class="text-success">{{ number_format($item->income(),2)}}</td>
                                         <td>{{number_format($item->income()-$item->expenses(),2)}}</td>
                                         <td>{{number_format($item->max_wallet_grand_total = $maxEventCase ? $maxEventCase->wallet_grand_total : 0.00,2)}}</td>
                                         <td>NULL</td>
                                        <td><a href="{{route('wallet.jobtransaction',[$item->jobOrder->job_order_id,$item->wallet_type_id])}}">รายละเอียด</a></td> 
                                    </tr> --}}
                                      
                                    @endif
                                @empty
                                    
                                @endforelse

                            </tbody>

                        </table>


                        {!! $eventCase->withQueryString()->links('pagination::bootstrap-5') !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <form action="" method="get">
                        <div class="rwo">
                            <div class="col-md-12">
                              
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="form-group">
                        <table class="table stylish-table mt-4 no-wrap v-middle table-transfer" >
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่ทำธุรกรรม</th>
                                    <th>ประเภท</th>
                                    <th>โอนจากบัญชี</th>
                                    <th>โอนมาบัญชี</th>
                                    <th>จำนวนเงิน</th>
                                    <th>ผู้ทำธุรกรรม</th>
                                </tr>
                            </thead>
                           <tbody>
                            @forelse ($transfers as $key => $item)
    
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{date('d/m/Y',strtotime($item->transfer_date))}}</td>
                                    <td>{{$item->transfer_type}}</td>
                                    <td>{{$item->wallet->wallet_type_name}}</td>
                                    <td>{{ $item->transferWallet?->wallet_type_name ?? 'บัญชีถูกลบ' }}</td>
                                    <td>{{number_format($item->transfer_price,2)}}</td>
                                    <td>{{$item->created_by}}</td>
                                </tr>
                            @empty
                                
                            @endforelse
                           </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>

@endsection

@section('scripts')
<script>
    // sync search value to export form before submit
    document.getElementById('exportWalletForm').addEventListener('submit', function(e) {
        document.getElementById('exportWalletSearch').value = document.querySelector('input[name=search]').value;
    });
</script>
@endsection
