$(document).ready(function () {
    // Function to handle form submission
    function handleFormSubmit() {
        $("#addTransactionForm")
            .off("submit")
            .on("submit", function (e) {
                e.preventDefault();
                var transactionDate = $("#transaction-date").val();
                var formattedDate = formatDate(transactionDate);
                var transactionType = $("#transaction-type").val();

                var transactionAmount = $("#transaction-amount").val();
                var selectedOption =
                    $("#transaction-group").find("option:selected");
                var transactionGroup = selectedOption.data("transaction");
                var transactionGroupID = selectedOption.val();

                var selectedOptionWallet = $("#transaction-wallet").find(
                    "option:selected"
                );
                var wallet = selectedOptionWallet.data("wallet");
                var walletID = selectedOptionWallet.val();

                console.log(transactionGroupID); // ตรวจสอบว่าดึงค่า transaction group ถูกต้องหรือไม่
                var formattedAmount = parseFloat(
                    transactionAmount
                ).toLocaleString("en-US", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });

                var newRow =
                    '<tr class="text-center" >' +
                    "<td>" +
                    formattedDate +
                    "</td>" +
                    '<input name="transaction_dateNew[]" type="hidden" value="' +
                    transactionDate +
                    '" >' +
                    "<td>" +
                    transactionGroup +
                    "</td>" +
                    '<input name="transaction_groupNew[]" type="hidden" value="' +
                    transactionGroupID +
                    '"  >' +
                    "<td>" +
                    (transactionType === "income" ? formattedAmount : "-") +
                    "</td>" +
                    '<input name="transaction_typeNew[]" type="hidden" value="' +
                    transactionType +
                    '"  >' +
                    "<td>" +
                    (transactionType === "expenses" ? formattedAmount : "-") +
                    "</td>" +
                    '<input name="transaction_amountNew[]" type="hidden" value="' +
                    transactionAmount +
                    '"  >' +
                    "<td>" +
                    wallet +
                    "</td>" +
                    '<input name="transaction_walletNew[]" type="hidden" value="' +
                    walletID +
                    '"  >' +
                    "<td>  NewTransaction " +
                    '<a href="#" class="text-danger delete-btn">  ลบ</a>' +
                    "</td>" +
                    "</tr>";
                $("#transactionTableBody").prepend(newRow);
                //คำนวนหารายรับ รายจ่ายยอดรวม
                var incomeTransactionAmount = 0;
                var expensesTransactionAmount = 0;
                var incomeTransactionAmountNew = 0;
                var expensesTransactionAmountNew = 0;

                $("table tbody tr").each(function () {
                    var transactionAmount = parseFloat(
                        $(this)
                            .find('input[name="transaction_amountEdit[]"]')
                            .val()
                    );
                    var transactionType = $(this)
                        .find('input[name="transaction_typeEdit[]"]')
                        .val(); // ใส่ .val() เพื่อรับค่าจากฟิลด์

                    var transactionAmountNew = parseFloat(
                        $(this)
                            .find('input[name="transaction_amountNew[]"]')
                            .val()
                    );
                    var transactionTypeNew = $(this)
                        .find('input[name="transaction_typeNew[]"]')
                        .val(); // ใส่ .val() เพื่อรับค่าจากฟิลด์

                    if (transactionType === "income") {
                        // เปรียบเทียบค่าเป็น String "income"
                        if (!isNaN(transactionAmount)) {
                            incomeTransactionAmount += transactionAmount;
                        }
                    } else {
                        if (!isNaN(transactionAmount)) {
                            expensesTransactionAmount += transactionAmount;
                        }
                    }

                    if (transactionTypeNew === "income") {
                        // เปรียบเทียบค่าเป็น String "income"
            
                        if (!isNaN(transactionAmountNew)) {
                            incomeTransactionAmountNew += transactionAmountNew;
                        }
                    } else {
                        if (!isNaN(transactionAmountNew)) {
                            expensesTransactionAmountNew +=
                                transactionAmountNew;
                        }
                    }
                });

                incomeAmount = incomeTransactionAmount +  incomeTransactionAmountNew;
                expensesAmount = expensesTransactionAmount +  expensesTransactionAmountNew;

                $("#income").val(incomeAmount);
                $("#expenses").val(expensesAmount);
                $("#profit").val(
                              incomeAmount - expensesAmount
                );

             
                // Clear form inputs
                $("#addTransactionForm")[0].reset();

                $("#add-transaction").modal("hide");
            });
    }

    // Function to handle transaction type change
    function handleTransactionTypeChange() {
        $(".transaction-type")
            .off("change")
            .on("change", function (e) {
                e.preventDefault();
                var type = $(this).val();
                console.log(type);
                if (type === "expenses") {
                    $("#transaction-amount")
                        .addClass("bg-transaction-rg")
                        .removeClass("bg-transaction-sus");
                    $("#transaction-date")
                        .addClass("bg-transaction-rg")
                        .removeClass("bg-transaction-sus");
                    $("#transaction-type")
                        .addClass("bg-transaction-rg")
                        .removeClass("bg-transaction-sus");
                    $("#transaction-wallet")
                        .addClass("bg-transaction-rg")
                        .removeClass("bg-transaction-sus");
                    $("#transaction-group")
                        .addClass("bg-transaction-rg")
                        .removeClass("bg-transaction-sus");
                } else {
                    $("#transaction-amount")
                        .removeClass("bg-transaction-rg")
                        .addClass("bg-transaction-sus");
                    $("#transaction-date")
                        .removeClass("bg-transaction-rg")
                        .addClass("bg-transaction-sus");
                    $("#transaction-type")
                        .removeClass("bg-transaction-rg")
                        .addClass("bg-transaction-sus");
                    $("#transaction-wallet")
                        .removeClass("bg-transaction-rg")
                        .addClass("bg-transaction-sus");
                    $("#transaction-group")
                        .removeClass("bg-transaction-rg")
                        .addClass("bg-transaction-sus");
                }
            });
    }

    // Call the function to bind form submission
    handleFormSubmit();
    handleTransactionTypeChange();

    // Rebind form submission every time the modal is shown
    $("#add-transaction").on("shown.bs.modal", function () {
        handleFormSubmit();
        handleTransactionTypeChange();
    });

    // Remove form submission binding when modal is hidden
    $("#add-transaction").on("hidden.bs.modal", function () {
        $("#addTransactionForm").off("submit");
        $(".transaction-type").off("change");
    });

    function formatDate(dateString) {
        var months = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ];
        var date = new Date(dateString);
        var day = date.getDate();
        var month = months[date.getMonth()];
        var year = date.getFullYear();
        return day + "-" + month + "-" + year;
    }

    $(document).on("click", ".delete-btn", function (e) {
        e.preventDefault();

        if (confirm("Are you sure you want to delete this transaction?")) {
            $(this).closest("tr").remove();

            // คำนวณหารายรับ รายจ่าย และกำไร-ขาดทุน
            var incomeTransactionAmount = 0;
            var expensesTransactionAmount = 0;

            $("table tbody tr").each(function () {
                var transactionAmount = parseFloat(
                    $(this).find('input[name="transaction_amountEdit[]"]').val()
                );
                var transactionType = $(this)
                    .find('input[name="transaction_typeEdit[]"]')
                    .val();

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

            $("#income").val(incomeTransactionAmount);
            $("#expenses").val(expensesTransactionAmount);
            $("#profit").val(
                incomeTransactionAmount - expensesTransactionAmount
            );

            console.log(
                "income :",
                incomeTransactionAmount,
                "expenses :",
                expensesTransactionAmount
            );
        }
    });
});
