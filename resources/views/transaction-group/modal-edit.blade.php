<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel"> Transation  Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form action="#" method="post" id="updateTransactionForm">
            @csrf
            <div class="row">
                <div class="col-12 md-3">
                    <label for="">ประเภทรายรับรายจ่าย Transaction Category</label>
                    <input type="text" name="transaction_group_name" id="transaction-name"class="form-control" value="{{$transactionGroupModel->transaction_group_name}}" required>
                    <input type="hidden" name="transaction_group_id" id="transaction-id"class="form-control" value="{{$transactionGroupModel->transaction_group_id}}" required>
                </div>
                <br>
                <br>
          
                <div class="col-12 md-3">
                    <br>
                    <label for="">Transaction Type </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio" @if($transactionGroupModel->transaction_group_type === "+") checked  @endif
                            id="transaction-type" name="transaction_group_type" value="+" >
                        <label class="form-check-label" for="success-outline-radio">+</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio" @if($transactionGroupModel->transaction_group_type === "-") checked  @endif
                            id="stransaction-type" name="transaction_group_type" value="-" >
                        <label class="form-check-label" for="success2-outline-radio">-</label>
                    </div>
                </div>
                <div class="col-12 md-3">
                    <label for="">Status </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"  @if($transactionGroupModel->transaction_group_status === "active") checked  @endif
                            id="transaction-status" name="transaction_group_status" value="active" checked>
                        <label class="form-check-label" for="success-outline-radio">active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input success check-outline outline-success" type="radio"  @if($transactionGroupModel->transaction_group_status === "inactive") checked  @endif
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
    $('#updateTransactionForm').on('submit', function(e) {
        e.preventDefault();

        var transactionName = $('#transaction-name').val();
        var transactionId = $('#transaction-id').val();
  
        var transactionStatus =  $('input[name="transaction_group_status"]:checked').val();

        var transactionType = $('input[name="transaction_group_type"]:checked').val();
   



        $.ajax({
            url: '{{ route('transactionGroup.update') }}',
            method: 'POST',
            data: {
                transactionName: transactionName,
                transactionId: transactionId,
                transactionStatus: transactionStatus,
                transactionType: transactionType,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    var updatedRow = '<td class="transaction-id">' + response.transactionGroupModel.transaction_group_name + '</td>' +
                        '<td class="transaction-type">' + response.transactionGroupModel.transaction_group_type + '</td>' +
                        '<td class="transaction-status">'+ response.transactionGroupModel.transaction_group_status + '</td>' +
                        '<td>' +
                        '<a href="#" class="text-info edit-btn">แก้ไข</a> | ' +
                        '<a href="#" class="text-danger delete-btn">ลบ</a>' +
                        '</td>';

                    $('#tr-id-' + transactionId).html(updatedRow); // แทนที่ข้อมูลใน <tr> ด้วยข้อมูลใหม่ที่ได้รับ
                } else {
                    console.log('Error adding wallet');
                }
            },
            error: function(xhr) {
                console.log('Error adding wallet');
            }
        });
        $('#transaction-edit').modal('hide');
    });
</script>
