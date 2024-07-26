<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">
            Create Transaction Details
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="addTransactionForm" class="addTransactionForm">

            <div class="form-group row  md-3">
                <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label">Account type : </label>
                <div class="col-sm-9">
                    <select name="transaction_type" id="transaction-type" class="form-select transaction-type" required>
                        <option value="" disabled selected>None</option>
                        <option value="income">รายรับ</option>
                        <option value="expenses">รายจ่าย</option>
                    </select>

                </div>
            </div>

            <br>

            <div class="form-group row md-3">
                <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label">transaction Date : </label>
                <div class="col-sm-9">
                    <input type="Date" name="transaction_date" id="transaction-date" class="form-control" required
                        value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <br>

            <div class="form-group row  md-3">
                <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label">transaction : </label>
                <div class="col-sm-9">
                    <select name="transaction_group" id="transaction-group" class="form-select" required>
                        <option value="">None</option>
                        @forelse ($transactionGroup as $item)
                            <option data-transaction="{{ $item->transaction_group_name }}"
                                value="{{ $item->transaction_group_id }}">{{ $item->transaction_group_name }}</option>
                        @empty
                            No Data
                        @endforelse
                    </select>

                </div>
            </div>
            <br>



            <div class="form-group row  md-3">
                <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label">บัญชีกระเป๋าเงิน-ถอนเงิน : </label>
                <div class="col-sm-9">
                    <select name="transaction_wallet" id="transaction-wallet" class="form-select" required>
                        <option value="">None</option>
                        @forelse ($walletType as $item)
                            <option data-wallet="{{ $item->wallet_type_name }}" value="{{ $item->wallet_type_id }}">
                                {{ $item->wallet_type_name }}</option>
                        @empty
                            No Data
                        @endforelse
                    </select>

                </div>


            </div>


            <br>
            <div class="form-group row md-3">
                <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label">ยอด : </label>
                <div class="col-sm-9">
                    <input type="number" name="transaction_amount" id="transaction-amount" min ="0.01" step="0.01" class="form-control "
                        placeholder="00.00" required>
                </div>
            </div>
            <br>


            <br>
            <button type="submit" class="btn btn-success float-end me-3">OK</button>

        </form>
    </div>

</div>


<style>
    .bg-transaction-rg {
        background-color: rgba(255, 165, 81, 0.377);

    }

    .bg-transaction-sus {
        background-color: rgba(76, 150, 74, 0.534)
    }
</style>

<script src="{{URL::asset('js/jobs/modal-transaction-create.js')}}"></script>

