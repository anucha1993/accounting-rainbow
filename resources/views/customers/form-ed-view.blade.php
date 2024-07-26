@yield('retirement')




<br>

<div class="tab-content">
    <div class="tab-pane active" id="home2" role="tabpanel">
        <h5>Passport Information</h5>

        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label>Name : <span class="text-danger">*</span></label>
                    <label for="">{{ $cus->customer_prefix === 'MR' ? 'MR' : 'MS' }}.{{ $cus->customer_name }}</label>
                   
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="form-group">
                    @php
                        $nationalityName = $nationality->where('nationality_id',$cus->customer_nationality)->first();
                    @endphp
                    <label>Nationality : <spans class="text-danger">*</spans></label>
                    <label>{{$nationalityName->nationality_name}}</label>
                </div>
            </div>



            <div class="col-3 md-4">
                <div class="form-group">
                    <label>Date of Birth : </span></label>
                    <label>{{ ($cus->customer_birthday ?   date('d-m-Y', strtotime($cus->customer_birthday)) : '' ) }} </span></label>
                    
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="form-group">
                    <label>Passport No :</label>
                    <label>{{$cus->customer_passport}}</label>
                    
                </div>
            </div>

            <div class="col-3 md-4">
                <div class="form-group">
                    <label>Passport Expiry Date : </span></label>
                    <label>{{ ($cus->customer_passport_expire_date ?   date('d-m-Y', strtotime($cus->customer_passport_expire_date)) : '' ) }}</span></label>
                   
                </div>
            </div>

        </div>

        <hr>
        <h5>Visa Information</h5>
        <div class="row">
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> CODE : <span class="text-danger">*</span> {{ $cus->customer_code }}</label>
                   
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> date of Entry : <span class="text-danger">* </span> {{ ($cus->customer_date_entry ?   date('d-m-Y', strtotime($cus->customer_date_entry)) : '-' ) }}</label>
                  
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Non-ED :  {{ ($cus->customer_visa_date_expiry_0 ?   date('d-m-Y', strtotime($cus->customer_visa_date_expiry_0)) : '-' ) }}</label>
                 
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 1 : {{ ($cus->customer_visa_date_expiry_1 ?   date('d-m-Y', strtotime($cus->customer_visa_date_expiry_1)) : '-' ) }}</label> 
                 
                   
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 2 : {{ ($cus->customer_visa_date_expiry_2 ?   date('d-m-Y', strtotime($cus->customer_visa_date_expiry_2)) : '-' ) }}</label> 
                  
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 3 : {{ ($cus->customer_visa_date_expiry_3 ?   date('d-m-Y', strtotime($cus->customer_visa_date_expiry_3)) : '-' ) }}</label> 
                </div>
            </div>
        </div>

        <script></script>

        <hr>

        <div class="row">
            <h5>Contact Information</h5>

            <div class="col-3 md-12 mb-3">
                <div class="form-group">
                    <label>Tel: <span class="text-danger">*</span></label>
                    <label>{{$cus->customer_tel}}</label>
             
                </div>
            </div>

            <div class="col-3 md-12 mb-3">
                <div class="form-group">
                    <label>Line / WhatsApp : <span class="text-danger">*</span></label>
                    <label>{{$cus->customer_contact_media}}</label>
                </div>
            </div>


            <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label>Email : </label>
                    <label>{{$cus->customer_email}} </label>
               
                </div>
            </div>
            <hr>
            <div class="col-12 md-12 mb-4">
                <div class="form-group">
                    <h5><b>Address in thailand :</b></h5>
                    <label>{{$cus->customer_address_thailand}}</label>
                    
                </div>
            </div>



        </div>






    </div>


    <div class="tab-pane  p-3" id="profile2" role="tabpanel">
        <div class="accordion" id="accordionExample">


            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <h5>Note : </h5>
                    <label>{{$cus->customer_note}}</label>
                </div>
            </div>

            <br>
            Limit Upload 20 Files
            <div class="data-container">
                @forelse ($files as $item)
                    <li class="list-group-item ">
                        <i data-feather="box"
                            class="text-info feather-sm me-2 fas far fa-file text-danger"></i>
                        <a href="{{ URL::asset('storage/customer/' . $item->customer_file_customer_id . '/' . $item->customer_file_name) }}"
                            target="_blank"
                            class="text-black">{{ $item->customer_file_name }}</a>
                       
                        <a target="_blank"
                            href="{{ URL::asset('storage/customer/' . $item->customer_file_customer_id . '/' . $item->customer_file_name) }}"
                            class="text-black float-end"><i class="fas fa-eye text-info"></i>
                            &nbsp; &nbsp; &nbsp;&nbsp; </a>
                        <br>
                    </li>


                @empty
                    No data file
                @endforelse

            </div>
            <br>

          




        </div>
    </div>
    
    <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Save and Add Job Order</button> &nbsp; &nbsp;
        &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
        <button type="submit" class="btn btn-success">Save</button>
        &nbsp;
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
            Cancel</button>
    </div>


    <script>
        $(document).ready(function() {
            // กำหนดให้ Select2 ใช้งานกับตัวเลือกที่มี id เป็น "nationality"
            $('#nationality').select2({
                placeholder: 'Select Nationality',
            });

            // เมื่อเปิด dropdown
            $('#nationality').on('select2:open', function() {
                // ลบคลาส 'is-invalid' ออก เมื่อมีการเปิด dropdown
                $('#nationality').removeClass('is-invalid');
                $('#nationalityError').hide(); // ซ่อนข้อความผิดพลาด
            });

            // เมื่อปิด dropdown
            $('#nationality').on('select2:close', function() {
                // ตรวจสอบว่ามีการเลือกค่าหรือไม่
                if ($(this).val() === '') {
                    // ถ้าไม่มีการเลือกค่า ให้แสดงข้อความผิดพลาด
                    $('#nationality').addClass('is-invalid');
                    $('#nationalityError').show(); // แสดงข้อความผิดพลาด
                }
            });

            // เมื่อฟอร์มถูกส่ง
            $('form').submit(function() {
                // ตรวจสอบว่ามีการเลือกค่าหรือไม่
                if ($('#nationality').val() === '') {
                    // ถ้าไม่มีการเลือกค่า ให้แสดงข้อความผิดพลาด
                    $('#nationality').addClass('is-invalid');
                    $('#nationalityError').show(); // แสดงข้อความผิดพลาด
                    return false; // ยกเลิกการส่งฟอร์ม
                }
            });
        });
    </script>




    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />


    <script>
        const _token = $('#_token').val();
        const RouteDeleteFile = "{{ route('file.delete') }}";
        const assetURL = "{{ URL::asset('') }}";
        const RouteDeleteNinety = "{{ route('ninety.delete') }}";
        const RouteDeletevisaRenew = "{{ route('visarenew.delete') }}";


        $(document).ready(function() {
            var expiry1 = $('#expiry-1').val();
            if (expiry1) {
                $('#add-expiry-1').css("display", "none");
                $('#show-expiry-1').css("display", "none");
                $('#expiry-1').css("display", "block");
            } else {
                $('#show-expiry-1').css("display", "block");
                $('#expiry-1').css("display", "none");
            }

            var expiry2 = $('#expiry-2').val();
            if (expiry2) {
                $('#add-expiry-2').css("display", "none");
                $('#show-expiry-2').css("display", "none");
                $('#expiry-2').css("display", "block");
            } else {
                $('#show-expiry-2').css("display", "block");
                $('#expiry-2').css("display", "none");
            }

            var expiry3 = $('#expiry-3').val();
            if (expiry3) {
                $('#add-expiry-3').css("display", "none");
                $('#show-expiry-3').css("display", "none");
                $('#expiry-3').css("display", "block");
            } else {
                $('#show-expiry-3').css("display", "block");
                $('#expiry-3').css("display", "none");
            }

            //click 
            $('#add-expiry-1').on('click', function() {

                $('#expiry-1').css("display", "block");
                $('#show-expiry-1').css("display", "none");
            });

            $('#add-expiry-2').on('click', function() {

                $('#expiry-2').css("display", "block");
                $('#show-expiry-2').css("display", "none");
            });

            $('#add-expiry-3').on('click', function() {

                $('#expiry-3').css("display", "block");
                $('#show-expiry-3').css("display", "none");

            });

        });
    </script>




    <script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/jquery.repeater/repeater-init.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/jquery.repeater/dff.js') }}"></script>



    <script src="{{ URL::asset('js/customers/modal-edit.js') }}"></script>
    <script src="{{ URL::asset('js/customers/form-edit.js') }}"></script>
