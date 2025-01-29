@extends('layouts.main')

@section('content')
    <div class="container-xl page-content " id="customer-index">
        <div class="card">
            <div class="card-body">

                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title line" id="myLargeModalLabel">
                        Edit Job Order
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
                                    class="form-control"@if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close') disabled @endif
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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group mb-6">

                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Job Type <label
                                                class="text-danger"> *</label></span>
                                        <select name="job_order_type" id="job-order-type"
                                            @if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close') disabled @endif
                                            class="form-select job-order-type">
                                            <option value="service" selected disabled>Other Service</option>
                                            @forelse ($jobType as $item)
                                                <option @if ($item->job_type_id === $jobOrder->job_order_type) selected @endif
                                                    value="{{ $item->job_type_id }}">{{ $item->job_type_name }}
                                                </option>
                                            @empty
                                                No Data Services
                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Job detail <label
                                                class="text-danger"> *</label></span>
                                        <select name="job_order_detail" id="service" class="form-select service"
                                            @if (Auth::user()->isAdmin === 'Operator') disabled @endif>


                                            @forelse ($jobDetail as $item)
                                                <option @if ($item->job_detail_id === $jobOrder->job_order_detail) selected @endif
                                                    value="{{ $item->job_detail_id }}">{{ $item->job_detail_name }}
                                                </option>
                                            @empty
                                                No Data Services
                                            @endforelse


                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Receipt No. <label
                                                class="text-danger"> *</label></span>
                                        <input type="text" name="job_order_receipt" class="form-control"
                                            @if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close') disabled @endif
                                            value="{{ $jobOrder->job_order_receipt }}" placeholder="Receipt No..">

                                    </div>

                                </div>


                            </div>

                        </div>

                        <div class="col-md-6 service-other" style="display: none">
                            <div class="input-group mb-3">
                                <span class="input-group-text  bg-light-dark" id="basic-addon2">Other Note <label
                                        class="text-danger"> </label></span>
                                <input type="text" class="form-control" name="job_order_service_other"
                                    value="{{ $jobOrder->job_order_service_other }}">
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text  bg-light-dark" id="basic-addon2">Source
                                            Channel </span>
                                        <select name="job_order_source_channel" class="form-select"
                                            @if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close') disabled @endif>
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
                                            @if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close') disabled @endif>{{ $jobOrder->job_order_details }}</textarea>
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
                                            @if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close') disabled @endif
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

                                <label for="">Customer Information <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#bs-example-modal-lg">แก้ไขข้อมูล</a></label>

                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white">Choose Customer</span>
                                    <select name="job_order_customer" id="customer-id" class="form-select customer-id"
                                        @if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close') disabled @endif required style="width: 75%"
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
                                    <a href="#" @if ($jobOrder->job_order_status === 'open') style="display: none" @endif
                                        class="btn btn-primary float-end me-3  btn-re-job"><i
                                            class=" far fa-share-square"></i> Re-Open Job</a>
                                @endif


                                <a href="#" @if (Auth::user()->isAdmin !== 'Admin') style="display: none" @endif
                                    class="btn btn-danger float-end   me-3 btn-close-job"> <i
                                        class="far fa-window-close"></i> Close Job </a>
                            </div>



                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="cusntomer-name" disabled>
                                </div>

                                <div class="col-md-12">
                                    <label>Nationality <span class="text-danger">*</span></label>
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
                                        @if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close') disabled @endif placeholder="Note..">{{ $jobOrder->job_order_note }}</textarea>
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

                            @if (Auth::user()->isAdmin === 'Admin')
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
                                    @endif
                                @endif
                            @endif



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
                                    @forelse ($transactions as $itemTransaction)
                                   
                                        <tr>
                                            <td style="display: none"><input type="text" name="transaction_id[]" value="{{$itemTransaction->transaction_id}}"></td>
                                            <td><input type="date" name="transaction_date[]"
                                                    class="form-control date-custom"
                                                    value="{{ $itemTransaction->transaction_date }}" />
                                            </td>
                                            <td>
                                                <select name="transaction_group[]" class="form-select job-trasaction">
                                                    <option value="">None</option>
                                                    @forelse ($Jobtransactions as $item)
                                                        <option @if ($item->job_trasaction_id === $itemTransaction->transaction_group) selected @endif
                                                            value="{{ $item->job_trasaction_id }}">
                                                            {{ $item->job_trasaction_name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </td>
                                            <td>
                                                <select name="transaction_type[]" id="transaction-type"
                                                    class="form-select transaction-type">
                                                    <option value="">None</option>
                                                    <option @if ($itemTransaction->transaction_type === 'income') selected @endif
                                                        value="income">รายรับ</option>
                                                    <option @if ($itemTransaction->transaction_type === 'expenses') selected @endif
                                                        value="expenses">รายจ่าย</option>
                                                </select>
                                            </td>
                                            <td class="text-end"><input type="number" name="transaction_amount[]"
                                                    class="form-control text-end" step="0.01"
                                                    value="{{ $itemTransaction->transaction_amount }}" />
                                            </td>
                                            <td>
                                                <select name="transaction_wallet[]" class="form-select">
                                                    <option value="">None</option>
                                                    @forelse ($walletType as $item)
                                                        <option @if ($itemTransaction->transaction_wallet === $item->wallet_type_id) selected @endif
                                                            data-wallet="{{ $item->wallet_type_name }}"
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

                                    @empty
                                    @endforelse




                                    <tr id="row-template" style="display: none;">
                                        
                                        <td><input type="date" name="transaction_date[]"
                                                class="form-control date-custom" />
                                        </td>
                                        <td>
                                            <select name="transaction_group[]" class="form-select job-trasaction">
                                                <option value="">None</option>
                                                @forelse ($Jobtransactions as $item)
                                                    <option value="{{ $item->job_trasaction_id }}">
                                                        {{ $item->job_trasaction_name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </td>
                                        <td>
                                            <select name="transaction_type[]" id="transaction-type"
                                                class="form-select transaction-type">
                                                <option value="">None</option>
                                                <option value="income">รายรับ</option>
                                                <option value="expenses">รายจ่าย</option>
                                            </select>
                                        </td>
                                        <td><input type="number" name="transaction_amount[]"
                                                class="form-control text-end" step="0.01" />
                                        </td>
                                        <td>
                                            <select name="transaction_wallet[]" class="form-select">
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

                    @if (Auth::user()->isAdmin === 'Operator' || $jobOrder->job_order_status === 'close')
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
                    <form action="{{ route('joborder.customerUpdate', $customer->customer_id) }}" id="customerUpdate"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label>Name</label>
                                <input type="text" class="form-control" name="customer_name" placeholder="Name"
                                    value="{{ $customer->customer_name }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Nationality <span class="text-danger">*</span></label>
                                <select class="select2 form-control custom-select " id="mySelect2"
                                    name="customer_nationality" style="width: 100%; height: 36px">
                                    <option>None</option>
                                    @forelse ($nationality as $item)
                                        <option @if ($customer->customer_nationality === $item->nationality_id) selected @endif
                                            value="{{ $item->nationality_id }}">{{ $item->nationality_code }} :
                                            {{ $item->nationality_name }}
                                        </option>
                                    @empty
                                        No data nationality
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-12 mb-2">
                                <label>Passport No</label>
                                <input type="text" class="form-control" name="customer_passport"
                                    placeholder="Passport No." value="{{ $customer->customer_passport }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Tel, Line , WhatsApp</label>
                                <input type="text" class="form-control" name="customer_contact_media"
                                    placeholder="Tel, Line , WhatsApp" value="{{ $customer->customer_contact_media }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Email</label>
                                <input type="text" class="form-control" name="customer_email" placeholder="Email"
                                    value="{{ $customer->customer_email }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Residence in Thailand</label>
                                <textarea name="customer_address_thailand" class="form-control" id="" cols="30" rows="3"
                                    placeholder="Residence in Thailand">{{ $customer->customer_address_thailand }}</textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Note</label>
                                <textarea name="customer_note" class="form-control" id="" cols="30" rows="3"
                                    placeholder="Note..">{{ $customer->customer_note }}</textarea>
                            </div>

                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" form="customerUpdate"
                        class="btn btn-light-success text-success font-weight-medium  waves-effect  text-start"
                        data-bs-dismiss="modal">
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
    </script>

    <script src="{{ URL::asset('js/jobs/job-edit.js') }}"></script>


    <script>
        //funtion ตรวจสอบใส่วันที่ล่วงหน้าไม่ได้
        function checkDate(selectedDateStr) {
            // รับค่าวันที่จาก input
            var selectedDate = new Date(selectedDateStr); // สร้างวัตถุ Date
            // ตั้งค่าเวลาของ selectedDate เป็น 00:00:00 เพื่อเปรียบเทียบเฉพาะวันที่
            selectedDate.setHours(0, 0, 0, 0);
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            // เปรียบเทียบวันที่ โดยไม่สนใจเวลา
            if (selectedDate > today) {
                alert("ไม่สามารถเลือกวันที่ในอนาคตได้");
                $(this).val('');
            }
        }

        $(document).ready(function() {
            $('.date-custom').change(function() {
                var selectedDateStr = $(this).val();
                checkDate(selectedDateStr);
            });
        });

        // ใส่สี Input
        $(document).ready(function() {
            // ฟังก์ชันตรวจสอบและเปลี่ยนสี
            function updateRowColor(row) {
                var transactionType = row.find('.transaction-type').val();

                if (transactionType === 'income') {
                    row.find('input, select').css('background-color', '#26ff8042'); // สีเขียว
                } else if (transactionType === 'expenses') {
                    row.find('input, select').css('background-color', '#ff0a2a3d'); // สีแดง
                } else {
                    row.find('input, select').css('background-color', ''); // คืนค่าสีเดิม
                }
            }
            // ตรวจสอบการเปลี่ยนแปลงค่า transaction_type[]
            $(document).on('change', '.transaction-type', function() {
                var row = $(this).closest('tr'); // หาแถวที่เลือก
                updateRowColor(row); // เรียกฟังก์ชันเปลี่ยนสี
            });

            // เรียกใช้ฟังก์ชันเพื่อเปลี่ยนสีตอนโหลดหน้า
            $('tr').each(function() {
                updateRowColor($(this));
            });
        });
    </script>


    <script>
        // select job type
        $('.job-order-type').on('change', function() {
            var jobType = $(this).val();
            // console.log('jobType: '+jobType);

            $.ajax({
                url: "{{ route('joborder.jobType') }}",
                method: 'GET',
                data: {
                    jobType: jobType
                },
                success: function(response) {
                    //console.log(response.jobTrasaction);

                    var options = '<option value="">' + "Select job Type" + "</option>";
                    response.jobDetail.forEach(function(jobDetail) {
                        options += '<option value="' + jobDetail.job_detail_id + '">' +
                            jobDetail.job_detail_name + "</option>";
                    });
                    $("#service").html(options);

                }
            });
        });

        // select job type
        $('#service').on('change', function() {
            var serviceTrasaction = $(this).val();
            // console.log('jobType: '+jobType);
            $.ajax({
                url: "{{ route('joborder.serviceTrasaction') }}",
                method: 'GET',
                data: {
                    serviceTrasaction: serviceTrasaction
                },
                success: function(response) {
                    //console.log(response.jobTrasaction);

                    var optionsjobTrasaction = '<option selected value="" disabled>' +
                        "Select job trasaction " + "</option>";
                    response.jobTrasaction.forEach(function(jobTrasaction) {
                        optionsjobTrasaction += '<option value="' + jobTrasaction
                            .job_trasaction_id + '">' + jobTrasaction.job_trasaction_name +
                            "</option>";
                    });

                    $(".job-trasaction").html(optionsjobTrasaction);
                }
            });
        });



        function serviceOther() {
            var selectedOption = $('.service').find('option:selected');
            var serviceType = selectedOption.data('other');
            if (serviceType === 'Y') {
                $('.service-other').css("display", "block");
            } else {
                $('.service-other').css("display", "none");
            }
        }

        $(document).ready(function() {

            serviceOther()
            $(".service").on("change", function() {
                serviceOther()
            });

            $('#addRow').click(function(event) {
                event.preventDefault();
                var newRow = $('#row-template').clone().removeAttr('id').removeAttr('style');
                newRow.find('select[name="transaction_date[]"]').attr('required', true);
                newRow.find('select[name="transaction_group[]"]').attr('required', true);
                newRow.find('select[name="transaction_type[]"]').attr('required', true);
                newRow.find('select[name="transaction_wallet[]"]').attr('required', true);
                newRow.find('select[name="transaction_amount[]"]').attr('required', true);

                // ฟังการเปลี่ยนแปลงของ select ที่ชื่อว่า transaction_typeNew
                newRow.find('select[name="transaction_type[]"]').change(function() {
                    var type = $(this).val();
                    if (type === 'income') {
                        // newRow.css('background-color', '#26ff8042');
                        newRow.find('input, select').css('background-color', '#26ff8042');
                    } else if (type === 'expenses') {
                        // newRow.css('background-color', '#ff0a2a3d');
                        newRow.find('input, select').css('background-color', '#ff0a2a3d');
                    } else {
                        // newRow.css('background-color', '');
                        newRow.find('input, select').css('background-color', '');
                    }


                });
                //funtion ตรวจสอบใส่วันที่ล่วงหน้าไม่ได้
                $(document).ready(function() {
                    $('.date-custom').change(function() {
                        var selectedDateStr = $(this).val();
                        checkDate(selectedDateStr);
                    });
                });
                $('table tbody').prepend(newRow);


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
