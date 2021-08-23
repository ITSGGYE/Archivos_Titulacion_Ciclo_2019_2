<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo Representante</h4>
  </div>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addrepre" action="index.php?view=addrepre" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cedula*</label>
    <div class="col-md-6">
      <input type="text" name="id"  class="form-control" id="id" placeholder="Cedula(10 digitos numericos)" pattern="[0-9]{10}" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name"  class="form-control" id="name" placeholder="Nombre" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname"  class="form-control" id="lastname" placeholder="Apellido" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
    <div class="col-md-6">
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox1" name="gender" required  value="Masculino"> Masculino
</label>
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox2" name="gender" required  value="Femenino"> Femenino
</label>
</div>
</div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento</label>
    <div class="col-md-6">
      <input type="date" name="day_of_birth" class="form-control"   id="address1" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">E-mail*</label>
    <div class="col-md-6">
      <input type="email" name="email"  class="form-control" id="email" placeholder="Correo Electronico" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address"  class="form-control" id="address" placeholder="Direccion" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="phone" pattern="[0-9]{7,10}" class="form-control" id="phone" placeholder="Movil o Fijo" required> 
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Representante</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>