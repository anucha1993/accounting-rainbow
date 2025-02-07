<div class="table-responsive ">
    <table class="table table-customer">
        <thead class="bg-inverse text-white" style=" position: sticky; top: 0; background-color: #000; z-index: 1;">
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Nationality</th>
                <th>Passport No.</th>
                <th>Passport Exp.</th>
                <th>Non-ED</th>
                <th>Extension1</th>
                <th>Extension2</th>
                <th>Extension3</th>
                <th>Date of Entry</th>
                <th>Contact</th>
                <th>Note</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($customers as $key => $item)
                <tr  data-id="{{$item->customer_id}}">
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_code }}</td>
                    <td>{{ $item->nationality_name ? : '-' }}</td>
                    <td>{{ $item->customer_passport }}</td>
                    <td>{{  date('d-m-Y', strtotime($item->customer_passport_expire_date ))}}</td>
                    <td>{{ ($item->customer_visa_date_expiry_0 !== NULL ?  date('d-m-Y', strtotime($item->customer_visa_date_expiry_0)) : '-' )}}</td>
                    <td>{{ ($item->customer_visa_date_expiry_1 !== NULL ?  date('d-m-Y', strtotime($item->customer_visa_date_expiry_1)) : '-' )}}</td>
                    <td>{{ ($item->customer_visa_date_expiry_2 !== NULL ?  date('d-m-Y', strtotime($item->customer_visa_date_expiry_2)) : '-' )}}</td>
                    <td>{{ ($item->customer_visa_date_expiry_3 !== NULL ?  date('d-m-Y', strtotime($item->customer_visa_date_expiry_3)) : '-' )}}</td>
                    <td>{{ date('d-m-Y', strtotime($item->customer_date_entry)) }}</td>
                    <td>{{ $item->customer_contact_media }}</td>
                    <td style="width: 10%"><span id="span-note-show-{{ $key }}">{!! substr($item->customer_note, 0, 15) !!}
                            <a href="#" data-id ="{{ $key }}" class="btn-show-note"
                                id="a-show-{{ $key }}">Show</a></span>
                        <p style="display: none" id="p-note-show-{{ $key }}">
                            {{ $item->customer_note }}
                            <a data-id ="{{ $key }}" href="#"
                                class="btn-hide-note"id="note-hide-{{ $key }}">Hide</a>
                        </p>
                    </td>
                    <td>
                        |
                        <a href="{{ route('customer.show', $item->customer_id) }}" class=""><i
                                class="fa fa-eye text-dark"></i></a> |
                        <a href="{{ route('customer.edit', $item->customer_id) }}" class=""> <i
                                class="fa fa-edit text-primary"></i> </a> |
                        @if (Auth::user()->isAdmin === 'Admin')
                            <a href="#" class="btn-delete-customer" data-id="{{ $item->customer_id }}"><i
                                    class="fa fa-trash text-danger"></i></a>
                        @endif

                    </td>






                </tr>
            @endforeach


        </tbody>
    </table>
    {{-- {!! $customers->withQueryString()->links('pagination::bootstrap-5') !!} --}}
</div>

<script>
    $(document).ready(function() {
        $('.table-customer').DataTable({
           searching: false
        });
    });
</script>
