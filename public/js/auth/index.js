$(document).ready(function () {
    // modal add user
    $(".btn-adduser").click("click", function (e) {
        e.preventDefault();
        $("#addUser")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });
});

$(document).ready(function () {
    //modal edit user
    $(".btn-edituser").click("click", function (e) {
        e.preventDefault();
        //alert('test');
        $("#editUser")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });
});

$(document).ready(function () {
    $(".btn-delete").click(function (e) {
        var _token = $("#_token").val();
        var dataID = $(this).attr("data-id");
        var Fullname = $(this).attr("data-fullname");

        Swal.fire({
            title: "คุณต้องการลบ!!",
            text: Fullname + " ใช่ไหม!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ยืนยัน",
            cancelButtonText: "ยกเลิก",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/auth/delete",
                    method: "POST",
                    data: {
                        _token: _token,
                        dataID: dataID,
                    },
                    success: function (response) {
                        //console.log(response.success);
                        if (response.success) {
                            Swal.fire({
                                title: "ลบข้อมูลสำเร็จ!!",
                                text: response.success,
                                icon: "success",
                            }).then(() => {
                                location.reload(); // รีเฟรชหน้า
                            });
                        } else {
                            Swal.fire({
                                title: "ผิดพลาด!!",
                                text: response.error,
                                icon: "error",
                            }).then(() => {
                                location.reload(); // รีเฟรชหน้า
                            });
                        }
                    },
                });
            }
        });
    });
});
