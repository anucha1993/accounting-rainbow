<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">Service Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form action="{{ route('jobdetail.update',$jobDetailModel->job_detail_id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <label>Job detail Name</label>
                    <input type="text" class="form-control" name="job_detail_name"   placeholder="Service Name" value="{{$jobDetailModel->job_detail_name}}"
                        required>
                </div>
                <div class="col-md-4">
                    <label>Job Type</label>
                    <select name="job_type" class="form-select" required>
                        <option value="">กรุณาเลือก</option>
                        @forelse ($jobType as $item)
                            <option @if($jobDetailModel->job_type === $item->job_type_id) selected @endif value="{{ $item->job_type_id }}">{{ $item->job_type_name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Status</label>
                    <select name="job_detail_status" class="form-select" required>
                        <option @if($jobDetailModel->job_type === "active") selected @endif value="active">Active</option>
                        <option @if($jobDetailModel->job_type === "disable") selected @endif value="disable">Disable</option>
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
