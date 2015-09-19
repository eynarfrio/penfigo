
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
    $(".fecha-mask").inputmask("yyyy-mm-dd");
    $("[data-mask]").inputmask();
});