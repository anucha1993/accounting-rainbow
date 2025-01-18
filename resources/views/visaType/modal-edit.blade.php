<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">Visa Type Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form  action="{{route('visaType.update',$visaTypeModel->visa_type_id)}}" method="POST">
               @csrf
               @method('PUT')
            <div class="input-group mb-3">
                    <div class="col-md-4">
                        <label>Visa Name</label>
                        <input type="text" class="form-control" name="visa_type_name" placeholder="Visa Name" value="{{$visaTypeModel->visa_type_name}}"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label> Visa Renew</label>
                        <select name="visa_type_renew" class="form-select" required>
                            <option @if($visaTypeModel->visa_type_renew === 'Y') selected @endif value="Y">ใช่</option>
                            <option @if($visaTypeModel->visa_type_renew === 'N') selected @endif value="N">ไม่ใช่</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <label> Visa Form</label>
                        <select name="visa_type_from" class="form-select" required>
                            <option @if($visaTypeModel->visa_type_from === 'retirement') selected @endif value="retirement">retirement</option>
                            <option @if($visaTypeModel->visa_type_from === 'ed') selected @endif value="ed">ed</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <label for="">Status</label>
                        <select name="status" class="form-select" required>
                            <option @if($visaTypeModel->status === 'activate') selected @endif value="activate">activate</option>
                            <option @if($visaTypeModel->status === 'disabled') selected @endif value="disabled">disabled</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success pull-end"> Update</button>
        </form>

    </div>
    </form>
    <br>

</div>
</div>
