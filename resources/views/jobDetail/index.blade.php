@extends('layouts.main')

@section('content')
    <div class="container-fluid page-content">
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <h4>Job Detail
                    </h4>
                    <hr>

                    <form action="{{ route('jobdetail.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label>Job detail Name</label>
                                <input type="text" class="form-control" name="job_detail_name" placeholder="Service Name"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label>Job Type</label>
                                <select name="job_type" class="form-select" required>
                                    <option value="">กรุณาเลือก</option>
                                    @forelse ($jobType as $item)
                                        <option value="{{ $item->job_type_id }}">{{ $item->job_type_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label>Status</label>
                                <select name="job_detail_status" class="form-select" required>
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
                <table class="table table table-service">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Job Detail name</th>
                            <th>Job Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobDetail as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->job_detail_name }}</td>
                                <td>{{ $item->job_type_name }}</td>
                                <td>
                                    @if($item->job_detail_status === 'active') <span class="badge bg-success">Active</span> @endif
                                    @if($item->job_detail_status === 'disable') <span class="badge bg-danger">Disable</span> @endif
                                </td>
                                <td>
                                    <a href="{{ route('jobdetail.edit', $item->job_detail_id) }}" class="text-info mx-3 btn-add">
                                        <i class="fa fa-edit"></i></a>
                                    @if (Auth::user()->isAdmin === 'Admin')
                                        <a href="{{ route('jobdetail.delete', $item->job_detail_id) }}" class="text-danger "
                                            onclick="return confirm('Are you sure?')"> <i class="fa fa-trash"></i></a>
                                    @endif

                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{-- {!! $services->withQueryString()->links('pagination::bootstrap-5') !!} --}}
            </div>
        </div>
        </div>
    </div>

    {{-- modal edit add-transaction" --}}
    <div class="modal fade custom-modal  " id="service" tabindex="-1" aria-labelledby="vertical-center-transaction"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            </div>
        </div>
    </div>


    <script>
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
