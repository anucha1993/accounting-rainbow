
{{$startDate}}
<div class="table-responsive">
    <table class="table table table-job dt-responsive display " cellspacing="0" id="table-content" style="width:100%"
        style="font-size: 10px">
        <thead class="bg-inverse text-white">
            <tr class="text-center">
                <th>Open Job Date</th>
                <th>Job No</th>
                <th>Job Status</th>
                <th>Name</th>
                <th>Nationality</th>
            @if (Auth::user()->isAdmin === 'Admin')
            <th>Total</th>
            <th>Job detail</th>
            @endif
              
                <th>Receipt No.</th>
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
                    @if (Auth::user()->isAdmin === 'Admin')
                    <td align="right">

                        @php
                            $totalTransactionAmount = $transactions->where('transaction_job',$item->job_order_id)->sum('transaction_amount');
                        @endphp
                        
                         {{ number_format($totalTransactionAmount, 2, '.', ',') }}
                    <td >
                       {{$item->job_detail_name}}
                    </td>
                    @endif
                  
                    

                    <td>{{ $item->job_order_receipt ? $item->job_order_receipt : '-' }}</td>

                    <td> 
                        @if ($item->job_order_status === 'close')
                        <i class=" fas fa-calendar-alt"></i>
                        @endif
                        
                        {{ $item->job_order_status === 'close' ? date('d-m-Y', strtotime($item->job_order_finish_date)) : '-' }}
                    </td>
                    <td>
                    
                        @if (Auth::user()->isAdmin === 'Admin')
                      
                        <a href="#" data-id="{{$item->job_order_id}}" class="btn btn-sm btn-danger btn-delete-job"> <i class="fa fa-trash"></i></a>
                     
                       @endif
                       <a href="{{route('joborder.edit',$item->job_order_id)}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                       
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
                order:[]
            });
        });


</script>

<script>

    
$(document).ready(function () {
               $(".btn-delete-job").on("click", function (e) {
                   var JobId = $(this).attr('data-id');
   
                   console.log(JobId);
                   e.preventDefault();
                   Swal.fire({
                       title: "Do you want to Delete Job?",
                       showCancelButton: true,
                       confirmButtonText: "Confirm",
                       denyButtonText: `Don't Delete`,
                   }).then((result) => {
                       if (result.isConfirmed) {
                           $.ajax({
                               url: "{{route('joborder.delete')}}",
                               method: "GET",
                               data: {
                                   JobId: JobId,
                               },
                               success: function (response) {
                                   if(response.success){
                                     $('tr[data-id="' + JobId + '"]').remove();
                                     alert('Delete Job Successfully!');
                                   }else{
                                     alert('Delete Job Error!');
                                   }
                                  
                               },
                               error: function (xhr) {
                                   console.log("Error retrieving customer data");
                               },
                           });
                       } else if (result.isDenied) {
                           Swal.fire("Changes are not saved", "", "info");
                       }
                   });
               });
           });
</script>


