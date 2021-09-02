<?php
$lastname = RepreData::getAll();
?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo Paciente</h4>
  </div>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addpacient" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">N° de Historial Clinico*</label>
    <div class="col-md-6">
      <input type="text" name="id" required class="form-control" id="address1" placeholder="Escriba 4 números" pattern="[0-9]{4}">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Propietario*</label>
    <div class="col-md-6">
    <select name="lastname" class="form-control">
    <option value="">-- SELECCIONE --</option>      
    <?php foreach($lastname as $las):?>
    <option value="<?php echo $las->id; ?>"><?php echo $las->id." ".$las->name." ".$las->lastname; ?></option>      
    <?php endforeach;?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Sexo*</label>
    <div class="col-md-6">
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox1" name="gender" required value="Macho"> Macho
</label>
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox2" name="gender" required value="Hembra"> Hembra
</label>

    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento*</label>
    <div class="col-md-6">
      <input type="date" name="day_of_birth" class="form-control" required id="address1" placeholder="Fecha de Nacimiento">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Especie*</label>
    <div class="col-md-6">
      <input type="text" name="address" required class="form-control"   id="address1" placeholder="Especie animal">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Color*</label>
    <div class="col-md-6">
      <input type="text" name="email" required class="form-control" id="email1" placeholder="Color">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Raza</label>
    <div class="col-md-6">
      <input type="text" name="phone" class="form-control" id="phone1" placeholder="Raza">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Enfermedad</label>
    <div class="col-md-6">
      <textarea name="sick" class="form-control" id="sick" placeholder="Enfermedad"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Medicamentos</label>
    <div class="col-md-6">
      <textarea name="medicaments" class="form-control" id="sick" placeholder="Medicamentos"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Alergia</label>
    <div class="col-md-6">
      <textarea name="alergy" class="form-control" id="sick" placeholder="Alergia"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Información Adicional</label>
    <div class="col-md-6">
      <textarea name="info" class="form-control" id="info" placeholder="Informacion"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Paciente</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>