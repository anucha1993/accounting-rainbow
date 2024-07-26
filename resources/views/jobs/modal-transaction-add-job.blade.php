<div class="modal-content">
    <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title line" id="myLargeModalLabel">
            Create Transaction Details To Job
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
                    <input type="number" name="transaction_amount" id="transaction-amount" min ="0.01"
                        step="0.01" class="form-control " placeholder="00.00" required>
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

<script>
    $(document).ready(function() {
        var oldRow = $('#tr-id-' + transactionID).html();

        // Function to handle form submission
        function handleFormSubmit() {
            $('#addTransactionForm').off('submit').on('submit', function(e) {
                e.preventDefault();

                var transactionDate = $('#transaction-date').val();
                var formattedDate = formatDate(transactionDate);
                var transactionType = $('#transaction-type').val();

                var transactionAmount = $('#transaction-amount').val();
                var selectedOption = $('#transaction-group').find('option:selected');
                var transactionGroup = selectedOption.data('transaction');
                var transactionGroupID = selectedOption.val();

                var selectedOptionWallet = $('#transaction-wallet').find('option:selected');
                var wallet = selectedOptionWallet.data('wallet');
                var walletID = selectedOptionWallet.val();

                var transactionId = $('#transaction-id').val();
                var jobId = $('#job-id').val();
                var jobNumber = $('#job-number').val();
                var transactionIdInsert;

                var formattedAmount = parseFloat(transactionAmount).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });



                $.ajax({
                    url: '{{ route('joborder.transactionCreate') }}',
                    method: 'POST',
                    data: {
                        jobId: jobId,
                        transactionDate: transactionDate,
                        transactionType: transactionType,
                        transactionId: transactionId,
                        transactionAmount: transactionAmount,
                        transactionGroupID: transactionGroupID,
                        walletID: walletID,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            transactionIdInsert = response.transaction.transaction_id;
                            var editUrl =
                                '{{ route('joborder.transactionEdit', ':transactionIdInsert') }}';
                            editUrl = editUrl.replace(':transactionId',
                                transactionIdInsert);


                            var newRow = '<tr class="text-center"  id="tr-id-'+transactionIdInsert+'" >' +
                                '<td>' + formattedDate + '</td>' +
                                '<input name="transaction_date[]" type="hidden" value="' +
                                transactionDate + '" >' +
                                '<td>' + transactionGroup + '</td>' +
                                '<input name="transaction_group[]" type="hidden" value="' +
                                transactionGroupID +
                                '"  >' +
                                '<td>' + (transactionType === 'income' ? formattedAmount :
                                    '-') + '</td>' +
                                '<input name="transaction_type[]" type="hidden" value="' +
                                transactionType + '"  >' +
                                '<td>' + (transactionType === 'expenses' ? formattedAmount :
                                    '-') + '</td>' +
                                '<input name="transaction_amount[]" type="hidden" value="' +
                                transactionAmount +
                                '"  >' +
                                '<td>' + wallet + '</td>' +
                                '<input name="transaction_wallet[]" type="hidden" value="' +
                                walletID + '"  >' +
                                '<td>' +
                                ' <a href="' + editUrl +
                                '"  class="text-info edit-btn btn-edit-transaction-up"> แก้ไข</a> |' +
                                '<a href="" class="text-danger delete-btn-e"> ลบ</a>' +
                                '</td>';

                            $('#transactionTableBody').prepend(newRow);

                            handleTransactionTypeChange();
                            deleteRow();
                            // modal Edit transaction
                            $(".btn-edit-transaction-up").click("click", function(e) {
                                
                                e.preventDefault();
                                $("#edit-transaction")
                                    .modal("show")
                                    .addClass("modal-lg")
                                    .find(".modal-content")
                                    .load($(this).attr("href"));
                            });



                        } else {
                            console.log('Error Edit transaction');
                        }
                    },
                    error: function(xhr) {
                        console.log('Error adding transaction');
                    }
                });




                //คำนวนหารายรับ รายจ่ายยอดรวม
                var incomeTransactionAmount = 0;
                var expensesTransactionAmount = 0;

                $('table tbody tr').each(function() {
                    var transactionAmount = parseFloat($(this).find(
                        'input[name="transaction_amount[]"]').val());
                    var transactionType = $(this).find('input[name="transaction_type[]"]')
                        .val(); // ใส่ .val() เพื่อรับค่าจากฟิลด์

                    if (transactionType === "income") { // เปรียบเทียบค่าเป็น String "income"
                        if (!isNaN(transactionAmount)) {
                            incomeTransactionAmount += transactionAmount;
                        }
                    } else {
                        if (!isNaN(transactionAmount)) {
                            expensesTransactionAmount += transactionAmount;
                        }
                    }
                });

                $('#income').val(incomeTransactionAmount);
                $('#expenses').val(expensesTransactionAmount);
                $('#profit').val(incomeTransactionAmount - expensesTransactionAmount);

                console.log('income :', incomeTransactionAmount, 'expenses :',
                    expensesTransactionAmount);

                // Clear form inputs
                $('#addTransactionForm')[0].reset();

                $('#add-transaction').modal('hide');
            });




        }






        // Function to handle transaction type change
        function handleTransactionTypeChange() {
            $(".transaction-type").off('change').on("change", function(e) {
                e.preventDefault();
                var type = $(this).val();
                console.log(type);
                if (type === 'expenses') {
                    $("#transaction-amount").addClass("bg-transaction-rg").removeClass(
                        "bg-transaction-sus");
                    $("#transaction-date").addClass("bg-transaction-rg").removeClass(
                        "bg-transaction-sus");
                    $("#transaction-type").addClass("bg-transaction-rg").removeClass(
                        "bg-transaction-sus");
                    $("#transaction-wallet").addClass("bg-transaction-rg").removeClass(
                        "bg-transaction-sus");
                    $("#transaction-group").addClass("bg-transaction-rg").removeClass(
                        "bg-transaction-sus");
                } else {
                    $("#transaction-amount").removeClass("bg-transaction-rg").addClass(
                        "bg-transaction-sus");
                    $("#transaction-date").removeClass("bg-transaction-rg").addClass(
                        "bg-transaction-sus");
                    $("#transaction-type").removeClass("bg-transaction-rg").addClass(
                        "bg-transaction-sus");
                    $("#transaction-wallet").removeClass("bg-transaction-rg").addClass(
                        "bg-transaction-sus");
                    $("#transaction-group").removeClass("bg-transaction-rg").addClass(
                        "bg-transaction-sus");
                }
            });
        }


        // Call the function to bind form submission
        handleFormSubmit();
        handleTransactionTypeChange();

        // Rebind form submission every time the modal is shown
        $('#add-transaction').on('shown.bs.modal', function() {
            handleFormSubmit();
            handleTransactionTypeChange();
        });

        // Remove form submission binding when modal is hidden
        $('#add-transaction').on('hidden.bs.modal', function() {
            $('#addTransactionForm').off('submit');
            $(".transaction-type").off('change');
        });




        function formatDate(dateString) {
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var date = new Date(dateString);
            var day = date.getDate();
            var month = months[date.getMonth()];
            var year = date.getFullYear();
            return day + '-' + month + '-' + year;
        }



        $(document).on('click', '.delete-btn-e', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this transaction?')) {
                deleteRow(this);
            }
        });

        function deleteRow(btn) {
            $(btn).closest('tr').remove();

            // คำนวณหารายรับ รายจ่าย และกำไร-ขาดทุน
            var incomeTransactionAmount = 0;
            var expensesTransactionAmount = 0;

            $('table tbody tr').each(function() {
                var transactionAmount = parseFloat($(this).find('input[name="transaction_amount[]"]')
                    .val());
                var transactionType = $(this).find('input[name="transaction_type[]"]').val();

                if (transactionType === "income") {
                    if (!isNaN(transactionAmount)) {
                        incomeTransactionAmount += transactionAmount;
                    }
                } else {
                    if (!isNaN(transactionAmount)) {
                        expensesTransactionAmount += transactionAmount;
                    }
                }
            });

            $('#income').val(incomeTransactionAmount);
            $('#expenses').val(expensesTransactionAmount);
            $('#profit').val(incomeTransactionAmount - expensesTransactionAmount);

            console.log('income :', incomeTransactionAmount, 'expenses :', expensesTransactionAmount);
        }



    });
</script>
