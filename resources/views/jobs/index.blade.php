@extends('layouts.main')

@section('content')
    <div class="container-xl page-content-custom  " id="customer-index">

        <div class="card">
            <div class="card-body">
                <form action="#" id="searchForm">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-light-info">Open Job Date From</span>
                                    <input type="text" name="daterange" id="rangDate" class="form-control rangDate"
                                        autocomplete="off" value="" placeholder="Search by Range Date" />

                                </div>
                            </div>



                        </div>
                        <div class="col">
                            <button class="btn btn-rounded waves-effect waves-light btn-outline-info float-end"
                                id="btnSearch" style="">Search</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-light-info">Job Status</span>
                                    <select name="" id="job-status" class="form-select">
                                        <option value="">All</option>
                                        <option value="open">Open</option>
                                        <option value="close">Close</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-light-info">Name</span>
                                    <input type="text" class="form-control" id="name" placeholder="Search by name">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-light-info">Nationality</span>
                                    <select class="select2 form-control custom-select Nationality-customer" id="Nationality"
                                        style="width: 75%; height: 36px" name="Nationality">
                                        <option value="" disabled selected>Search by Nationality</option>
                                        <option value="">None</option>
                                        @forelse ($nationality as $item)
                                            <option value="{{ $item->nationality_id }}">{{ $item->nationality_code }} :
                                                {{ $item->nationality_name }}
                                            </option>
                                        @empty
                                            No Data Nationality
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-light-info">Source Channel </span>
                                    <select name="job_order_source_channel" class="form-select" id="channel">
                                        <option value="" selected disabled>none</option>
                                        <option value="Walk-in">Walk-In</option>
                                        <option value="FB">FB</option>
                                        <option value="GG">GG</option>
                                        <option value="Agent">Agent</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-light-info">Passport Number</span>
                                    <input type="text" class="form-control" id="passport"
                                        placeholder="Search by Passport No.">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-light-info">Receipt No.</span>
                                    <input type="text" class="form-control" id="receipt"
                                        placeholder="Search by receipt No.">

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('joborder.craete') }}" class="btn btn-outline-secondary float-start"> <i
                            class="fa fa-plus text-primary"></i> เพิ่ม job</a>
                </div>
                <div>
                    <button id="btnExportExcel" class="btn btn-success" type="button">
                        <i class="fa fa-file-excel-o"></i> Export Excel
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div id="tableContainer">

                </div>
            </div>
        </div>

        <script>
  

            document.addEventListener("DOMContentLoaded", function() {
                // เลือกฟอร์ม
                var form = document.getElementById("searchForm");
                // จับการกดปุ่ม Submit
                form.addEventListener("submit", function(event) {
                    // ป้องกันการส่งฟอร์ม
                    event.preventDefault();
                    // ส่งข้อมูลผ่าน AJAX
                    searchCustomer();
                });

                function searchCustomer() {
                    var rangDate = $("#rangDate").val();
                    var JobStatus = $("#job-status").val();

                    var startDate, endDate;
                    if (rangDate) {
                        var dates = rangDate.split(" - ");
                        startDate = formatDate(dates[0].trim()); // ตัดช่องว่างด้านหน้าและด้านหลังของวันที่
                        endDate = formatDate(dates[1].trim()); // ตัดช่องว่างด้านหน้าและด้านหลังของวันที่
                    }

                    function formatDate(dateString) {
                        var parts = dateString.split("/");
                        return parts[2] + "-" + parts[1] + "-" + parts[0];
                    }

                    var Nationality = $("#Nationality").val();
                    var visaType = $("#visaType").val();
                    var Name = $("#name").val();
                    var channel = $("#channel").val();
                    var passport = $("#passport").val();
                    var receipt = $("#receipt").val();

                    // โหลดเนื้อหาของไฟล์ฟอร์มและแสดงใน DOM
                    $.ajax({
                        url: '{{ route('joborder.searchIndex') }}',
                        type: "GET",
                        data: {
                            receipt: receipt,
                            passport: passport,
                            channel: channel,
                            Nationality: Nationality,
                            Name: Name,
                            JobStatus: JobStatus,
                            startDate: startDate,
                            endDate: endDate,
                        },
                        success: function(response) {
                            $("#tableContainer").html(response);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        },
                    });
                }
                // จับ event ปุ่ม Search
                $("#btnSearch").click(function(event) {
                    event.preventDefault();
                    searchCustomer();
                });
                $.ajax({
                    url: '{{ route('joborder.searchIndex') }}',
                    type: "GET",

                    success: function(response) {
                        $("#tableContainer").html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    },
                });
            });
            // Export Excel ตาม filter
            document.getElementById('btnExportExcel').addEventListener('click', function() {
                // ดึงค่าจากฟอร์ม
                var rangDate = $("#rangDate").val();
                var JobStatus = $("#job-status").val();
                var Nationality = $("#Nationality").val();
                var Name = $("#name").val();
                var channel = $("#channel").val();
                var passport = $("#passport").val();
                var receipt = $("#receipt").val();
                var startDate, endDate;
                if (rangDate) {
                    var dates = rangDate.split(" - ");
                    startDate = formatDate(dates[0].trim());
                    endDate = formatDate(dates[1].trim());
                }
                function formatDate(dateString) {
                    var parts = dateString.split("/");
                    return parts[2] + "-" + parts[1] + "-" + parts[0];
                }
                // สร้าง query string
                var params = $.param({
                    receipt: receipt,
                    passport: passport,
                    channel: channel,
                    Nationality: Nationality,
                    Name: Name,
                    JobStatus: JobStatus,
                    startDate: startDate,
                    endDate: endDate,
                });
                // เปิดลิงก์ export พร้อม filter
                window.open(`{{ route('joborder.export') }}?${params}`, '_blank');
            });
            // daterangepicker
            $(function() {
                $(".rangDate").daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        format: "DD/MM/YYYY",
                    },
                });

                $(".rangDate").on("apply.daterangepicker", function(ev, picker) {
                    $(this).val(
                        picker.startDate.format("DD/MM/YYYY") +
                        " - " +
                        picker.endDate.format("DD/MM/YYYY")
                    );
                });

                $(".rangDate").on("cancel.daterangepicker", function(ev, picker) {
                    $(this).val("");
                });
            });
        </script>
    @endsection
