document.addEventListener("DOMContentLoaded", function () {
    // เลือกฟอร์ม
    var form = document.getElementById("searchForm");

    // จับการกดปุ่ม Submit
    form.addEventListener("submit", function (event) {
        // ป้องกันการส่งฟอร์ม
        event.preventDefault();
        // ส่งข้อมูลผ่าน AJAX
        searchCustomer();
    });

    
    function searchCustomer() {
        var rangDate = $("#rangDate").val();
        var JobStatus = $("#job-status").val();

        var startDate, endDate;
        if (rangDate) {
            var dates = rangDate.split(" - ");
            startDate = formatDate(dates[0].trim()); // ตัดช่องว่างด้านหน้าและด้านหลังของวันที่
            endDate = formatDate(dates[1].trim()); // ตัดช่องว่างด้านหน้าและด้านหลังของวันที่
        }

        function formatDate(dateString) {
            var parts = dateString.split("/");
            return parts[2] + "-" + parts[1] + "-" + parts[0];
        }

        var Nationality = $("#Nationality").val();
        var visaType = $("#visaType").val();
        var Name = $("#name").val();
        var channel = $("#channel").val();
        var passport = $("#passport").val();

        // โหลดเนื้อหาของไฟล์ฟอร์มและแสดงใน DOM
        $.ajax({
            url: tableIndex,
            type: "GET",
            data: {
                receipt: receipt,
                passport: passport,
                channel: channel,
                Nationality: Nationality,
                Name: Name,
                JobStatus: JobStatus,
                startDate: startDate,
                endDate: endDate,
            },
            success: function (response) {
                $("#tableContainer").html(response);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    }
    // จับ event ปุ่ม Search
    $("#btnSearch").click(function (event) {
        event.preventDefault();
        searchCustomer();
    });
    $.ajax({
        url: tableIndex,
        type: "GET",

        success: function (response) {
            $("#tableContainer").html(response);
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
});
// daterangepicker
$(function () {
    $(".rangDate").daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: "DD/MM/YYYY",
        },
    });

    $(".rangDate").on("apply.daterangepicker", function (ev, picker) {
        $(this).val(
            picker.startDate.format("DD/MM/YYYY") +
                " - " +
                picker.endDate.format("DD/MM/YYYY")
        );
    });

    $(".rangDate").on("cancel.daterangepicker", function (ev, picker) {
        $(this).val("");
    });
});
