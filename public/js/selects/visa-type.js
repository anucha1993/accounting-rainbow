$(document).ready(function () {
    $.ajax({
        url: RouteVisaType, // ระบุ URL ของ API ที่จะเรียกข้อมูล
        dataType: "json", // ระบุประเภทข้อมูลที่ต้องการรับคืน
        method: "GET", // ระบุเมธอด HTTP ที่ใช้ในการเรียก API (GET, POST, PUT, หรือ DELETE)
        success: function (data) { // ฟังก์ชันที่เรียกใช้เมื่อการเรียก API สำเร็จ
            // นำข้อมูลที่ได้รับไปประมวลผล
            // สร้าง HTML สำหรับตัวเลือกแต่ละตัว
            var optionsHtml = '<option value="">none</option>';
            data.forEach(function (item) {
                optionsHtml += '<option value="' + item.visa_type_id + '">' + (item.visa_type_name || item.visa_type_name) + '</option>';
            });

            // ใส่ HTML ที่สร้างเข้าไปใน element ที่มี class .visa-type
            $('.visa-type').html(optionsHtml);
        },
        error: function(xhr, status, error) { // ฟังก์ชันที่เรียกใช้เมื่อเกิดข้อผิดพลาดในการเรียก API
            console.error(xhr.responseText);
        }
    });

});