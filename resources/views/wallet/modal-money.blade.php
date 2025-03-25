<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">โอน-ถอนเงิน</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <form action="{{route('wallet.transfer',$walletModel->wallet_type_id)}}" method="post" id="updateWalletForm">
            @csrf
            <input type="hidden" id="walle-id" class="form-control" name="wallet_type_id" value="{{ $walletModel->wallet_type_id }}">
            <div class="row">
                <div class="col-12 mb-2">
                    <label for="">บัญชี Account No</label>
                    <input type="text" name="wallet_type_account_no" id="walle-account"class="form-control"
                        value="{{ $walletModel->wallet_type_account_no }}" disabled>
                </div>
                

                <div class="col-12 mb-2">
                    <label for="">จำนวนเงิน</label>
                    <input type="hidden" name="wallet_type_price" class="form-control transfer-price" value="{{$walletModel->wallet_type_price}}" disabled>
                    <input type="text" name="wallet_type_price" class="form-control transfer-price-calculate" value="{{$walletModel->wallet_type_price}}" disabled>
                </div>

                <div class="col-md-12 mb-2">
                    <label>ประเภท</label>
                    <select name="transfer_type" id="" class="form-select">
                        <option value="โอนเงิน">โอนเงิน</option>
                        <option value="ถอนเงิน">ถอนเงิน</option>
                    </select>
                </div>

                <div class="col-md-12 mb-2">
                    <label for="">จำนวนเงิน</label>
                    <input type="number" name="transfer_price"  class="form-control transfer-total" placeholder="00.0" required>
                </div>

                <div class="col-md-12 mb-2">
                    <label>มายัง บัญชี</label>
                    <select name="wallet_transfer" id="" class="form-select transfer" required>
                        <option value="">--กรุณาเลือก--</option>
                        @foreach ($listWallets as $item)
                            @if ($item->wallet_type_id !== $walletModel->wallet_type_id)
                                <option data-transfer="{{ $item->wallet_type_price }}"
                                    value="{{ $item->wallet_type_id }}">{{ $item->wallet_type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-2">
                    <label>เงินในบัญชี</label>
                    <input type="hidden" class="form-control transfer-new" value="0.00" step="0.01" min="0.01" readonly>
                    <input type="number" class="form-control transfer-new-total" value="0.00" step="0.01" min="0.01" readonly>
                </div>



            </div>
            <br>
            <button type="submit" class="btn  btn-success float-end"> OK</button>
        </form>
    </div>
</div>


<script>
 $(document).ready(function() {
  $(document).on('change', '.transfer', function(event) {
    var selectedOption = $(this).find('option:selected');
    var transfer = selectedOption.data('transfer');
    $('.transfer-new').val(transfer);
    calculateBalances(); // เรียกฟังก์ชันคำนวณยอดเงิน
  });

  $('#updateWalletForm').on('submit', function(event) {
    var transferPrice = parseFloat($('.transfer-price').val());
    var inputPrice = parseFloat($('input[name="transfer_price"]').val());

    if (transferPrice <= inputPrice) {
      event.preventDefault();
      alert('จำนวนเงินในบัญชีต้องมากกว่าจำนวนเงินที่โอน/ถอน');
    }
  });

  $('.transfer-total').on('change', function() {
    calculateBalances(); // เรียกฟังก์ชันคำนวณยอดเงิน
  });

  function calculateBalances() {
    var currentBalance = parseFloat($('.transfer-price').val());
    var wallettBalance = parseFloat($('.transfer-new').val());
    var amount = parseFloat($('.transfer-total').val()) || 0; // ใช้ 0 ถ้าไม่มีค่า

    var oldBalance = currentBalance - amount;
    var newBalance = wallettBalance + amount;

    $('.transfer-price-calculate').val(oldBalance);
    $('.transfer-new-total').val(newBalance);
  }
});
</script>
