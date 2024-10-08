@extends('layouts.main')

@section('content')
    <div class="container-fluid page-content">
        <div class="card">
            <div class="card-body">
                <h4>บัญชีกระเป๋ารับเงิน-ถอนเงิน <a href="{{ route('wallet.create') }}"
                        class="btn btn-success float-end btn-wallet"><i class="fa fa-plus"></i> New Wallet</a>
                </h4>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <div class="form-group">

                        <table class="table table table-wallet">
                            <thead>
                                <tr class="text-center">
                                  <th>บัญชี <br> Account No</th>
                                    <th>ชื่อเรียก <br> A/C Name</th>
                                    <th>รายการตั้งต้น <br> Wallet Total</th>
                                    <th>รายการธุรกรรม <br> transaction Wallet</th>
                                    <th>ควบคุม <br>Control</th>
                                </tr>
                            </thead>
                            <tbody id="walletTableBody">
                                @forelse ($wallet as $item)
                                    <tr class="text-center wallet-id" data-id ="{{$item->wallet_type_id}}" id="tr-id-{{$item->wallet_type_id}}">
        
                                        <td class="wallet-account">{{ $item->wallet_type_account_no }}</td>
                                        <td class="wallet-name">{{ $item->wallet_type_name }}</td>
                                        <td class="wallet-price">{{ $item->wallet_type_price }}</td>
                                        <td class="wallet-price"><a href="{{route('wallet.wallettransaction',$item->wallet_type_id)}}"> ตรวสอบธุรกรรม</a></td>
                                        <td>
                                            <a href="{{ route('wallet.edit', $item->wallet_type_id) }}"class="text-info btn-wallet-edit">แก้ไข</a> |
                                            <a href="#" class="text-danger delete-btn">ลบ</a>
                                        </td>
                                    </tr>
                                @empty
                                    No Data Wallet
                                @endforelse
                            </tbody>
                        </table>
                        {!! $quotations->withQueryString()->links('pagination::bootstrap-5') !!}
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

    <div class="modal fade" id="wallet-edit" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.table-wallet').DataTable({
                ordering: false,
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
            $(".btn-wallet-edit").click("click", function(e) {
                e.preventDefault();
                $("#wallet-edit")
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
                url: '{{ route('wallet.delete') }}',
                method: 'POST',
                data: {
                    id: walletId,
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
