<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Crear Cargo</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="index.php?c=cargo&a=store">
                    <div class="form-group">
                        <label for="car_nombre">Nombre</label>
                        <input type="text" class="form-control" name="car_nombre" placeholder="Nombre" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label for="car_sueldo">Sueldo</label>
                        <input type="number" class="form-control" name="car_sueldo" placeholder="Sueldo" 
                        data-validation="number">
                    </div>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>