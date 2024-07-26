$(document).ready(function () {

    //services Type
    var serviceSelect =   $(".job-order-type").val();

    $(".service").on("click", function (e) {
     $(this).off("click"); 
    service(serviceSelect);
    });

    $(".job-order-type").on("change", function () {
        service($(this).val());
    });
    

    function service(service) {
        $.ajax({
            url: serviceRouter,
            method: "POST",
            data: {
                _token: _token,
                service: service
            },
            success: function (response) {
                var options ;
                response.forEach(function (services) {
                    if (services.service_name !== null) {
                        options += '<option value="' + services.service_id + '">' + services.service_name + '</option>';
                    } else {
                        options = '<option selected value="" disabled>NULL</option>';
                    }
                });
                $('#service').html(options);
            },
            error: function (xhr) {
                console.log("An error occurred: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
    

    $('.btn-re-job').click('click', function (e){
        var JobId = $('#job-id').val();
        console.log(JobId);
        e.preventDefault();
        Swal.fire({
            title: "Do you want to Re Open Job?",
            showCancelButton: true,
            confirmButtonText: "Confirm",
            denyButtonText: `Don't save`
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: reJobouter,
                    method: "POST",
                    data: {
                        JobId: JobId,
                        _token: _token,
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (xhr) {
                        console.log("Error retrieving customer data");
                    },
                });
    
    
              
            } else if (result.isDenied) {
              Swal.fire("Changes are not saved", "", "info");
            }
          });
    });


    
$('.btn-close-job').click('click', function (e){
    var JobId = $('#job-id').val();
    e.preventDefault();
    Swal.fire({
        title: "Do you want to Close  Job?",
        showCancelButton: true,
        confirmButtonText: "Confirm",
        denyButtonText: `Don't save`
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: jobCloseRouter,
                method: "POST",
                data: {
                    JobId: JobId,
                    _token: _token,
                },
                success: function (response) {
                    location.reload();
                },
                error: function (xhr) {
                    console.log("Error retrieving customer data");
                },
            });


          
        } else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });
});

});


$(".btn-add-transaction").click("click", function (e) {
    e.preventDefault();
    $("#add-transaction")
        .modal("show")
        .addClass("modal-lg")
        .find(".modal-content")
        .load($(this).attr("href"));
});

//edit transaction
$(".btn-edit-transaction").click("click", function (e) {
    e.preventDefault();
    $("#edit-transaction")
        .modal("show")
        .addClass("modal-lg")
        .find(".modal-content")
        .load($(this).attr("href"));
});

$(document).ready(function () {
    // เรียกใช้ฟังก์ชันเมื่อหน้าเพจถูกโหลดเสร็จ
    loadCustomerData();

    // จับเหตุการณ์เมื่อมีการเปลี่ยนแปลงที่ #customer-id
    $("#customer-id").on("change", function () {
        loadCustomerData();
    });
});

$(document).ready(function () {
    //Nationality-customer
    $("#customer-id").select2();
});

function loadCustomerData() {
    var customer = $("#customer-id").val();
    $.ajax({
        url: selectCustomerRoute,
        method: "POST",
        data: {
            id: customer,
            _token: _token,
        },
        success: function (response) {
            //console.log(response.customer);
            $("#cusntomer-name").val(response.customer.customer_name);
            $("#cusntomer-passport").val(response.customer.customer_passport);
            $("#cusntomer-contact").val(
                response.customer.customer_tel +
                    " , " +
                    response.customer.customer_contact_media
            );
            $("#cusntomer-nationality").val(response.customer.nationality_name);
            $("#customer-address-th").val(
                response.customer.customer_address_thailand
            );
            $("#customer-email").val(response.customer.customer_email);
        },
        error: function (xhr) {
            console.log("Error retrieving customer data");
        },
    });
}

$(document).on("click", ".delete-btn-row", function (e) {
    e.preventDefault();

    if (confirm("Are you sure you want to delete this transaction?")) {
        $(this).closest("tr").remove();

        //คำนวนหารายรับ รายจ่ายยอดรวม
        var incomeTransactionAmount = 0;
        var expensesTransactionAmount = 0;
        var incomeTransactionAmountNew = 0;
        var expensesTransactionAmountNew = 0;

        $("table tbody tr").each(function () {
            var transactionAmount = parseFloat(
                $(this).find('input[name="transaction_amountEdit[]"]').val()
            );
            var transactionType = $(this)
                .find('input[name="transaction_typeEdit[]"]')
                .val(); // ใส่ .val() เพื่อรับค่าจากฟิลด์

            var transactionAmountNew = parseFloat(
                $(this).find('input[name="transaction_amountNew[]"]').val()
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
                    expensesTransactionAmountNew += transactionAmountNew;
                }
            }
        });

        incomeAmount = incomeTransactionAmount + incomeTransactionAmountNew;
        expensesAmount =
            expensesTransactionAmount + expensesTransactionAmountNew;

        $("#income").val(incomeAmount);
        $("#expenses").val(expensesAmount);
        $("#profit").val(incomeAmount - expensesAmount);
        // console.log(
        //     "income :",
        //     incomeTransactionAmount,
        //     "expenses :",
        //     expensesTransactionAmount
        // );
    }
});
