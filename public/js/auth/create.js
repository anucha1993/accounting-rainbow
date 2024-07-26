//check password
$(document).ready(function () {
    $(".password,.password-confirm").on("change", function () {
        var password = $(".password").val();
        var passwordComfirm = $(".password-confirm").val();

        if (passwordComfirm) {
            if (password === passwordComfirm) {
            } else {
                $(".password-confirm").val('');
                alert("รหัสผ่านคุณไม่ตรงกัน กรุณาตรวสอบและลองใหม่อีกครั้ง");
            }
        }
    });
});
//  show Reset password

$(document).ready(function() {
    // เมื่อ checkbox ถูกเปลี่ยนแปลง
    $("#showPassword").change(function() {
        // ตรวจสอบว่า checkbox ถูกเลือกหรือไม่
        if ($(this).prop('checked')) {
           $('.col-password').css('display', 'block');
           $('.col-password-confirm').css('display', 'block');
           $('.password').prop('disabled', false);
           $('.password-confirm').prop('disabled', false);
        }else {
            $('.col-password').css('display', 'none');
            $('.col-password-confirm').css('display', 'none');
            $('.password').prop('disabled', true);
            $('.password-confirm').prop('disabled', true);
        }
    });
});

