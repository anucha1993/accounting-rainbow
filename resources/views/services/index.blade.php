@extends('layouts.main')

@section('content')
    <div class="container-fluid page-content">
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <h4>Service
                    </h4>
                    <hr>

                    <form action="{{ route('service.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label>Service Name</label>
                                <input type="text" class="form-control" name="service_name" placeholder="Service Name"
                                    required>
                            </div>
                            <div class="col-md-3">
                                <label>Service Group</label>
                                <select name="service_group" class="form-select" required>
                                    <option value="">กรุณาเลือก</option>
                                    @forelse ($visaTypes as $item)
                                        <option value="{{ $item->visa_type_name }}">{{ $item->visa_type_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label> Service Type</label>
                                <select name="service_type" class="form-select" required>
                                    <option value="YES">Service</option>
                                    <option value="NO">No Service</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label> Service Other</label>
                                <select name="service_other" class="form-select" required>
                                    <option value="Y">Other</option>
                                    <option value="N">No Other</option>
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
                <table class="table table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Service Name</th>
                            <th>Service Group</th>
                            <th>Service Type</th>
                            <th>Service Other</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->service_name }}</td>
                                <td>{{ $item->service_group }}</td>
                                <td>{{ $item->service_type === 'YES' ? 'Service' : 'No Service' }}</td>
                                <td>{{ $item->service_other === 'Y' ? 'Other' : 'No Other' }}</td>
                                <td>
                                    <a href="{{ route('service.edit', $item->service_id) }}" class="text-info mx-3 btn-add">
                                        <i class="fa fa-edit"></i></a>
                                    @if (Auth::user()->isAdmin === 'Admin')
                                        <a href="{{ route('service.delete', $item->service_id) }}" class="text-danger "
                                            onclick="return confirm('Are you sure?')"> <i class="fa fa-trash"></i></a>
                                    @endif

                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {!! $services->withQueryString()->links('pagination::bootstrap-5') !!}
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
    </script>
@endsection
