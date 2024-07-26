$(document).ready(function () {
    // modal add user
    $(".btn-addCus").click("click", function (e) {
        e.preventDefault();
        $("#addCus")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });

    //modal Edit customer
    $(".btn-editCus").click("click", function (e) {
        var dataID = $(this).attr("data-id");
        console.log(dataID);
        e.preventDefault();
        $("#editCus")
            .modal("show")
            .addClass("modal-lg")
            .find(".modal-content")
            .load($(this).attr("href"));
    });
});

// show and hide address
$(document).on("click", ".btn-show", function () {
    var dataID = $(this).attr("data-id");

    $("#p-show-" + dataID).show();
    $("#address-show-" + dataID).hide();
});

$(document).on("click", ".btn-hide", function () {
    var dataID = $(this).attr("data-id");
    $("#p-show-" + dataID).hide();
    $("#address-show-" + dataID).show();
});

// show and hide note
$(document).on("click", ".btn-show-note", function () {
    var dataID = $(this).attr("data-id");
    console.log(dataID);
    $("#p-note-show-" + dataID).show();
    $("#span-note-show-" + dataID).hide();
});

$(document).on("click", ".btn-hide-note", function () {
    var dataID = $(this).attr("data-id");
    console.log(dataID);
    $("#p-note-show-" + dataID).hide();
    $("#span-note-show-" + dataID).show();
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

//ลบ Customers
$(document).ready(function () {
    $(".btn-delete-customer").click(function (e) {
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
                    url:
                        CustomerDeleteRoute +
                        "?_token=" +
                        _token +
                        "&dataID=" +
                        dataID,
                    method: "GET",
                    success: function (response) {
                        if (response.success) {
                            // หากการลบสำเร็จ ลบรายการออกจากแบบฟอร์ม
                            $('[data-id="' + dataID + '"]')
                                .closest("tr")
                                .remove();
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
