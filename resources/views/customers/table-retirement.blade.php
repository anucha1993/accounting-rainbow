<div id="table-content" class="table-responsive">
    <table class="table table-customer dt-responsive display" cellspacing="0" id="table-content" style="width:100%"
        style="font-size: 10px">
        <thead class="bg-inverse text-white">
            <tr>
                <th>Prefix</th>
                <th>Name</th>
                <th>Nationality</th>
                <th>Passport No</th>
                <th>Date of Birth</th>
                <th>Passport Expiry Date</th>
                <th>Visa Expiry</th>
                <th>Re-Entry</th>
                <th>Contact</th>
                <th>Address In Thai</th>
                <th>E-Mail</th>
                <th>Note</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $item)
                <tr data-id="{{$item->customer_id}}">
                    <td>{{ $item->customer_prefix }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->nationality_name }}</td>
                    <td>{{ $item->customer_passport ? : '-' }}</td>
                    <td>{{ $item->customer_birthday ? date('d-m-Y', strtotime($item->customer_birthday)) : '-' }}
                    </td>
                    <td>{{ $item->customer_passport_expire_date ? date('d-m-Y', strtotime($item->customer_passport_expire_date)) : '-' }}
                    </td>
                    <td>{{ $item->customer_visa_date_expiry_0 ? date('d-m-Y', strtotime($item->customer_visa_date_expiry_0)) : '-' }}
                    </td>
                    <td>{{ $item->customer_re_entry }}</td>
                    <td>{{ $item->customer_contact_media }}</td>
                    <td style="width: 10%">
                        <span
                            id="address-show-{{ $key }}">{{ substr($item->customer_address_thailand, 0, 15) }}
                            <a href="#" data-id="{{ $key }}" class="btn-show"
                                id="show-{{ $key }}">Show</a></span>
                        <p style="display: none" id="p-show-{{ $key }}">
                            {{ $item->customer_address_thailand }}
                            <a data-id="{{ $key }}" href="#" class="btn-hide"
                                id="hide-{{ $key }}">Hide</a>
                        </p>
                    </td>
                    <td>{{ $item->customer_email ? : '-' }}</td>
                    <td style="width: 10%">
                        <span id="span-note-show-{{ $key }}">{{ substr($item->customer_note, 0, 15) }}
                            <a href="#" data-id="{{ $key }}" class="btn-show-note"
                                id="a-show-{{ $key }}">Show</a></span>
                        <p style="display: none" id="p-note-show-{{ $key }}">
                            {{ $item->customer_note }}
                            <a data-id="{{ $key }}" href="#" class="btn-hide-note"
                                id="note-hide-{{ $key }}">Hide</a>
                        </p>
                    </td>
                    <td>

                        <a href="{{ route('customer.show', $item->customer_id) }}" class="sads"><i
                                class="fa fa-eye text-dark"></i></a> |
                        <a href="{{ route('customer.edit', $item->customer_id) }}" class=""><i
                                class="fa fa-edit text-primary"></i></a> |
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
</div>



<script>
   $(document).ready(function() {
    $('.table-customer').DataTable({
        searching: false,
    });

  
});



</script>
