$(function () {
    $('#frmLogin').validate(validation('#frmLogin'));

});

function validation(frm) {
    return {
        onkeyup: false,
        onclick: false,
        errorClass: 'text-danger',
        errorElement: 'small',
        rules: {
            'username':{
                required:true,
            },
            'password':{
                required:true,
            },
        },
        messages: {
            'username':{
                required: 'Tài khoản là bắt buộc',
            },
            'password':{
                required: 'Mật khẩu là bắt buộc',
            }
        },
        submitHandler: function (form) {

            $.ajax({
                url: loginConstants.loginUrl,
                method: 'POST',
                data: $(frm).serialize(),
                success:function (response) {
                  _flashUtils.message(response.success,response.message);
                    if(response.success){
                        window.location.href='/';
                    }
                }
            })
        }
    }
}
