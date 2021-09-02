<?php 
$user = PacientData::getById($_GET["id"]);
$lastname = RepreData::getAll();
?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Paciente</h4>
  </div>
  <div class="card-content table-responsive">
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatepacient" role="form">
      <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">N° Clinico*</label>
    <div class="col-md-6">
      <input type="text" name="id" readonly  value="<?php echo $user->id;?>" class="form-control" id="id" placeholder="Número 4 dígitos" pattern="[0-9]{4}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Propietario*</label>
    <div class="col-md-6">
    <select name="lastname" class="form-control">
    <option value="">-- SELECCIONE --</option>      
    <?php foreach($lastname as $las):?>
    <option value="<?php echo $las->id; ?>" <?php if($user->lastname==$las->id){ echo "selected"; }?>><?php echo $las->id." ".$las->name." ".$las->lastname; ?></option>      
    <?php endforeach;?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Sexo*</label>
    <div class="col-md-6">
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox1" name="gender" required <?php if($user->gender=="Macho"){ echo "checked"; }?> value="Macho"> Macho
</label>
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox2" name="gender" required <?php if($user->gender=="Hembra"){ echo "checked"; }?> value="Hembra"> Hembra
</label>

    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento*</label>
    <div class="col-md-6">
      <input type="date" name="day_of_birth" required class="form-control" value="<?php echo $user->day_of_birth; ?>"  id="address1" placeholder="Fecha de Nacimiento">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Especie*</label>
    <div class="col-md-6">
      <input type="text" name="address" required value="<?php echo $user->address;?>" class="form-control" required id="username" placeholder="Especie">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Color*</label>
    <div class="col-md-6">
      <input type="text" name="email" required value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Color">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Raza</label>
    <div class="col-md-6">
      <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Raza">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Enfermedad</label>
    <div class="col-md-6">
      <textarea name="sick" class="form-control" id="sick" placeholder="Enfermedad"><?php echo $user->sick;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Medicamentos</label>
    <div class="col-md-6">
      <textarea name="medicaments" class="form-control" id="sick" placeholder="Medicamentos"><?php echo $user->medicaments;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Alergia</label>
    <div class="col-md-6">
      <textarea name="alergy" class="form-control" id="sick" placeholder="Alergia"><?php echo $user->alergy;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Informacion</label>
    <div class="col-md-6">
      <textarea name="info" class="form-control" id="info" placeholder="Informacion"><?php echo $user->info;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary" onclick="return confirmation()">Actualizar Paciente</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>

<script type="text/javascript">
function confirmation() {
    if(!confirm("Realmente desea Actualizar?")) return false;    
}

</script> 