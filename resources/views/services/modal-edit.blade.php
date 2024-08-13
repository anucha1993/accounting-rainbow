<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">Service Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form action="{{ route('service.update',$serviceModel->service_id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                    <label>Service Name</label>
                    <input type="text" class="form-control" name="service_name" placeholder="Service Name" value="{{$serviceModel->service_name}}"
                        required>
                </div>
                <div class="col-md-3">
                    <label>Service Group</label>
                    <select name="service_group" class="form-select" required>
                        <option value="">กรุณาเลือก</option>
                        @forelse ($visaTypes as $item)
                            <option @if($serviceModel->service_group === $item->visa_type_name) selected @endif  value="{{ $item->visa_type_name }}">{{ $item->visa_type_name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col-md-3">
                    <label> Service Type</label>
                    <select name="service_type" class="form-select" required>
                        <option @if($serviceModel->service_type === 'YES') selected @endif value="YES">Service</option>
                        <option @if($serviceModel->service_type === 'NO') selected @endif value="NO">No Service</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label> Service Other</label>
                    <select name="service_other" class="form-select" required>
                        <option @if($serviceModel->service_other === 'Y') selected @endif  value="Y">Other</option>
                        <option   @if($serviceModel->service_other === 'N') selected @endif value="N">No Other</option>
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
