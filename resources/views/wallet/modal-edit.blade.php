<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel"> Wallet Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form action="#" method="post" id="updateWalletForm">
            @csrf
            <input type="hidden" name="wallet_type_id" id="walle-id"class="form-control"
                value="{{ $walletModel->wallet_type_id }}" required>
            <div class="row">
                <div class="col-12 md-3">
                    <label for="">บัญชี Account No</label>
                    <input type="text" name="wallet_type_account_no" id="walle-account"class="form-control"
                        value="{{ $walletModel->wallet_type_account_no }}" required>
                </div>
                <div class="col-12 md-3">
                    <label for="">ชื่อเรียก A/C Name</label>
                    <input type="text" name="wallet_type_name" id="walle-name" class="form-control"
                        value="{{ $walletModel->wallet_type_name }}" required>
                </div>
                <div class="col-12 md-3">
                    <label for="">ยอดตั้งต้น Starting balance</label>
                    <input type="number" name="wallet_type_price" id="walle-price" class="form-control"
                        value="{{ $walletModel->wallet_type_price }}" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn  btn-success float-end"> OK</button>
        </form>
    </div>
</div>


<script>
    $('#updateWalletForm').on('submit', function(e) {
        e.preventDefault();

        var walletAccount = $('#walle-account').val();
        var walletName = $('#walle-name').val();
        var walletPrice = $('#walle-price').val();
        var walletId = $('#walle-id').val();

        console.log(walletId);

        $.ajax({
            url: '{{ route('wallet.update') }}',
            method: 'POST',
            data: {
                walletAccount: walletAccount,
                walletName: walletName,
                walletPrice: walletPrice,
                walletId: walletId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    var updatedRow = '<td class="wallet-account">' + response.wallet
                        .wallet_type_account_no + '</td>' +
                        '<td class="wallet-name">' + response.wallet.wallet_type_name + '</td>' +
                        '<td class="wallet-price">' + response.wallet.wallet_type_price + '</td>' +
                        '<td>' +
                        '<a href="#" class="text-info edit-btn">แก้ไข</a> | ' +
                        '<a href="#" class="text-danger delete-btn">ลบ</a>' +
                        '</td>';

                    $('#tr-id-' + walletId).html(
                    updatedRow); // แทนที่ข้อมูลใน <tr> ด้วยข้อมูลใหม่ที่ได้รับ
                } else {
                    console.log('Error adding wallet');
                }
            },
            error: function(xhr) {
                console.log('Error adding wallet');
            }
        });
        $('#wallet-edit').modal('hide');
    });
</script>
