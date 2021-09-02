<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Crear Pedido</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="index.php?c=pedido&a=store">
                    <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control" id='cli_id' name='cli_id'>
                            <?php foreach ($clientes as $item) : ?>
                                <option value="<?php $item->cli_nombre ?>"><?php $item->cli_nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pe_fecha">Fecha</label>
                        <input type="text" data-mask="99-99-9999"  class="form-control" name="pe_fecha" placeholder="Fecha" data-toggle="datepicker">
                    </div>
                    <div class="form-group">
                        <label for="pe_cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="pe_cantidad" placeholder="Cantidad">
                    </div>
                    <div class="form-group">
                        <label for="pe_precio">Precio</label>
                        <input type="number" class="form-control" name="pe_precio" placeholder="Precio">
                    </div>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>