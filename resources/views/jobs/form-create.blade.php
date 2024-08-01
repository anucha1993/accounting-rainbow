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
                <form action="{{ route('joborder.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text  bg-light-dark" id="basic-addon2">Job Date</span>
                                <input type="date" name="job_order_date" class="form-control"
                                    value="{{ date('Y-m-d', strtotime(now())) }}">

                            </div>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-2 mb-3 ">
                            <b class="float-end">Status : <span class="text-success">Open</span></b>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Job No : {{ date('ymd', strtotime(now())) }} <i>XXX (Auto Gen)</i></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Job Type <label
                                                class="text-danger"> *</label></span>
                                        <select name="job_order_type" id="job-order-type"
                                            class="form-select job-order-type">
                                            <option value="service" selected disabled>Other Service</option>

                                            @forelse ($services as $item)
                                                <option value="{{ $item->service_group }}">{{ $item->service_group }}
                                                </option>
                                            @empty
                                                No Data Services
                                            @endforelse

                                        </select>
                                    </div>
                                </div>
                                <script></script>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">

                                        <select name="job_order_service" id="service" class="form-select">
                                            <option value="service">Service</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Source
                                            Channel</span>
                                        <select name="job_order_source_channel" class="form-select" required>
                                            <option value="" selected disabled>none</option>
                                            <option value="Walk-in">Walk-In</option>
                                            <option value="FB">FB</option>
                                            <option value="GG">GG</option>
                                            <option value="Agent">Agent</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <span class="input-group-text">Details</span>
                                    <div class="input-group">
                                        <textarea name="job_order_details" id="" class="form-control" cols="30" rows="3"></textarea>
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
                                            style="background-color: antiquewhite">
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Profit :</span>
                                        <input type="number" class="form-control" name="job_order_profit"
                                            placeholder="00.00" readonly style="background-color: antiquewhite">
                                    </div>

                                    <input type="hidden" name="job_order_income" id="income">
                                    <input type="hidden" name="job_order_expenses" id="expenses">
                                    <input type="hidden" name="job_order_profit" id="profit">

                                </div>

                            </div>
                        </div>
                    </div>
                     @php
                      $customer = request()->get('customerID');
                      @endphp

                    <div class="row">
                        <div class="input-group mb-3">

                            <div class="col-md-6">

                                <label for="">Customer Information</label>

                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white">Choose Customer</span>
                                    <select name="job_order_customer" id="customer-id"
                                        class="form-select customer-id customer" required style="width: 75%">
                                        <option value="CustomerNew">เพิ่มใหม่</option>
                                        <option value="" disabled selected>Select by Customer</option>

                                        @forelse ($customers as $item)
                                            <option @if ($customer == $item->customer_id) selected @endif 
                                                value="{{ $item->customer_id }}"> {{ $item->customer_name }} </option>
                                        @empty
                                            No Data Customer
                                        @endforelse
                                    </select>
                                </div>



                            </div>

                            <div class="col-md-6" style="display: none" id="customerNew">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" name="customer_name"
                                    placeholder="Customer Name">
                            </div>


                            <div class="col-md-9">
                            </div>
                            <div class="col-md-3 float-end">
                                <br>

                                {{-- <a href="#" class="btn btn-primary float-end me-3"><i
                                        class=" far fa-share-square"></i> Re-Open Job</a>
                                <a href="#" class="btn btn-danger float-end  me-3"> <i
                                        class="far fa-window-close"></i> Close Job </a> --}}
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4" style="display: none" id="prefixNone">
                                    <label for="">Prefix</label>
                                    <select name="customer_prefix" class="form-select">
                                        <option value="MR">MR.</option>
                                        <option value="MS">MS.</option>
                                    </select>

                                </div>
                                <div class="col-md-4" style="display: block" id="prefixBlock">
                                    <label for="">Prefix</label>
                                    <input type="text" id="customer-prefix" class="form-control" disabled>
                                </div>
                                <div class="col-md-8">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="customer_name" id="cusntomer-name"
                                        placeholder="Name" disabled>
                                </div>

                                <div class="col-md-12" id="div-nationality-show">
                                    <label>Nationality</label>
                                    <input type="text" class="form-control" name="customer_nationality"
                                        id="cusntomer-nationality" disabled>


                                </div>

                                <div class="col-md-12" id="div-nationality" style="display: none">
                                    <label>Nationality</label>
                                    <select class="select2 form-control custom-select " id="nationality"
                                        name="customer_nationality" style="width: 100%; height: 36px">
                                        <option>None</option>
                                        @forelse ($nationality as $item)
                                            <option value="{{ $item->nationality_id }}">{{ $item->nationality_code }} :
                                                {{ $item->nationality_name }}
                                            </option>
                                        @empty
                                            No data nationality
                                        @endforelse
                                    </select>

                                </div>

                                <div class="col-md-12">
                                    <label>Passport No </label>
                                    <input type="text" class="form-control" name="customer_passport"
                                        id="cusntomer-passport" placeholder="Passport Number" disabled>
                                </div>

                                <div class="col-md-12">
                                    <label>Tel, Line , WhatsApp</label>
                                    <input type="text" class="form-control" name="customer_contact_media"
                                        id="cusntomer-contact" placeholder="contact" disabled>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Residence in Thailand</label>
                                    <textarea name="customer_address_thailand" class="form-control" id="customer-address-th"
                                        placeholder="Residence in Thailand" cols="30" rows="7" disabled></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="text" name="customer_email" class="form-control" id="customer-email"
                                        placeholder="Email" disabled>
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
                        <div class="col-md-6">
                            <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-add-transaction"><i
                                    class="far fa-plus-square"></i> New
                                Transaction</a>
                            {{-- <a href="#" class="btn btn-danger"><i class="far fas fa-print"></i> Print ใบเสร็จ</a> --}}


                        </div>
                        <div class="col-md-6">



                        </div>
                    </div>
                    <br>



                    <div class="row" id="table-transaction">
                        <div class="col-md-12">

                            <table class="table ">
                                <thead>
                                    <tr class="text-center">
                                        <th>Date</th>
                                        <th>Transaction</th>
                                        <th>รายรับ</th>
                                        <th>รายจ่าย</th>
                                        <th>บัญชีกระเป๋ารับเงิน-ถอนเงิน</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="transactionTableBody">

                                    {{-- <tr class="text-center">
                                            <td>24-Mar-2024</td>
                                            <td>TM.30 +</td>
                                            <td>700.00฿</td>
                                            <td>300.00</td>
                                            <td>เครื่องรูดบัตรออมสิน / ออมสิน Fon</td>
                                            <td>
                                                <a href="#" class="text-info edit-btn"> แก้ไข</a> |
                                                <a href="#" class="text-danger delete-btn"> ลบ</a>
                                            </td>
                                        </tr> --}}

                                </tbody>

                            </table>
                        </div>
                    </div>


                    <br>

                    <button type="submit" class="btn btn-success float-end"> <i class="fa fa-save"></i> Seve Job
                        Order</button>
                </form>

            </div>
        </div>
    </div>


    {{-- modal add customer --}}

    <div class="modal fade custom-modal  transaction-modal" id="add-transaction" tabindex="-1"
        aria-labelledby="vertical-center-transaction" aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            </div>
        </div>
    </div>


    <div class="modal fade custom-modal" id="wallet" tabindex="-1" aria-labelledby="vertical-center-modal"
        aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            </div>
        </div>
    </div>


    <div class="modal fade custom-modal" id="transaction-group" tabindex="-1" aria-labelledby="vertical-center-modal"
        aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            </div>
        </div>
    </div>



    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />

    <script>
        const _token = $('#_token').val();
        const customerRoute = "{{ route('joborder.select.selectCustomer') }}";
        const serviceRouter = "{{ route('joborder.service') }}";
    </script>

    <script src="{{ URL::asset('js/jobs/job-create.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.customer').on('change', function() {
                var customerNew = $(this).val();

                if (customerNew === 'CustomerNew') {
                    $('#customerNew').css("display", "block");
                    $('#cusntomer-name').prop('disabled', false)
                    $('#cusntomer-name').val('');
                    $('#cusntomer-nationality').prop('disabled', false)
                    $('#cusntomer-nationality').val('');
                    $('#cusntomer-passport').prop('disabled', false)
                    $('#cusntomer-passport').val('');
                    $('#cusntomer-contact').prop('disabled', false)
                    $('#cusntomer-contact').val('');
                    $('#customer-address-th').prop('disabled', false)
                    $('#customer-address-th').val('');
                    $('#customer-email').prop('disabled', false)
                    $('#customer-email').val('');

                    $('#prefixNone').css("display", "block");
                    $('#prefixBlock').css("display", "none");
                    $('#div-nationality').css("display", "block");
                    $('#div-nationality-show').css("display", "none");
                } else {
                    $('#customerNew').css("display", "none");
                    $('#cusntomer-name').prop('disabled', true)
                    $('#cusntomer-nationality').prop('disabled', true)
                    $('#cusntomer-passport').prop('disabled', true)
                    $('#cusntomer-contact').prop('disabled', true)
                    $('#customer-address-th').prop('disabled', true)
                    $('#customer-email').prop('disabled', true)

                    $('#prefixBlock').css("display", "block");
                    $('#prefixNone').css("display", "none");
                    $('#div-nationality').css("display", "none");
                    $('#div-nationality-show').css("display", "block");
                }
            });

          
        })
    </script>
@endsection
