@extends('layouts.main')

@section('content')
    <div class="container-xl page-content " id="customer-index">
        <div class="card">
            <div class="card-body">

                <div class="card-content">
                    <h4 class="modal-title line" id="myLargeModalLabel">
                        Customer Information
                    </h4>

                    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data" id="addCustomer">
                        @csrf
                        @method('post')

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex active" data-bs-toggle="tab" href="#home2" role="tab">
                                    <span><i class="fas fa-address-card"></i>
                                    </span>
                                    <span class="d-none d-md-block ms-2">Customer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" data-bs-toggle="tab" href="#profile2" role="tab">
                                    <span><i class=" fas fa-folder-open"></i>
                                    </span>
                                    <span class="d-none d-md-block ms-2">Note && File Attach</span>
                                </a>
                            </li>
                    
                        </ul>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label> Visa Type</label>
                                <select name="customer_visa_type" class="form-select visa-type">
                                     
                                   @forelse ($visaType as $item)
                                       <option data-form="{{$item->visa_type_from}}" value="{{$item->visa_type_id}}">{{$item->visa_type_name}}</option>
                                   @empty
                                       No Data Visa Type
                                   @endforelse
                                   
                                </select>
                            </div>
                        </div>

                        <div id="formContainer">
                            <br>
                            Select Visa Type 
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

  


<script>

const TypeVisaFrom = "{{route('customer.formType')}}";

    $(document).ready(function(){
        // เมื่อมีการเลือก Visatype
        $('.visa-type').change(function(){
            // รับค่า Visatype ที่เลือก
            var selectedFormType = $(this).find(':selected').data('form');
            console.log(selectedFormType);
            // โหลดเนื้อหาของไฟล์ฟอร์มและแสดงใน DOM
            $.ajax({
                url: TypeVisaFrom ,
                type: 'GET',
                data: { selectedFormType: selectedFormType },
                success: function(response) {
                    $('#formContainer').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        var selectedFormType = $(this).find(':selected').data('form');
            console.log(selectedFormType);
            // โหลดเนื้อหาของไฟล์ฟอร์มและแสดงใน DOM
            $.ajax({
                url: TypeVisaFrom ,
                type: 'GET',
                data: { selectedFormType: selectedFormType },
                success: function(response) {
                    $('#formContainer').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });



    });
</script>


@endsection
