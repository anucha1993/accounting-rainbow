


$(document).ready(function () {
    // modal add user
    $(".ninety-edit").click("click", function (e) {
        e.preventDefault();
        $("#ninetyEdit")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });
});

//ลบ Ninety days
$(document).ready(function () {
    $(".btn-delete-ninety").click(function (e) {
        var dataID = $(this).attr("data-id");
        console.log(dataID);
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: RouteDeleteNinety,
                    method: "GET",
                    data: {
                        _token: _token,
                        dataID: dataID,
                    },
                    success: function (response) {
                        if (response.success) {
                            // หากการลบสำเร็จ ลบรายการออกจากแบบฟอร์ม
                            $('[data-id="' + dataID + '"]').closest('tr').remove();
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                            });
                        }
                    },
                });
            }
        });
    });
});


// Visa 
$(document).ready(function () {
    // modal add user
    $(".visa-edit").click("click", function (e) {
        e.preventDefault();
        $("#visaEdit")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });
});


//ลบ Visa Renew
$(document).ready(function () {
    $(".btn-delete-visa").click(function (e) {
        var dataID = $(this).attr("data-id");
        console.log(dataID);
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: RouteDeletevisaRenew,
                    method: "GET",
                    data: {
                        _token: _token,
                        dataID: dataID,
                    },
                    success: function (response) {
                        if (response.success) {
                            // หากการลบสำเร็จ ลบรายการออกจากแบบฟอร์ม
                            $('[data-id="' + dataID + '"]').closest('tr').remove();
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                            });
                        }
                    },
                });
            }
        });
    });
});