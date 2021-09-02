<?php $user = CategoryData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Area Medica</h4>
  </div>
  <div class="card-content table-responsive">


		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecategory" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Detalle*</label>
    <div class="col-md-6">
      <input type="text" name="detail" value="<?php echo $user->detail;?>" class="form-control" id="detail" placeholder="Detalle">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary" onclick="return confirmation()">Actualizar Area Medica</button>
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