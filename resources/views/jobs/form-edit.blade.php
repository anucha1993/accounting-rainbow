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
                <form action="{{ route('joborder.update', $jobOrder->job_order_id) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" id="job-id" value="{{ $jobOrder->job_order_id }}">
                    <input type="hidden" id="job-date" value="{{ $jobOrder->job_order_date }}">
                    <input type="hidden" id="job-number" value="{{ $jobOrder->job_order_number }}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text  bg-light-dark" id="basic-addon2">Job Date</span>
                                <input type="date" name="job_order_date"
                                    class="form-control"@if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif
                                    value="{{ date('Y-m-d', strtotime($jobOrder->job_order_date)) }}">

                            </div>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-2 mb-3 ">
                            <b class="float-end">Status : <span
                                    class="@if ($jobOrder->job_order_status === 'open') text-primary @else text-success @endif">{{ $jobOrder->job_order_status }}</span></b>
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

                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Job Type <label
                                                class="text-danger"> *</label></span>
                                        <select name="job_order_type" id="job-order-type"
                                            @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif
                                            class="form-select job-order-type">
                                            <option value="service" selected disabled>Other Service</option>
                                            @forelse ($services as $item)
                                                <option @if ($item->service_group === $jobOrder->service_group) selected @endif
                                                    value="{{ $item->service_group }}">{{ $item->service_group }}</option>
                                            @empty
                                                No Data Services
                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-3">

                                        <select name="job_order_service" id="service" class="form-select service"
                                            @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif>
                                            @if ($jobOrder->service_id)
                                                <option value="{{ $jobOrder->service_id }}">{{ $jobOrder->service_name }}
                                                </option>
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
                                        <select name="job_order_source_channel" class="form-select" required
                                            @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif>
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

                                        <textarea name="job_order_details" id="" class="form-control" cols="30" rows="3"
                                            @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif>{{ $jobOrder->job_order_details }}</textarea>
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
                                            style="background-color: antiquewhite"
                                            @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif
                                            value="{{ $jobOrder->job_order_status === 'close' ? date('Y-m-d', strtotime($jobOrder->job_order_finish_date)) : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group mb-3">
                                        @if (Auth::user()->isAdmin === 'Admin')
                                            <span class="input-group-text">Profit :</span>
                                            <input type="number" class="form-control" name="profit" id="profit-finish"
                                                @if ($jobOrder->job_order_status === 'close') value="{{ $jobOrder->job_order_profit }}" @endif
                                                placeholder="00.00" readonly style="background-color: antiquewhite">
                                        @endif

                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="input-group mb-3">

                            <div class="col-md-6">

                                <label for="">Customer Information <a href="#"  data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"> แก้ไขข้อมูล</a></label>

                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white">Choose Customer</span>
                                    <select name="job_order_customer" id="customer-id" class="form-select customer-id"
                                        @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif required style="width: 75%"
                                        disabled>
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

                            <hr>
                            <div class="col-md-3">

                            </div>

                            <div class="col-md-3 float-end">
                                <br>
                                @if ($jobOrder->job_order_status === 'close')
                                    @if (Auth::user()->isAdmin === 'Admin')
                                        <a href="#" @if ($jobOrder->job_order_status === 'open') style="display: none" @endif
                                            class="btn btn-primary float-end me-3  btn-re-job"><i
                                                class=" far fa-share-square"></i> Re-Open Job</a>
                                    @endif
                                @endif


                                <a href="#" @if ($jobOrder->job_order_status === 'close') style="display: none" @endif
                                    class="btn btn-danger float-end   me-3 btn-close-job"> <i
                                        class="far fa-window-close"></i> Close Job </a>
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
                                    <label>Note Job</label>
                                    <textarea name="job_order_note" class="form-control" id="" cols="30" rows="2"
                                        @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif placeholder="Note..">{{ $jobOrder->job_order_note }}</textarea>
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

                            @if ($jobOrder->job_order_status === 'open')
                                <a href="{{ route('transaction.create') }}" class="btn btn-primary" id="addRow"><i
                                        class="far fa-plus-square"></i> New
                                    Transaction</a>
                            @else
                                @if ($jobOrder->job_order_status === 'close')
                                    @if (Auth::user()->isAdmin === 'Admin')
                                        <a href="{{ route('transaction.create') }}" class="btn btn-primary"
                                            id="addRow"><i class="far fa-plus-square"></i>
                                            New
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
                                    @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif
                                    value="{{ $jobOrder->job_order_receipt }}" placeholder="Receipt No..">

                            </div>


                        </div>
                    </div>
                    <br>



                    <div class="row" id="table-transaction">
                        <div class="col-md-12">

                            <table class="table ">
                                <thead>
                                    <thead class="text-center bg-inverse text-white">
                                        <th>Date</th>
                                        <th>Transaction</th>
                                        <th>รายรับ/รายจ่าย</th>
                                        <th>จำนวนเงิน</th>

                                        <th>บัญชีกระเป๋ารับเงิน-ถอนเงิน</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>

                                <tbody>
                                    @forelse ($transaction as $value)
                                        <tr id="row-template-edit">
                                            <td style="display: none"><input type="hidden" name="transaction_idEdit[]"
                                                    value="{{ $value->transaction_id }}"></td>
                                            <td><input type="date" name="transaction_dateEdit[]" class="form-control"
                                                    value="{{ date('Y-m-d', strtotime($value->transaction_date)) }}"
                                                    @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif />
                                            </td>
                                            <td>

                                                <select name="transaction_groupEdit[]" class="form-select"
                                                    @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif>
                                                    <option value="">None</option>
                                                    @forelse ($transactionGroup as $item)
                                                        <option @if ($value->transaction_group_id === $item->transaction_group_id) selected @endif
                                                            value="{{ $item->transaction_group_id }}">
                                                            {{ $item->transaction_group_name }}</option>
                                                    @empty
                                                        No Data
                                                    @endforelse
                                                </select>
                                            </td>
                                            <td>
                                                <select name="transaction_typeEdit[]" id="transaction-type"
                                                    @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif
                                                    class="form-select transaction-type">
                                                    <option value="">None</option>
                                                    <option @if ($value->transaction_type === 'income') selected @endif
                                                        value="income">รายรับ</option>
                                                    <option @if ($value->transaction_type === 'expenses') selected @endif
                                                        value="expenses">รายจ่าย</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="transaction_amountEdit[]"
                                                    value="{{ $value->transaction_amount }}"
                                                    class="form-control text-end"
                                                    @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif />
                                            </td>
                                            <td>
                                                <select name="transaction_walletEdit[]" class="form-select"
                                                    @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close') disabled @endif>
                                                    <option value="">None</option>
                                                    @forelse ($walletType as $item)
                                                        <option @if ($value->wallet_type_id === $item->wallet_type_id) selected @endif
                                                            value="{{ $item->wallet_type_id }}">
                                                            {{ $item->wallet_type_name }}</option>
                                                    @empty
                                                        No Data
                                                    @endforelse
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close')
                                                    close
                                                @else
                                                    <button class="btn btn-danger btn-sm removeRow">Remove</button>
                                                @endif

                                            </td>
                                        </tr>


                                    @empty
                                        No Data Transaction found
                                    @endforelse
                                    <tr id="row-template" style="display: none;">
                                        <td><input type="date" name="transaction_dateNew[]" class="form-control" />
                                        </td>
                                        <td>
                                            <select name="transaction_groupNew[]" class="form-select">
                                                <option value="">None</option>
                                                @forelse ($transactionGroup as $item)
                                                    <option data-transaction="{{ $item->transaction_group_name }}"
                                                        value="{{ $item->transaction_group_id }}">
                                                        {{ $item->transaction_group_name }}</option>
                                                @empty
                                                    No Data
                                                @endforelse
                                            </select>
                                        </td>
                                        <td>
                                            <select name="transaction_typeNew[]" id="transaction-type"
                                                class="form-select transaction-type">
                                                <option value="">None</option>
                                                <option value="income">รายรับ</option>
                                                <option value="expenses">รายจ่าย</option>
                                            </select>
                                        </td>
                                        <td><input type="number" name="transaction_amountNew[]" class="form-control" />
                                        </td>
                                        <td>
                                            <select name="transaction_walletNew[]" class="form-select">
                                                <option value="">None</option>
                                                @forelse ($walletType as $item)
                                                    <option data-wallet="{{ $item->wallet_type_name }}"
                                                        value="{{ $item->wallet_type_id }}">
                                                        {{ $item->wallet_type_name }}</option>
                                                @empty
                                                    No Data
                                                @endforelse
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm removeRow">Remove</button>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                    </div>


                    <br>
                    <a href="{{ route('joborder.index') }}" class="btn btn-info "> <i
                            class="fas fas fa-arrow-circle-left"></i> Back Jobs </a>

                    @if (Auth::user()->isAdmin === 'Operator' && $jobOrder->job_order_status === 'close')
                    @else
                        <button type="submit" class="btn btn-success float-end"> <i class="fa fa-save"></i> Save Job
                            Order</button>
                    @endif


                </form>

            </div>
        </div>
    </div>

    
    <!--modal content Edit Customer -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Customer Edit
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>

                <div class="modal-body">
                    <form action="{{route('joborder.customerUpdate',$customer->customer_id)}}" id="customerUpdate" method="post">
                        @csrf
                        @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label>Name</label>
                            <input type="text" class="form-control" name="customer_name" placeholder="Name" value="{{$customer->customer_name}}">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Nationality</label>
                            <select class="select2 form-control custom-select " id="mySelect2" 
                            name="customer_nationality" style="width: 100%; height: 36px">
                            <option>None</option>
                            @forelse ($nationality as $item)
                                <option @if ($customer->customer_nationality === $item->nationality_id) selected @endif value="{{ $item->nationality_id }}">{{ $item->nationality_code }} : {{ $item->nationality_name }}
                                </option>
                            @empty
                                No data nationality
                            @endforelse
                        </select>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label>Passport No</label>
                            <input type="text" class="form-control" name="customer_passport" placeholder="Passport No." value="{{$customer->customer_passport}}">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Tel, Line , WhatsApp</label>
                            <input type="text" class="form-control" name="customer_contact_media" placeholder="Tel, Line , WhatsApp" value="{{$customer->customer_contact_media}}">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Email</label>
                            <input type="text" class="form-control" name="customer_email" placeholder="Email" value="{{$customer->customer_email}}">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Residence in Thailand</label>
                            <textarea name="customer_address_thailand" class="form-control" id="" cols="30" rows="3" placeholder="Residence in Thailand">{{$customer->customer_address_thailand}}</textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Note</label>
                            <textarea name="customer_note" class="form-control" id="" cols="30" rows="3" placeholder="Note..">{{$customer->customer_note}}</textarea>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" form="customerUpdate"  class="btn btn-light-success text-success font-weight-medium  waves-effect  text-start" data-bs-dismiss="modal">
                        Save
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


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
        const selectCustomerRoute = "{{ route('joborder.select.selectCustomer') }}";
        const jobCloseRouter = "{{ route('joborder.close') }}";
        const reJobouter = "{{ route('joborder.reOpen') }}";
        const _token = $('#_token').val();
        const serviceRouter = "{{ route('joborder.service') }}";
    </script>

    <script src="{{ URL::asset('js/jobs/job-edit.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#addRow').click(function(event) {
                event.preventDefault();
                var newRow = $('#row-template').clone().removeAttr('id').removeAttr('style');
                newRow.find('select[name="transaction_dateNew[]"]').attr('required', true);
                newRow.find('select[name="transaction_groupNew[]"]').attr('required', true);
                newRow.find('select[name="transaction_typeNew[]"]').attr('required', true);
                newRow.find('select[name="transaction_walletNew[]"]').attr('required', true);
                newRow.find('select[name="transaction_amountNew[]"]').attr('required', true);
                $('table tbody').append(newRow);
            });

            $(document).on('click', '.removeRow', function() {
                $(this).closest('tr').remove();
            });

            $('#mySelect2').select2({
                dropdownParent: $('#bs-example-modal-lg')
            });


        });
    </script>

@endsection
