<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">Visa Type Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form action="{{ route('jobtrasaction.update', $jobTrasactionModel->job_trasaction_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                    <label>Job Trasaction Name</label>
                    <input type="text" class="form-control " name="job_trasaction_name"
                        value="{{ $jobTrasactionModel->job_trasaction_name }}" placeholder="Job Trasaction Name"
                        required>
                </div>
                <div class="col-md-2">
                    <label> Trasaction Type {{ $jobTrasactionModel->job_trasaction_type }}</label>
                    <select name="job_trasaction_type" class="form-select" required>
                        <option @if ($jobTrasactionModel->job_trasaction_type === '+') selected @endif value="+">+</option>
                        <option @if ($jobTrasactionModel->job_trasaction_type === '-') selected @endif value="-">-</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label> Job Detail </label>
                    <select name="job_detail" class="form-select job-detail-modal select-detail" style="width: 100%"
                        required>
                        <option value="">-None-</option>
                        @forelse ($jobDetail as $item)
                            <option @if ($jobTrasactionModel->job_detail === $item->job_detail_id) selected @endif data-id="{{ $item->job_type }}"
                                data-name="{{ $item->job_type_name }}" value="{{ $item->job_detail_id }}">
                                {{ $item->job_detail_name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>


                <div class="col-md-2">
                    <label> job Type </label>
                    <input type="text" class="form-control bg-warning" id="job-type-view-modal" readonly
                        placeholder="Auto">
                    <input type="hidden"name="job_type" id="job-type-modal" readonly>
                </div>
                <div class="col-md-2">
                    <label> Trasaction Status </label>
                    <select name="job_trasaction_status" class="form-select job-type" required>
                        <option @if ($jobTrasactionModel->job_trasaction_status === 'active') selected @endif value="active">Active</option>
                        <option @if ($jobTrasactionModel->job_trasaction_status === 'disable') selected @endif value="disable">Disable</option>
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

<script>

    $(document).ready(function() {
      

        function editDetail() {
            var jobType = $('.job-detail-modal').find(':selected').data('id');
            var jobName = $('.job-detail-modal').find(':selected').data('name');
            $('#job-type-modal').val(jobType);
            $('#job-type-view-modal').val(jobName);
        }
        $('.job-detail-modal').on('change', function() {
            editDetail()

        });
        editDetail()
    });

    $('.select-detail').select2({
        dropdownParent: $('#service')
    });
</script>
