<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel"> Transation  Add</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form action="#" method="post" id="createTransactionForm">
            @csrf
            <div class="row">
                <div class="col-12 md-3">
                    <label for="">ประเภทรายรับรายจ่าย Transaction Category</label>
                    <input type="text" name="transaction_group_name" id="transaction-name"class="form-control" required>
                </div>
                <br>
                <br>
          
                <div class="col-12 md-3">
                    <br>
                    <label for="">Transaction Type </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"
                            id="transaction-type" name="transaction_group_type" value="+" checked>
                        <label class="form-check-label" for="success-outline-radio">+</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"
                            id="stransaction-type" name="transaction_group_type" value="-">
                        <label class="form-check-label" for="success2-outline-radio">-</label>
                    </div>
                </div>
                <div class="col-12 md-3">
                    <label for="">Status </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"
                            id="transaction-status" name="transaction_group_status" value="active" checked>
                        <label class="form-check-label" for="success-outline-radio">active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"
                            id="stransaction-status" name="transaction_group_status" value="inactive">
                        <label class="form-check-label" for="success2-outline-radio">inactive</label>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn  btn-success float-end"> OK</button>
        </form>
    </div>
</div>


<script>
    $('#createTransactionForm').on('submit', function(e) {
        e.preventDefault();

        var transactionName = $('#transaction-name').val();
  
        var transactionStatus =  $('input[name="transaction_group_status"]:checked').val();

        var transactionType = $('input[name="transaction_group_type"]:checked').val();
   



        $.ajax({
            url: '{{ route('transactionGroup.store') }}',
            method: 'POST',
            data: {
                transactionName: transactionName,
                transactionStatus: transactionStatus,
                transactionType: transactionType,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    var newRow = '<tr class="text-center" >' +
                        '<td class="transaction-name">' + response.transactionGroup.transaction_group_name +
                        '</td>' +
                        '<td class="transaction-type">' + response.transactionGroup.transaction_group_type + '</td>' +
                        '<td class="transaction-status">' + response.transactionGroup.transaction_group_status + '</td>' +
                        '<td>' +
                        '<a href="#" class="text-info edit-btn">แก้ไข</a> | ' +
                        '<a href="#" class="text-danger delete-btn">ลบ</a>' +
                        '</td>' +
                        '</tr>';

                    $('#walletTableBody').prepend(newRow);
                    $('#newWalletName').val('');
                } else {
                    console.log('Error adding wallet');
                }
            },
            error: function(xhr) {
                console.log('Error adding wallet');
            }
        });
        $('#wallet').modal('hide');
    });
</script>
