<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">
            แก้ไขข้อมูลสมาชิก
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{route('auth.update',$user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="ชื่อ" required>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" name="lastname" value="{{$user->lastname}}" class="form-control" placeholder="นามสกุล" required>
                    </div>
                </div>

                <div class="col-md-6 mb-4 col-password" style="display: none">
                    <div class="form-group">
                        <label>รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control password" placeholder="****************" disabled>
                    </div>
                </div>

                <div class="col-md-6 mb-4  col-password-confirm" style="display: none">
                    <div class="form-group">
                        <label>ยืนยันรหัสผ่าน</label>
                        <input type="password" name="password_confirm" class="form-control password-confirm" placeholder="****************" disabled>
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>อีเมล</label>
                        <input type="email" name="email" class="form-control" placeholder="อีเมล" value="{{$user->email}}" required>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <select name="position" id="position" class="form-select" required>
                            @if ($user->position)
                                <option value="{{$user->position}}">{{$user->position_name}}</option>
                            @else
                            <option value="">เลือกแผนก</option>
                            @endif
                            <option value="">เลือกตำแหน่ง</option>
                            @forelse ($positions as $item)
                                <option value="{{ $item->position_id }}">{{ $item->position_name }}</option>
                            @empty
                                No Position Found.
                            @endforelse
                        </select>
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>เลือกแผนก</label>
                        <select name="department" id="department" class="form-select" required>
                            @if ($user->department)
                            <option value="{{$user->department}}">{{$user->dep_name}}</option>
                            @else
                            <option value="">เลือกแผนก</option>
                            @endif

                            @forelse ($departments as $item)
                                <option value="{{ $item->dep_id }}">{{ $item->dep_name }}</option>
                            @empty
                            No Department Found.
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>ระดับสิทธิ์</label>
                        <select name="isAdmin" id="isAdmin" class="form-select" required>
                            <option value="" >เลือกระดับ</option>
                            <option value="Admin"  @if ($user->isAdmin === 'Admin') selected @endif>Admin</option>
                            <option value="Operator"  @if ($user->isAdmin === 'Operator') selected @endif>Operator</option>
                            <option value="Loyal"  @if ($user->isAdmin === 'Loyal') selected @endif>Loyal</option>
                        
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault"  @if ($user->status === 'Y') checked @endif >
                            <label class="form-check-label" for="flexSwitchCheckDefault">เปิดใช้งาน</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <div class="">
                            <input class="" name="show_password" type="checkbox" id="showPassword" >
                            <label class="" for="showPassword">ต้องการเปลี่ยนรหัสผ่าน</label>
                        </div>
                    </div>
                </div>
                
                
            </div>


            <div class="modal-footer">

                <button type="button"
                    class="btn btn-light-danger text-danger font-weight-medium waves-effect text-start "
                    data-bs-dismiss="modal">
                    ยกเลิก
                </button>
                <button type="submit" class="btn  btn-success">บันทึกข้อมูล</button>
        </form>
    </div>
</div>
</div>
<script src="{{ URL::asset('/js/auth/create.js') }}"></script>
