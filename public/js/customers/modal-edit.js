



$(document).ready(function () {
    $(".Nationality").select2({
        dropdownParent: $("#editCus"),
    });

    $(document).on("change", ".visa-type-edit", function () {
        var visaType = $(this).find("option:selected").attr("data-renew");
        var visaName = $(this).find("option:selected").attr("data-name");

        console.log(visaType);

        if (visaType === "Y") {
            $(".visa-type-date").css("display", "block");
            $("#visa-type-start").html("Visa " + visaName + " Date Start");
            $("#visa-type-end").html("Visa " + visaName + " Date Expiry");
        } else {
            $(".visa-type-date").css("display", "none");
        }
    });
});

$(document).ready(function () {
    var visaType = $(".visa-type-edit")
        .find("option:selected")
        .attr("data-renew");
    var visaName = $(".visa-type-edit")
        .find("option:selected")
        .attr("data-name");

    console.log(visaType);

    if (visaType === "Y") {
        $(".visa-type-date").css("display", "block");
        $("#visa-type-start").html("Visa " + visaName + " Date Start");
        $("#visa-type-end").html("Visa " + visaName + " Date Expiry");
    } else {
        $(".visa-type-date").css("display", "none");
    }
});

$(document).ready(function () {
    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        var dataName = $(this).attr("data-name");
        var dataID = $(this).attr("data-id");
        var dataCustomer = $(this).attr("data-customer");

        Swal.fire({
            title: "ต้องการลบ ",
            text: dataName + dataID,
            showDenyButton: true,
            confirmButtonText: "ใช่",
            denyButtonText: "ไม่ใช่",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: RouteDeleteFile,
                    method: "GET",
                    data: {
                        _token: _token,
                        dataID: dataID,
                        dataCustomer: dataCustomer,
                        dataName: dataName,
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire("ลบข้อมูลสำรเร็จ!", "", "success");
                            // อัปเดตข้อมูลในส่วนของหน้าที่ต้องการโดยใช้ข้อมูลใหม่ที่ได้จากการลบไฟล์
                            var filesHtml = "";
                            response.files.forEach(function (item) {
                                filesHtml += '<li class="list-group-item">';
                                filesHtml +=
                                    '<i data-feather="box" class="text-info feather-sm me-2 fas far fa-file text-danger"></i>';
                                filesHtml +=
                                    '<a href="' +
                                    assetURL +
                                    item.customer_file_url +
                                    '" target="_blank" class="text-black">' +
                                    item.customer_file_name +
                                    "</a>";
                                filesHtml +=
                                    '<a href="#" class="text-black float-end btn-delete" data-customer="' +
                                    item.customer_file_customer_id +
                                    '" data-id="' +
                                    item.customer_file_id +
                                    '" data-name="' +
                                    item.customer_file_name +
                                    '"><i class="fas fa-trash text-danger"></i></a>';
                                filesHtml +=
                                    '<a href="' +
                                    assetURL +
                                    item.customer_file_url +
                                    '" target="_blank" class="text-black float-end"><i class="fas fa-eye text-info"></i> &nbsp; &nbsp; &nbsp;&nbsp; </a>';
                                filesHtml += "<br></li>";
                            });
                            $(".data-container").html(filesHtml);
                        } else {
                            Swal.fire(
                                "ลบข้อมูลไม่สำเร็จกรุณาลองใหม่อีกครั้ง!",
                                "",
                                "error"
                            );
                        }
                    },
                });
            } else if (result.isDenied) {
                Swal.fire("ยกเลิกการลบสำเร็จ!");
            }
        });
    });
});
