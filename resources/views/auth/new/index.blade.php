
@extends('layouts.main')

@section('content')
<div class="container-fluid page-content">
    <div class="card">
        <div class="card-body">
            <h4>ระบบสมาชิก <a href="{{ route('auth.create') }}" class="btn btn-success float-end btn-adduser ">เพิ่มสมาชิก</a>
            </h4>

        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive-sm">
            <div class="form-group">

                <form action="" method="GET">
                    <div class="input-group mb-3 pull-right">
                        <input type="text" class="form-control" placeholder="ค้นหาข้อมูล..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">ค้นหา</button>
                        </div>
                    </div>
                </form>

            </div>

            <table class="table table">
                <thead>
                    <tr>
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>อีเมล</th>
                        <th>ตำแหน่ง/แผนก</th>
                        <th>ระดับ</th>
                        <th>สถานะ</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $item)
                        <tr>
                            <td>{{ $item->name }} {{ $item->lastname}}</td>
                            <td>{{ $item->email}} </td>
                            <td>{{ $item->position_name }} ({{$item->dep_name}})</td>
                            <td>
                               
                                @if ($item->isAdmin === "Admin")
                                <span class="badge bg-info">Admin</span>
                                @endif
                                @if ($item->isAdmin === "Operator")
                                <span class="badge bg-dark">Operator</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->status === "Y")
                                <span class="badge bg-success">เปิดใช้งาน</span>
                                @else
                                <span class="badge bg-dark">ปิดใช้งาน</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('auth.edit',$item->id)}}" class="btn btn-info btn-sm btn-edituser"><i class="fa fa-edit"></i> แก้ไข</a>&nbsp;
                                <a href="#"  data-fullname="{{$item->name.''.$item->lastname}}"data-id ="{{$item->id}}" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>
                            </td>
                        </tr>
                    @empty
                    No Users Found.
                    @endforelse
                </tbody>
            </table>
            {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
    </div>


    {{-- modal เพิ่ม User --}}
    <div class="modal fade custom-modal" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- การโหลดเนื้อหาโมดัลจะเกิดขึ้นที่นี่ -->
            </div>
        </div>
    </div>
    {{-- modal แก้ไข User --}}
    <div class="modal fade custom-modal editUser" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- การโหลดเนื้อหาโมดัลจะเกิดขึ้นที่นี่ -->
            </div>
        </div>
    </div>


    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">

    <script src="{{ URL::asset('/js/auth/index.js') }}"></script>

@endsection
