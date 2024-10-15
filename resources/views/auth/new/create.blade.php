<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">
            เพิ่มสมาชิก
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{ route('auth.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" name="name" class="form-control" placeholder="ชื่อ" required>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" name="lastname" class="form-control" placeholder="นามสกุล" required>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control password" placeholder="****************" required>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>ยืนยันรหัสผ่าน</label>
                        <input type="password" name="password_confirm" class="form-control password-confirm" placeholder="****************" required>
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>อีเมล</label>
                        <input type="email" name="email" class="form-control" placeholder="อีเมล" required>
                    </div>
                </div>






                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <select name="position" id="position" class="form-select" required>
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
                            <option value="">เลือกแผนก</option>
                            @forelse ($departments as $item)
                                <option value="{{ $item->dep_id }}">{{ $item->dep_name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>ระดับสิทธิ์</label>
                        <select name="isAdmin" id="isAdmin" class="form-select" required>
                            <option value="">เลือกระดับ</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                            <option value="Loyal">Loyal</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault" checked>
                            <label class="form-check-label" for="flexSwitchCheckDefault">เปิดใช้งาน</label>
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
