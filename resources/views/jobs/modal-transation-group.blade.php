<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">Table Transation Group</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form id="createTransationForm">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="newTransationGroupName" placeholder="New Transation Group Name" required>
                <button class="btn btn-outline-secondary" type="submit" id="addWalletBtn">Add Transation Group</button>
            </div>
        </form>
        <br>
        <table class="table table table-transation">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Transatio Group Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="TransatiomGroupTableBody">
                @forelse ($transationGroup as $item)
                    <tr>
      
                        <td class="transation-group-id">{{$item->transation_group_id}}</td>
                        <td class="transation-group-name">{{$item->transation_group_name}}</td>
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

    $('.table-transation').DataTable({
        "dom": 'rtip',
        searching: false,
        pageLength: 10,

    });

    // Handle create wallet form submission
    $('#createTransationForm').on('submit', function(e) {
        e.preventDefault();

        var walletName = $('#newTransationGroupName').val();

        $.ajax({
            url: '{{ route('transationGroup.create') }}',
            method: 'POST',
            data: {
                name: walletName,
                _token: '{{ csrf_token() }}'
            },

            success: function(response) {
                if(response.status === 'success') {
                    var newRow = '<tr>' +
                        '<td class="transation-group-id">' + response.transationGroup.transation_group_id + '</td>' +
                        '<td class="transation-group-name">' + response.transationGroup.transation_group_name + '</td>' +
                        '<td>' +
                            '<a href="#" class="text-info edit-btn">แก้ไข</a> | ' +
                            '<a href="#" class="text-danger delete-btn">ลบ</a>' +
                        '</td>' +
                    '</tr>';
                    $('#TransatiomGroupTableBody').append(newRow);
                    $('#newTransationGroupName').val('');
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
        var transationGroupNameCell = row.find('.transation-group-name');

        if ($(this).text() === 'แก้ไข') {
            var currentName = transationGroupNameCell.text();
            transationGroupNameCell.html('<input type="text" class="form-control" value="' + currentName + '">');
            $(this).text('บันทึก');
        } else {
            var newName = transationGroupNameCell.find('input').val();
            var transationGroupId = row.find('.transation-group-id').text();
            console.log(newName);
            $.ajax({
                url: '{{ route('transationGroup.update') }}',
                method: 'POST',
                data: {
                    id: transationGroupId,
                    name: newName,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    transationGroupNameCell.html(newName);
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
            var transationGroupId = row.find('.transation-group-id').text();
            
            $.ajax({
                url: '{{ route('transationGroup.delete') }}',
                method: 'POST',
                data: {
                    id: transationGroupId,
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
