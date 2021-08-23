<?php $user = UserData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Usuario</h4>
  </div>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateuser" role="form">



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="password" required placeholder="Contrase&ntilde;a">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="password2" required placeholder="Contrase&ntilde;a">
    </div>
  </div>
  <div class="col-md-6">
      <input type="hidden" name="is_admin"   value="<?php echo $user->is_admin;?>">
    </div>

    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Acceso*</label>
    <div class="col-md-6">
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox1" name="is_active" required <?php if($user->is_active=="1"){ echo "checked"; }?> value="1"> Activo
</label>
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox2" name="is_active" required <?php if($user->is_active=="0"){ echo "checked"; }?> value="0"> Inactivo
</label>
</div>
</div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Importante!!</label>
    <div class="col-md-6">
          Tener en cuenta, que si le quita el acceso a todos los usuarios activos no podra acceder mas al sistema
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary" onclick="return confirmation()">Actualizar Usuario</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
</div>

<script type="text/javascript">
var password, password2;

password = document.getElementById('password');
password2 = document.getElementById('password2');

password.onchange = password2.onkeyup = passwordMatch;

function passwordMatch() {
    if(password.value !== password2.value)
        password2.setCustomValidity('Las contraseñas no coinciden.');
    else
        password2.setCustomValidity('');
}
</script>

<script type="text/javascript">
function confirmation() {
    if(!confirm("Realmente desea Actualizar?")) return false;    
}

</script> 

