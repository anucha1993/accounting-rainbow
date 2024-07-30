@extends('layouts.main')

@section('content')
    <div class="container-lg page-content-custom " id="customer-index">
        <div class="card">
            <div class="card-body">
                <form action="#" id="searchForm">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <span class="input-group-text  bg-light-info">Visa Type</span>
                                <select name="customer_visa_type" class="form-select visa-type" id="visaType">
                                    <option data-form="retirement" disabled selected value="">Search by Visa Type
                                    </option>
                                    <option value="">None</option>
                                    @forelse ($visaType as $item)
                                        <option data-form="{{ $item->visa_type_from }}" value="{{ $item->visa_type_id }}">
                                            {{ $item->visa_type_name }}</option>
                                    @empty
                                        No data visaType
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text   bg-light-info">Nationality</span>
                                    <select class="select2 form-control custom-select Nationality-customer" id="Nationality"
                                        style="width: 70%; height: 36px" name="Nationality">
                                        <option value="" disabled selected>Search by Nationality</option>
                                        <option value="">None</option>
                                        @forelse ($Nationality as $item)
                                            <option value="{{ $item->nationality_id }}">{{ $item->nationality_code }} : {{ $item->nationality_name }}
                                            </option>
                                        @empty
                                            No Data Nationality
                                        @endforelse




                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <span class="input-group-text  bg-light-info">CODE</span>
                                <input type="text" name="code" id="code" class="form-control" autocomplete="off"
                                    value="{{ $passportNumber }}" placeholder="Search by Code">
                            </div>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <span class="input-group-text  bg-light-info">Name</span>
                                <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                    placeholder="Search by name Alan">
                            </div>
                        </div>


                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <span class="input-group-text  bg-light-info" id="basic-addon2">Passport No.</span>
                                <input type="text" name="passport_number" id="passportNumber" class="form-control"
                                    value="{{ $passportNumber }}" placeholder="Search by Passport Number">
                            </div>
                        </div>



                        <div class="col-md-3">

                            <div class="col mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-light-info">Visa Expired</span>
                                    <input type="text" name="daterange" id="rangDate" class="form-control rangDate"
                                        autocomplete="off" value="" placeholder="Search by Range Date" />

                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <button class="btn btn-rounded waves-effect waves-light btn-outline-info" id="btnSearch"
                                style="">Search</button>

                        </div>


                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a href="{{ route('customer.create') }}" class="btn btn-outline-secondary float-start"> <i
                        class="fa fa-plus text-primary"></i> เพิ่มข้อมูล</a>

            </div>
            <div class="card-body">

                <div id="tableContainer">
                    <br>
                    Select Visa Type
                </div>

            </div>
        </div>


    </div>






    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />





    <script>
        const CustomerDeleteRoute = "{{ route('customer.delete') }}";
    </script>


    <script>
        const tableIndex = "{{ route('customer.tableIndex') }}";


        // Use event delegation
        $(document).on('click', '.btn-delete-customer', function() {
            var cusId = $(this).attr('data-id');
            Swal.fire({
                title: "Do you want to Delete Customer?",
                showCancelButton: true,
                confirmButtonText: "Confirm",
                denyButtonText: `Don't Delete`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: CustomerDeleteRoute,
                        method: "GET",
                        data: {
                            cusId: cusId,
                        },
                        success: function(response) {
                            if (response.success) {
                                $('tr[data-id="' + cusId + '"]').remove();
                                alert('Delete customer Successfully!');
                            } else {
                                alert('Delete customer Error!');
                            }

                        },
                        error: function(xhr) {
                            console.log("Error retrieving customer data");
                        },
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });

        });



        document.addEventListener("DOMContentLoaded", function() {
            // เลือกฟอร์ม
            var form = document.getElementById('searchForm');

            // จับการกดปุ่ม Submit
            form.addEventListener("submit", function(event) {
                // ป้องกันการส่งฟอร์ม
                event.preventDefault();
                // ส่งข้อมูลผ่าน AJAX
                searchCustomer();
            });

            function searchCustomer() {
                var selectedFormType = $('.visa-type').find(':selected').data('form');
                var passportNumber = $('#passportNumber').val();
                var name = $('#name').val();
                var code = $('#code').val();
                var rangDate = $('#rangDate').val();

                var startDate, endDate;
                if (rangDate) {
                    var dates = rangDate.split(' - ');
                    startDate = formatDate(dates[0].trim()); // ตัดช่องว่างด้านหน้าและด้านหลังของวันที่
                    endDate = formatDate(dates[1].trim()); // ตัดช่องว่างด้านหน้าและด้านหลังของวันที่
                }

                function formatDate(dateString) {
                    var parts = dateString.split('/');
                    return parts[2] + '-' + parts[1] + '-' + parts[0];
                }

                var Nationality = $('#Nationality').val();
                var visaType = $('#visaType').val();

                // โหลดเนื้อหาของไฟล์ฟอร์มและแสดงใน DOM
                $.ajax({
                    url: tableIndex,
                    type: 'GET',
                    data: {
                        selectedFormType: selectedFormType,
                        passportNumber: passportNumber,
                        name: name,
                        code: code,
                        startDate: startDate,
                        endDate: endDate,
                        Nationality: Nationality,
                        visaType: visaType
                    },
                    success: function(response) {
                        $('#tableContainer').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // ลบ Customer 

            // จับ event ปุ่ม Search
            $('#btnSearch').click(function(event) {
                event.preventDefault();
                searchCustomer();
            });

            var selectedFormType = $('.visa-type').find(':selected').data('form');
            $.ajax({
                url: tableIndex,
                type: 'GET',
                data: {
                    selectedFormType: selectedFormType
                },
                success: function(response) {
                    $('#tableContainer').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // daterangepicker
        $(function() {
            $('.rangDate').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

            $('.rangDate').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                    'DD/MM/YYYY'));
            });

            $('.rangDate').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>




    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
    {{-- <script src="{{ URL::asset('/js/selects/nationality.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('/js/selects/visa-type.js') }}"></script> --}}
    <script src="{{ URL::asset('/js/customers/index.js') }}"></script>
@endsection
