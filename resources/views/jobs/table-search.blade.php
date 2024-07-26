
{{$startDate}}
<div class="table-responsive">
    <table class="table table table-job dt-responsive display" cellspacing="0" id="table-content" style="width:100%"
        style="font-size: 10px">
        <thead class="bg-inverse text-white">
            <tr class="text-center">
                <th>Open Job Date</th>
                <th>Job No</th>
                <th>Job Status</th>
                <th>Name</th>
                <th>Nationality</th>
                <th>Passport No</th>
                <th>Source Channel</th>
                <th>Close Job Date</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jobs as $item)
                <tr class="text-center" data-id="{{$item->job_order_id}}">
                    <td> <i class=" fas fa-calendar-alt"></i>
                        {{ date('d-m-Y', strtotime($item->job_order_date)) }}</td>
                    <td>{{ $item->job_order_number }} </td>
                    <td>
                        <span class="badge rounded-pill @if ($item->job_order_status === 'open') bg-primary @else bg-success @endif"style="font-size: 13px">{{ $item->job_order_status }}</span>
                       @if ($item->job_order_finish_date != NULL && $item->job_order_status === 'open' ) 
                       <span class="badge rounded-pill  bg-warning"style="font-size: 13px">Rejob</span>
                       @endif
                        
                        </td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->nationality_name }}</td>
                    <td>{{ $item->customer_passport }}</td>
                    <td>
                        <span
                            class="badge
                           @if ($item->job_order_source_channel === 'Walk-in') bg-primary @endif
                           @if ($item->job_order_source_channel === 'FB') bg-info @endif
                           @if ($item->job_order_source_channel === 'GG') bg-warning @endif
                           @if ($item->job_order_source_channel === 'Agent') bg-danger @endif">{{ $item->job_order_source_channel }}</span>
                    </td>

                    <td> 
                        @if ($item->job_order_status === 'close')
                        <i class=" fas fa-calendar-alt"></i>
                        @endif
                        
                        {{ $item->job_order_status === 'close' ? date('d-m-Y', strtotime($item->job_order_finish_date)) : '-' }}
                    </td>
                    <td>
                        <a href="{{route('joborder.edit',$item->job_order_id)}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                        <a href="#" data-id="{{$item->job_order_id}}" class="btn btn-sm btn-danger btn-delete-job"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                No data Jobs
            @endforelse
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function() {
            $('.table-job').DataTable({
                searching: false,
            });
        });

        const jobOrderDeleteRoute = "{{route('joborder.delete')}}";
</script>

<script src="{{URL::asset('js/jobs/table-search.js')}}"></script>


