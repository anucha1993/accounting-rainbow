@yield('retirement')




<br>

<div class="tab-content">
    <div class="tab-pane active" id="home2" role="tabpanel">
        <h5>Passport Information</h5>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"
                            id="success-outline-radio" name="customer_prefix"
                            {{ $cus->customer_prefix === 'MR' ? 'checked' : '' }} value="MR">
                        <label class="form-check-label" for="success-outline-radio">MR.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"
                            id="success2-outline-radio" name="customer_prefix"
                            {{ $cus->customer_prefix === 'MS' ? 'checked' : '' }} value="MS">
                        <label class="form-check-label" for="success2-outline-radio">MS.</label>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label>Name : <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="customer_name" placeholder="Name"
                        value="{{ $cus->customer_name }}" style="background-color: lightgrey" required>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label>Nationality : <span class="text-danger">*</span></label>
                    <select class="select2 form-control custom-select " id="nationality" name="customer_nationality"
                        style="width: 100%; height: 36px">

                        <option value=""></option>
                        <option selected value="1">None</option>
                        @forelse ($nationality as $item)
                            <option @if ($cus->customer_nationality === $item->nationality_id) selected @endif
                                value="{{ $item->nationality_id }}">
                                {{ $item->nationality_code }} : {{ $item->nationality_name }}</option>
                        @empty
                            No data nationality
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-3 md-4">
                <div class="form-group">
                    <label>Date of Birth : </span></label>
                    <input type="date" class="form-control" name="customer_birthday"
                        value="{{ $cus->customer_birthday }}">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="form-group">
                    <label>Passport No :</label>
                    <input type="text" class="form-control" name="customer_passport" placeholder="Passport No."
                        value="{{ $cus->customer_passport }}">
                </div>
            </div>

            <div class="col-3 md-4">
                <div class="form-group">
                    <label>Passport Expiry Date : </span></label>
                    <input type="date" class="form-control" name="customer_passport_expire_date"
                        value="{{ $cus->customer_passport_expire_date }}">
                </div>
            </div>

        </div>

        <hr>
        <h5>Visa Information</h5>
        <div class="row">
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> CODE : <span class="text-danger">*</span></label>
                    <input type="text" name="customer_code" class="form-control" value="{{ $cus->customer_code }}">
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> date of Entry : <span class="text-danger">*</span></label>
                    <input type="date" name="customer_date_entry" class="form-control"
                        value="{{ $cus->customer_date_entry }}">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Non-ED : </label>
                    <input type="date" id="expiry-0" name="customer_visa_date_expiry_0" class="form-control"
                        value="{{ $cus->customer_visa_date_expiry_0 }}">
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 1 : </label> <a href="#" id="add-expiry-1">add</a>
                    <p id="show-expiry-1" style="display: none">-</p>
                    <input type="date" id="expiry-1" name="customer_visa_date_expiry_1" class="form-control"
                        value="{{ $cus->customer_visa_date_expiry_1 }}">
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 2 : </label> <a href="#" id="add-expiry-2">add</a>
                    <p id="show-expiry-2" style="display: none">-</p>
                    <input type="date" id="expiry-2" name="customer_visa_date_expiry_2" class="form-control"
                        value="{{ $cus->customer_visa_date_expiry_2 }}">
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 3 : </label> <a href="#" id="add-expiry-3">add</a>
                    <p id="show-expiry-3" style="display: none">-</p>
                    <input type="date" id="expiry-3" name="customer_visa_date_expiry_3" class="form-control"
                        value="{{ $cus->customer_visa_date_expiry_3 }}">
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
                    <input type="text" class="form-control" name="customer_contact" placeholder="Tel"
                        value="{{ $cus->customer_contact }}">
                </div>
            </div>

            <div class="col-3 md-12 mb-3">
                <div class="form-group">
                    <label>Line / WhatsApp : <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="customer_contact_media"
                        value="{{ $cus->customer_contact_media }}" placeholder="Line / WhatsApp">
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label>Email : </label>
                    <input type="email" class="form-control" name="customer_email" placeholder="Email@..."
                        value="{{ $cus->customer_email }}">
                </div>
            </div>

            <div class="col-12 md-12 mb-4">
                <div class="form-group">
                    <label>Address in thailand :</label>
                    <textarea name="customer_address_thailand" cols="30" rows="3" class="form-control"
                        placeholder="Address in Thailand">{{ $cus->customer_address_thailand }}</textarea>
                </div>
            </div>


        </div>






    </div>


    <div class="tab-pane  p-3" id="profile2" role="tabpanel">
        <div class="accordion" id="accordionExample">


            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label>Note : </label>
                    <textarea name="customer_note" class="form-control" placeholder="Note.." cols="30" rows="3">{{ $cus->customer_note }}</textarea>
                </div>
            </div>

            <br>
            Limit Upload 20 Files
            <div class="data-container">
                @forelse ($files as $item)
                    <li class="list-group-item ">
                        <i data-feather="box" class="text-info feather-sm me-2 fas far fa-file text-danger"></i>
                        <a href="{{ URL::asset('storage/customer/' . $item->customer_file_customer_id . '/' . $item->customer_file_name) }}"
                            target="_blank" class="text-black">{{ $item->customer_file_name }}</a>
                        <a href="#" class="text-black float-end btn-delete"
                            data-customer ="{{ $item->customer_file_customer_id }}"
                            data-id ="{{ $item->customer_file_id }}" data-name ="{{ $item->customer_file_name }}"><i
                                class="fas fa-trash text-danger"></i></a>
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

            <div class="email-repeater mb-3">
                <div data-repeater-list="repeater-group">
                    <div data-repeater-item class="row mb-3">
                        <div class="col-6 md-10">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="customFile" name="customFile" />
                            </div>
                        </div>
                        <div class="col-6 md-2">
                            <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light"
                                type="button">
                                <i data-feather="x-circle" class="feather-sm fill-white fas fa-window-close"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">
                    <div class="d-flex align-items-center">
                        Add More File
                        <i data-feather="plus-circle" class="feather-sm ms-2 fill-white fas fa-plus-circle"></i>
                    </div>
                </button>
            </div>




        </div>
    </div>


    <div class="modal-footer">

        <button type="submit" name="addJobOrder" value="addJobOrder" class="btn btn-primary">Save and Add Job Order</button> &nbsp; &nbsp;
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
