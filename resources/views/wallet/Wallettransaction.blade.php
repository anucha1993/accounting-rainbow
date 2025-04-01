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

                         {{-- <table class="table stylish-table mt-4 no-wrap v-middle">
                            <thead>
                                <tr>
                                    <th class="border-0 text-muted font-weight-medium" style="width: 90px">
                                        เลขที่ธุรกรรม
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium" style="width: 90px">
                                        ประเภท
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium">
                                        รายละเอียด
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium">
                                        ยอด
                                    </th>
                                    <th class="border-0 text-muted font-weight-medium">
                                        ยอดคงเหลือ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($eventCase1 as $item1)
                                    <tr>
                                        <td>
                                            {{ $item1->event_case_number }} {{ $item1->event_case_id}}
                                        </td>
                                        <td>
                                            <span
                                                class="
                                      @if ($item1->event_case_name === 'Credit') text-success        
                                      @elseif ($item1->event_case_name === 'Debit')
                                          text-danger        
                                      @elseif ($item1->event_case_name === 'Refund')
                                          text-warning @endif
                                      ">{{ $item1->event_case_log }}</span>
                                        </td>
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
                        </table>  --}}

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
                                        <td><a href="{{route('joborder.edit',1)}}">{{$item->jobOrder->job_order_number ? $item->jobOrder->job_order_number : 'NUll'}}</a></td>
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
                                    <td>{{$item->transferWallet->wallet_type_name}}</td>
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
