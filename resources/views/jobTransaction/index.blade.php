@extends('layouts.main')

@section('content')
    <div class="container-fluid page-content">
               <div class="row">
        <div class="card">
            <div class="card-body">
                <h4>Job Trasaction

                </h4>
                <hr>

                <form action="{{ route('jobtrasaction.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label>Job Trasaction Name</label>
                            <input type="text" class="form-control " name="job_trasaction_name"
                                placeholder="Job Trasaction Name" required>
                        </div>
                        <div class="col-md-2">
                            <label> Trasaction Type </label>
                            <select name="job_trasaction_type" class="form-select" required>
                                <option value="+">+</option>
                                <option value="-">-</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label> Job Detail </label>
                            <select name="job_detail" class="form-select job-detail select2" style="width: 100%" required>
                                <option value="">-None-</option>
                                @forelse ($jobDetail as $item)
                                    <option data-id="{{ $item->job_type }}" data-name="{{ $item->job_type_name }}"
                                        value="{{ $item->job_detail_id }}">{{ $item->job_detail_name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>


                        <div class="col-md-2">
                            <label> job Type </label>
                            <input type="text" class="form-control bg-warning" id="job-type-view" readonly
                                placeholder="Auto">
                            <input type="hidden"name="job_type" id="job-type" readonly>
                        </div>
                        <div class="col-md-2">
                            <label> Trasaction Status </label>
                            <select name="job_trasaction_status" class="form-select job-type" required>
                                <option value="active">Active</option>
                                <option value="disable">Disable</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success pull-end"> เพิ่มข้อมูล</button>
                </form>

            </div>
        </div>
               </div>
        <div class="card">
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
               <div class="table-responsive">
                    <table class="table table table-service">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Job Trasaction Name</th>
                                <th>Trasaction Type</th>
                                <th>Job Detail</th>
                                <th>job Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobtrasactions as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->job_trasaction_name }}</td>
                                    <td>
                                        @if ($item->job_trasaction_type == '+')
                                            <i class="fas fa-plus text-danger"></i>
                                        @endif
                                        @if ($item->job_trasaction_type == '-')
                                            <i class="fas fa-minus text-success"></i>
                                        @endif
                                    </td>
                                    <td>{{ $item->job_detail_name }}</td>
                                    <td>{{ $item->job_type_name }}</td>
                                    <td>
                                        @if ($item->job_trasaction_status === 'active')
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                        @if ($item->job_trasaction_status === 'disable')
                                            <span class="badge bg-danger">Disable</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('jobtrasaction.edit', $item->job_trasaction_id) }}"
                                            class="text-info mx-3 btn-add"> <i class="fa fa-edit"></i></a>
                                        @if (Auth::user()->isAdmin === 'Admin')
                                            <a href="{{ route('jobtrasaction.delete', $item->job_trasaction_id) }}"
                                                class="text-danger " onclick="return confirm('Are you sure?')"> <i
                                                    class="fa fa-trash"></i></a>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
               </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal edit add-Trasaction" --}}
    <div class="modal fade custom-modal  " id="service" tabindex="-1" aria-labelledby="vertical-center-transaction"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.job-detail').on('change', function() {
                var jobType = $(this).find(':selected').data('id');
                var jobName = $(this).find(':selected').data('name');
                $('#job-type').val(jobType);
                $('#job-type-view').val(jobName);

            });
        });


        $(document).ready(function() {
            // modal add user
            $(".btn-add").click("click", function(e) {
                e.preventDefault();
                $("#service")
                    .modal("show")
                    .addClass("modal-lg")
                    .find(".modal-content")
                    .load($(this).attr("href"));
            });
        });

        $(document).ready(function() {
            $('.table-service').DataTable({
                ordering: false,
                order: []
            });
        });
    </script>
@endsection
