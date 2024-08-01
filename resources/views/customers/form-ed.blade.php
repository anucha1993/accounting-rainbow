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
                            id="success-outline-radio" name="customer_prefix" value="MR" checked>
                        <label class="form-check-label" for="success-outline-radio">MR.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"
                            id="success2-outline-radio" name="customer_prefix" value="MS">
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
                        style="background-color: lightgrey" required>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label>Nationality : <span class="text-danger">*</span></label>
                    <select class="select2 form-control custom-select" id="nationality" name="customer_nationality"
                        style="width: 100%; height: 36px">

                        <option value="">None</option>
                        @forelse ($nationality as $item)
                            <option value="{{ $item->nationality_id }}">{{ $item->nationality_code }} : {{ $item->nationality_name }}</option>
                        @empty
                            No data nationality
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-3 md-4">
                <div class="form-group">
                    <label>Date of Birth : </span></label>
                    <input type="date" class="form-control" name="customer_birthday">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="form-group">
                    <label>Passport No :</label>
                    <input type="text" class="form-control" name="customer_passport" placeholder="Passport No.">
                </div>
            </div>

            <div class="col-3 md-4">
                <div class="form-group">
                    <label>Passport Expiry Date : </span></label>
                    <input type="date" class="form-control" name="customer_passport_expire_date">
                </div>
            </div>

        </div>

        <hr>
        <h5>Visa Information</h5>
        <div class="row">
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> CODE : <span class="text-danger">*</span></label>
                    <input type="text" name="customer_code" class="form-control" placeholder="code">
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> date of Entry : <span class="text-danger">*</span></label>
                    <input type="date" name="customer_date_entry" class="form-control">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Non-ED : </label>
                    <input type="date" name="customer_visa_date_expiry_0" class="form-control">
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 1 : </label>
      
                    <input type="date" name="customer_visa_date_expiry_1" class="form-control">
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 2 : </label>
                    
                    <input type="date" name="customer_visa_date_expiry_2" class="form-control">
                </div>
            </div>
            <div class="col-3 md-4 mb-3">
                <div class="form-group">
                    <label> Extension 3 : </label>
                    <input type="date" name="customer_visa_date_expiry_3" class="form-control">
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <h5>Contact Information</h5>

            <div class="col-3 md-12 mb-3">
                <div class="form-group">
                    <label>Tel: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="customer_tel" placeholder="Tel">
                </div>
            </div>

            <div class="col-3 md-12 mb-3">
                <div class="form-group">
                    <label>Line / WhatsApp : <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="customer_contact_media"
                        placeholder="Line / WhatsApp">
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label>Email : </label>
                    <input type="email" class="form-control" name="customer_email" placeholder="Email@...">
                </div>
            </div>

            <div class="col-12 md-12 mb-4">
                <div class="form-group">
                    <label>Address in thailand :</label>
                    <textarea name="customer_address_thailand" cols="30" rows="3" class="form-control"
                        placeholder="Address in Thailand"></textarea>
                </div>
            </div>


        </div>






    </div>


    <div class="tab-pane  p-3" id="profile2" role="tabpanel">
        <div class="accordion" id="accordionExample">


            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label>Note : </label>
                    <textarea name="customer_note" class="form-control" placeholder="Note.." cols="30" rows="3"></textarea>
                </div>
            </div>

            <br>
            Limit Upload 20 Files
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
            $('#nationality').select2();
        });
    </script>







    <script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/jquery.repeater/repeater-init.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/jquery.repeater/dff.js') }}"></script>
