<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #222c3c; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #222c3c, #222c3c);
  background: -moz-linear-gradient(right, #222c3c, #222c3c);
  background: -o-linear-gradient(right, #222c3c, #222c3c);
  background: linear-gradient(to left, #222c3c, #222c3c);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>

<div class="login-page">
  <div class="form">
  <img height="130pem" width="130em" class="center col-1" src="assets/img/logo.jpeg"> 

  <h5 class="center">PANIFICADORA PAN ARABE OMAR</h5>
  <br>
    <form class="login-form"  method="post" action="?c=login&a=VerificarUsuario">
      <input type="text" placeholder="Usuario" name="usu_usuario"/>
      <input type="password" placeholder="Password" name="usu_password"/>
      <button>Iniciar Sesion</button>
    </form>
  </div>
</div></div>
<!-- start js include path -->

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/popper/popper.min.js"></script>
<script src=" assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery-validation/js/additional-methods.min.js" ></script>
<!-- bootstrap -->
<script src=" assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker-init.js"></script>
<script src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js"></script>
<!-- steps -->
<script src="assets/plugins/steps/jquery.steps.js"></script>
<script src="assets/js/pages/steps/steps-data.js"></script>
<!-- data tables -->
<script src=" assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/pages/table/table_data.js"></script>
<!-- Common js-->
<script src="assets/js/app.js"></script>
<script src="assets/js/layout.js"></script>
<script src="assets/js/theme-color.js"></script>
<!-- Material -->
<script src="assets/plugins/material/material.min.js"></script>
<!-- animation -->
<script src="assets/js/pages/ui/animations.js"></script>
<!-- dropzone -->
<script src="assets/plugins/dropzone/dropzone.js"></script>
<!--tags input-->
<script src="assets/plugins/jquery-tags-input/jquery-tags-input.js"></script>
<script src="assets/plugins/jquery-tags-input/jquery-tags-input-init.js"></script>
<!--select2-->
<script src="assets/plugins/select2/js/select2.js"></script>
<script src="assets/js/pages/select2/select2-init.js"></script>
<script src="assets/datepicker/datepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<!-- end js include path -->


<script>
  $.validate({
    lang: 'es',
    modules : 'security'
  });
</script>


</body></html>



