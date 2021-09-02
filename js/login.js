$(".preloader-wrapper").hide();
document.getElementById('usuario').focus();
$(document).ready(function() {
    $(document).on('submit', '#formulario', function(event) {
        $(".preloader-wrapper").show();
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "controller/ClassLoginC.php",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            success: function(r) {
                if (r == 1) {
                    $(".preloader-wrapper").hide();
                    $('#toast-status').attr('href', './css/toast-green.css');
                    var toastHTML = '<span id="toast">Login Correcto</span>';
                    M.toast({ html: toastHTML, classes: 'rounded' });
                    window.location = 'constants/sessionControl.php';
                } else {
                    $(".preloader-wrapper").hide();
                    if (r == 2) {
                        $('#toast-status').attr('href', './css/toast-red.css');
                        var toastHTML = "<span id='toast'>Complete el Formulario</span>";
                        M.toast({ html: toastHTML, classes: 'rounded' });
                        $('#usuario').focus();
                    } else {
                        $(".preloader-wrapper").hide();
                        $('#toast-status').attr('href', './css/toast-red.css');
                        var toastHTML = "<span id='toast'>Error inesperado</span>";
                        M.toast({ html: toastHTML, classes: 'rounded' });
                        $('#usuario').focus();

                    }
                }
            }
        })
    });
});