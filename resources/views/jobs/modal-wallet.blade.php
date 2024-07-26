<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">Table Wallet</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form id="createWalletForm">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="newWalletName" placeholder="New Wallet Name" required>
                <button class="btn btn-outline-secondary" type="submit" id="addWalletBtn">Add Wallet</button>
            </div>
        </form>
        <br>
        <table class="table table table-wallet">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Wallet Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="walletTableBody">
                @forelse ($wallet as $item)
                    <tr>
                        <td class="wallet-id">{{$item->wallet_type_id}}</td>
                        <td class="wallet-name">{{$item->wallet_type_name}}</td>
                        <td>
                            <a href="#" class="text-info edit-btn">แก้ไข</a> |
                            <a href="#" class="text-danger delete-btn">ลบ</a>
                        </td>
                    </tr>
                @empty
                    No Data Wallet
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {

    $('.table-wallet').DataTable({
        "dom": 'rtip',
        searching: false,
        pageLength: 10,

    });

    // Handle create wallet form submission
    $('#createWalletForm').on('submit', function(e) {
        e.preventDefault();

        var walletName = $('#newWalletName').val();

        $.ajax({
            url: '{{ route('wallet.create') }}',
            method: 'POST',
            data: {
                name: walletName,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.status === 'success') {
                    var newRow = '<tr>' +
                        '<td class="wallet-id">' + response.wallet.wallet_type_id + '</td>' +
                        '<td class="wallet-name">' + response.wallet.wallet_type_name + '</td>' +
                        '<td>' +
                            '<a href="#" class="text-info edit-btn">แก้ไข</a> | ' +
                            '<a href="#" class="text-danger delete-btn">ลบ</a>' +
                        '</td>' +
                    '</tr>';
                    $('#walletTableBody').append(newRow);
                    $('#newWalletName').val('');
                } else {
                    console.log('Error adding wallet');
                }
            },
            error: function(xhr) {
                console.log('Error adding wallet');
            }
        });
    });

    // Handle edit action
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var walletNameCell = row.find('.wallet-name');

        if ($(this).text() === 'แก้ไข') {
            var currentName = walletNameCell.text();
            walletNameCell.html('<input type="text" class="form-control" value="' + currentName + '">');
            $(this).text('บันทึก');
        } else {
            var newName = walletNameCell.find('input').val();
            var walletId = row.find('.wallet-id').text();

            $.ajax({
                url: '{{ route('wallet.update') }}',
                method: 'POST',
                data: {
                    id: walletId,
                    name: newName,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    walletNameCell.html(newName);
                    $(this).text('แก้ไข');
                }.bind(this),
                error: function(xhr) {
                    console.log('Error updating wallet name');
                }
            });
        }
    });

    // Handle delete action
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete this wallet?')) {
            var row = $(this).closest('tr');
            var walletId = row.find('.wallet-id').text();

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
});
</script>
