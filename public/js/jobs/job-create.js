$(document).ready(function () {
    //services Type

    // $(".job-order-type").on("change", function () {
    //     var service = $(this).val();
    //    // console.log(service);
    //     $.ajax({
    //         url: serviceRouter,
    //         method: "POST",
    //         data: {
    //             _token,
    //             service: service,
    //         },
    //         success: function (response) {
    //             var options =
    //                 '<option value="">' + "Select a " + service + "</option>";
    //             response.forEach(function (services) {
    //                 if (services.service_name !== null) {
    //                     options +=
    //                         '<option value="' +
    //                         services.service_id +
    //                         '">' +
    //                         services.service_name +
    //                         "</option>";
    //                 } else {
    //                     options =
    //                         '<option selected value="" disabled >NULL</option>';
    //                 }
    //             });
    //             $("#service").html(options);
    //         },
    //         error: function (xhr) {
    //             console.log(
    //                 "An error occurred: " + xhr.status + " " + xhr.statusText
    //             );
    //         },
    //     });
    // });

    

    // modal add user
    $(".btn-add-transaction").click("click", function (e) {
        e.preventDefault();
        $("#add-transaction")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });
});


$(document).ready(function () {
    // เรียกใช้ฟังก์ชันเมื่อหน้าเพจถูกโหลดเสร็จ
    loadCustomerData();

    // จับเหตุการณ์เมื่อมีการเปลี่ยนแปลงที่ #customer-id
    $("#customer-id").on("change", function () {
        loadCustomerData();
    });
});


function loadCustomerData() {
    var customer = $("#customer-id").val();
    $.ajax({
        url: customerRoute,
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
            $("#customer-prefix").val(response.customer.customer_prefix);
        },
        error: function (xhr) {
            console.log("Error retrieving customer data");
        },
    });
}


$(document).ready(function () {
    $("#bs-example-modal-xlg").on("shown.bs.modal", function (e) {
        $("#table-modal-customer")
            .DataTable()
            .columns.adjust()
            .responsive.recalc();
    });
});

$(document).ready(function () {
    //Nationality-customer
    $("#customer-id").select2();
});

$(document).ready(function () {
    // modal add user
    $(".btn-wallet").click("click", function (e) {
        e.preventDefault();
        $("#wallet")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });
});

$(document).ready(function () {
    // modal add user
    $(".btn-transaction-group").click("click", function (e) {
        e.preventDefault();
        $("#transaction-group")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });
});
