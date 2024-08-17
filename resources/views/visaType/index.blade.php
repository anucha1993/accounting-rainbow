@extends('layouts.main')

@section('content')
    <div class="container-fluid page-content">
        <div class="card">
            <div class="card-body">
                <h4>Visa Type

                </h4>
                <hr>

                <form action="{{ route('visaType.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>Visa Name</label>
                            <input type="text" class="form-control" name="visa_type_name" placeholder="Visa Name" required>
                        </div>
                        <div class="col-md-4">
                            <label> Visa Renew</label>
                            <select name="visa_type_renew" class="form-select" required>
                                <option value="Y">ใช่</option>
                                <option value="N">ไม่ใช่</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label> Visa Form</label>
                            <select name="visa_type_from" class="form-select" required>
                                <option value="retirement">retirement</option>
                                <option value="ed">ed</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success pull-end"> เพิ่มข้อมูล</button>
                </form>

            </div>
        </div>
        <div class="card">
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                <table class="table table table-visa-type">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Visa Name</th>
                            <th>Visa Renew</th>
                            <th>Visa Form</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($visaType as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->visa_type_name }}</td>
                                <td>{{ $item->visa_type_renew === 'Y' ? 'ใช่' : 'ไม่ใช่' }}</td>
                                <td>{{ $item->visa_type_from }}</td>
                                <td>
                                    <a href="{{route('visaType.edit',$item->visa_type_id)}}" class="text-info mx-3 btn-add"> <i class="fa fa-edit"></i></a>
                                    @if (Auth::user()->isAdmin === 'Admin')
                                        <a href="{{ route('visaType.delete', $item->visa_type_id) }}" class="text-danger "
                                            onclick="return confirm('Are you sure?')"> <i class="fa fa-trash"></i></a>
                                    @endif

                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{-- {!! $visaType->withQueryString()->links('pagination::bootstrap-5') !!} --}}
            </div>
        </div>
    </div>
    </div>

       {{-- modal edit add-transaction" --}}
       <div class="modal fade custom-modal  " id="visaType" tabindex="-1"
       aria-labelledby="vertical-center-transaction" aria-hidden="true">
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
                $("#visaType")
                    .modal("show")
                    .addClass("modal-lg")
                    .find(".modal-content")
                    .load($(this).attr("href"));
            });
        });

        $(document).ready(function() {
            $('.table-visa-type').DataTable({
                ordering: false,
                order: []
            });
        });

    </script>
@endsection
