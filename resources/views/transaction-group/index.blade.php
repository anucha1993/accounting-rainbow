@extends('layouts.main')

@section('content')
    <div class="container-fluid page-content">
        <div class="card">
            <div class="card-body">
                <h4>ประเภท รายรับรายจ่าย Transaction Category
                    <a href="{{ route('transactionGroup.create') }}"
                        class="btn btn-success float-end btn-wallet"><i class="fa fa-plus"></i> New Transation Category</a>
                </h4>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <div class="form-group">

                        <table class="table table table-transation-group">
                            <thead>
                                <tr class="text-center">
                                  <th>ประเภทรายรับรายจ่าย <br>Transaction Category</th>
                                    <th>Transaction Type</th>
                                    <th>Active/ Inactive</th>
                                    <th>Control <br></th>
                                </tr>
                            </thead>
                            <tbody id="walletTableBody">
                                @forelse ($transactionGroup as $item)
                                    <tr class="text-center transaction-id" data-id ="{{$item->transaction_group_id}}" id="tr-id-{{$item->transaction_group_id}}">
        
                                        <td class="transation-name">{{ $item->transaction_group_name }}</td>
                                        <td class="transation-type">{{ $item->transaction_group_type }}</td>
                                        <td class="transation-status">{{ $item->transaction_group_status }}</td>
                                        <td>
                                            <a href="{{ route('transactionGroup.edit', $item->transaction_group_id) }}"class="text-info btn-transaction-edit">แก้ไข</a> |
                                            <a href="#" class="text-danger delete-btn" data-id="{{$item->transaction_group_id}}">ลบ</a>
                                        </td>
                                    </tr>
                                @empty
                                    No Data Wallet
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade custom-modal" id="wallet" tabindex="-1" aria-labelledby="vertical-center-modal"
        aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <div class="modal fade" id="transaction-edit" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.table-transation-group').DataTable({
                ordering: false,
                searching: true,
                order: []
            });


            // modal add user
            $(".btn-wallet").click("click", function(e) {
                e.preventDefault();
                $("#wallet")
                    .modal("show")
                    .addClass("modal-lg")
                    .find(".modal-content")
                    .load($(this).attr("href"));
            });




            // modal add user
            $(".btn-transaction-edit").click("click", function(e) {
                e.preventDefault();
                $("#transaction-edit")
                    .modal("show")
                    .addClass("modal-lg")
                    .find(".modal-content")
                    .load($(this).attr("href"));
            });


        });

         // Handle delete action
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete this wallet?')) {
            var row = $(this).closest('tr');
            var walletId = row.attr('data-id');
            console.log(walletId);
            $.ajax({
                url: '{{ route('transactionGroup.delete') }}',
                method: 'POST',
                data: {
                    walletId: walletId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.status === 'success') {
                        row.remove();
                        console.log('Wallet deleted successfully');
                    } else {
                        console.log('Error deleting wallet');
                    }
                },
                error: function(xhr) {
                    console.log('Error deleting wallet');
                }
            });
        }
    });

    </script>
@endsection
