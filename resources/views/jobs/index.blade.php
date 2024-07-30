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
                                        style="width: 70%; height: 36px" name="Nationality">
                                        <option value="" disabled selected>Search by Nationality</option>
                                        <option value="">None</option>
                                        @forelse ($nationality as $item)
                                            <option value="{{ $item->nationality_id }}">{{ $item->nationality_code }} : {{ $item->nationality_name }}
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
                    </div>

                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a href="{{ route('joborder.craete') }}" class="btn btn-outline-secondary float-start"> <i
                        class="fa fa-plus text-primary"></i> เพิ่ม job</a>

            </div>

            <div class="card-body">
                <div id="tableContainer">
                    
            </div>
        </div>
    </div>

    <script>
  const tableIndex = "{{ route('joborder.searchIndex') }}";
    </script>
    

    <script src="{{URL::asset('js/jobs/index.js')}}"></script>

@endsection
