@extends('layouts.main')

@section('content')
    <div class="container-xl page-content " id="customer-index">
        <div class="card">
            <div class="card-body">

                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title line" id="myLargeModalLabel">
                        Create Job Order
                    </h4>
               </div>
               
                <br>
                <form action="{{ route('joborder.update',$jobOrder->job_order_id) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" id="job-id" value="{{ $jobOrder->job_order_id }}">
                    <input type="hidden" id="job-date" value="{{ $jobOrder->job_order_date }}">
                    <input type="hidden" id="job-number" value="{{ $jobOrder->job_order_number }}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text  bg-light-dark" id="basic-addon2">Job Date</span>
                                <input type="date" name="job_order_date" class="form-control"
                                    value="{{ date('Y-m-d', strtotime($jobOrder->job_order_date)) }}">

                            </div>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-2 mb-3 ">
                            <b class="float-end">Status : <span class="@if($jobOrder->job_order_status === 'open') text-primary @else text-success @endif">{{$jobOrder->job_order_status}}</span></b>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Job No : {{ $jobOrder->job_order_number }} </i></label>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                            
                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Job Type <label class="text-danger"> *</label></span>
                                        <select name="job_order_type" id="job-order-type" class="form-select job-order-type">
                                            <option value="service" selected disabled>Other Service</option>
                                            @forelse ($services as $item)
                                            <option @if($item->service_group === $jobOrder->service_group) selected @endif value="{{$item->service_group}}">{{$item->service_group}}</option>
                                            @empty
                                                No Data Services
                                            @endforelse
                                           
                                        </select>
                                    </div>
                                </div>
          
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                  
                                        <select name="job_order_service" id="service" class="form-select service">
                                            @if ($jobOrder->service_id)
                                            <option value="{{$jobOrder->service_id}}">{{$jobOrder->service_name}}</option>
                                            @else
                                            <option value="service">Service</option>
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

      
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Source
                                            Channel</span>
                                        <select name="job_order_source_channel" class="form-select" required>
                                            <option value="" disabled>none</option>
                                            <option @if ($jobOrder->job_order_source_channel === 'Walk-in') selected @endif value="Walk-in">
                                                Walk-In</option>
                                            <option @if ($jobOrder->job_order_source_channel === 'FB') selected @endif value="FB">FB
                                            </option>
                                            <option @if ($jobOrder->job_order_source_channel === 'GG') selected @endif value="GG">GG
                                            </option>
                                            <option @if ($jobOrder->job_order_source_channel === 'Agent') selected @endif value="Agent">Agent
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span class="input-group-text">Details</span>
                                    <div class="input-group">

                                        <textarea name="job_order_details" id="" class="form-control" cols="30" rows="3">{{ $jobOrder->job_order_details }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Finish Date :</span>
                                        <input type="date" class="form-control" name="job_order_finish_date" readonly 
                                            style="background-color: antiquewhite" value="{{ ($jobOrder->job_order_status === 'close' ? date('Y-m-d', strtotime($jobOrder->job_order_finish_date)) : '' )}}">
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group mb-3">
                                        @if (Auth::user()->isAdmin === 'Admin')
                                        <span class="input-group-text">Profit :</span>
                                        <input type="number" class="form-control" name="profit" id="profit-finish" @if ($jobOrder->job_order_status === 'close' ) value="{{$jobOrder->job_order_profit}}" @endif
                                            placeholder="00.00" readonly style="background-color: antiquewhite">
                                        @endif
                                      
                                    </div>

                                    <input type="hidden" name="job_order_income" id="income"
                                        value="{{ $jobOrder->job_order_income }}">
                                    <input type="hidden" name="job_order_expenses" id="expenses"
                                        value="{{ $jobOrder->job_order_expenses }}">
                                    <input type="hidden" name="job_order_profit" id="profit"
                                        value="{{ $jobOrder->job_order_profit }}">

                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="input-group mb-3">

                            <div class="col-md-6">

                                <label for="">Customer Information</label>

                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white">Choose Customer</span>
                                    <select name="job_order_customer" id="customer-id" class="form-select customer-id"
                                        required style="width: 75%">
                                        <option value="" disabled selected>Select by Customer</option>

                                        @forelse ($customers as $item)
                                            <option @if ($jobOrder->job_order_customer === $item->customer_id) selected @endif
                                                value="{{ $item->customer_id }}">{{ $item->customer_name }}</option>
                                        @empty
                                            No Data Customer
                                        @endforelse
                                    </select>
                                </div>



                            </div>


                            <div class="col-md-9">
                            </div>
                            <div class="col-md-3 float-end">
                                <br>
                                @if($jobOrder->job_order_status === 'close') 
                                @if(Auth::user()->isAdmin === 'Admin') 
                                <a href="#"  @if ($jobOrder->job_order_status === 'open' )  style="display: none"  @endif class="btn btn-primary float-end me-3  btn-re-job"><i class=" far fa-share-square"></i> Re-Open Job</a>
                                @endif
                                @endif

                                
                                <a href="#"    @if ($jobOrder->job_order_status === 'close' )  style="display: none"  @endif class="btn btn-danger float-end   me-3 btn-close-job"> <i class="far fa-window-close"></i> Close Job </a>
                            </div>

                            

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="cusntomer-name" disabled>
                                </div>

                                <div class="col-md-12">
                                    <label>Nationality</label>
                                    <input type="text" class="form-control" id="cusntomer-nationality" disabled>
                                </div>

                                <div class="col-md-12">
                                    <label>Passport No </label>
                                    <input type="text" class="form-control" id="cusntomer-passport" disabled>
                                </div>

                                <div class="col-md-12">
                                    <label>Tel, Line , WhatsApp</label>
                                    <input type="text" class="form-control" id="cusntomer-contact" disabled>
                                </div>


                                <div class="col-md-12">
                                    <label>Note</label>
                                    <textarea name="job_order_note" class="form-control" id="" cols="30" rows="2" placeholder="Note..">{{$jobOrder->job_order_note}}</textarea>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Residence in Thailand</label>
                                    <textarea name="customer-address-th" class="form-control" id="customer-address-th" cols="30" rows="11"
                                        disabled></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="customer-email" disabled>
                                </div>
                            </div>

                        </div>

                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Statement Transaction </h6>
                        </div>
                        <div class="col-md-2">
                           
                            @if($jobOrder->job_order_status === 'open') 
                            <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-add-transaction"  ><i
                                class="far fa-plus-square"></i> New
                            Transaction</a>
                            @else
                            @if($jobOrder->job_order_status === 'close') 
                            @if(Auth::user()->isAdmin === 'Admin') 
                            <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-add-transaction"  ><i
                                class="far fa-plus-square"></i> New
                            Transaction</a>
                            @else
                            <a href="#" class="btn btn-dark">Job Close</a>
                            @endif

                            @endif
                            @endif

                          

                        </div>

                        
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text  bg-light-dark" id="basic-addon2">Receipt No.</span>
                                <input type="text" name="job_order_receipt" class="form-control"
                                    value="{{$jobOrder->job_order_receipt }}" placeholder="Receipt No..">

                            </div>


                        </div>
                    </div>
                    <br>



                    <div class="row" id="table-transaction">
                        <div class="col-md-12">

                            <table class="table " >
                                <thead>
                                    <thead class="text-center bg-inverse text-white">
                                        <th>Date</th>
                                        <th>Transaction</th>
                                        <th>รายรับ</th>
                                        <th>รายจ่าย</th>
                                        <th>บัญชีกระเป๋ารับเงิน-ถอนเงิน</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="transactionTableBody" style=" @if($jobOrder->job_order_status === 'close') pointer-events: none; @endif ">
                                    @forelse ($transaction as $item)
                                        <tr class="text-center" id="tr-id-{{ $item->transaction_id }}">

                                            <input type="hidden" name="transaction_idEdit[]"value="{{ $item->transaction_id }}">
                                            <input type="hidden" name="transaction_amountEdit[]"value="{{ $item->transaction_amount }}">
                                            <input type="hidden" name="transaction_typeEdit[]"value="{{ $item->transaction_type }}">
                                            <input type="hidden" name="transaction_walletEdit[]"value="{{ $item->transaction_wallet }}">
                                            <input type="hidden" name="transaction_groupEdit[]"value="{{ $item->transaction_group }}">
                                            <input type="hidden" name="transaction_dateEdit[]"value="{{ $item->transaction_date }}">

                                            <td> {{ date('d-M-Y', strtotime($item->transaction_date)) }}</td>
                                            <td>{{ $item->transaction_group_name }}</td>
                                            <td>
                                                @if ($item->transaction_type === 'income')
                                                    {{ number_format($item->transaction_amount, 2, '.', ',') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->transaction_type === 'expenses')
                                                    {{ number_format($item->transaction_amount, 2, '.', ',') }}
                                                @else
                                                    -
                                                @endif


                                            </td>
                                            <td>{{ $item->wallet_type_name }}</td>
                                            <td>

                                                @if($jobOrder->job_order_status === 'open') 
                                                <a data-id="{{ $item->transaction_id }}"
                                                    href="{{ route('transaction.edit', $item->transaction_id) }}"
                                                    class="text-info edit-btn btn-edit-transaction"> แก้ไข</a> |
                                                <a href="#" transaction-id="{{ $item->transaction_id }}"
                                                    class="text-danger delete-btn-row"> ลบ</a>
                                                @else

                                                @if(Auth::user()->isAdmin === 'Admin') 
                                                <a data-id="{{ $item->transaction_id }}"
                                                    href="{{ route('transaction.edit', $item->transaction_id) }}"
                                                    class="text-info edit-btn btn-edit-transaction"> แก้ไข</a> |
                                                <a href="#" transaction-id="{{ $item->transaction_id }}"
                                                    class="text-danger delete-btn-row"> ลบ</a>
                                                @else
                                                Job Close
                                                @endif

                                                @endif
                                              
                                            </td>

                                        </tr>
                                    @empty
                                        No Data Transaction found
                                    @endforelse


                                </tbody>

                            </table>
                        </div>
                    </div>


                    <br>
                    <a href="{{route('joborder.index')}}" class="btn btn-info "> <i class="fas fas fa-arrow-circle-left"></i> Back Jobs </a>
                    <button type="submit" class="btn btn-success float-end"> <i class="fa fa-save"></i> Seve Job Order</button>
                    
                </form>

            </div>
        </div>
    </div>

    {{-- modal add add-transaction" --}}
    <div class="modal fade custom-modal  " id="add-transaction" tabindex="-1"
        aria-labelledby="vertical-center-transaction" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            </div>
        </div>
    </div>
    {{-- modal edit add-transaction" --}}
    <div class="modal fade custom-modal  " id="edit-transaction" tabindex="-1"
        aria-labelledby="vertical-center-transaction" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            </div>
        </div>
    </div>


    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
    <script>
        const selectCustomerRoute = "{{ route('joborder.select.selectCustomer')}}";
        const jobCloseRouter = "{{ route('joborder.close')}}";
        const reJobouter = "{{ route('joborder.reOpen')}}";
        const _token = $('#_token').val();
        const  serviceRouter =  "{{ route('joborder.service')}}";
        
    </script>

    <script src="{{URL::asset('js/jobs/job-edit.js')}}"></script>

@endsection
