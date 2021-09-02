<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Editar Pedido</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="index.php?c=pedidosdetalle&a=update" id="form_data">
                    <input type="hidden" name="pe_id" value="<?php echo $datos->pe_id; ?>" />
                    <input type="hidden" name="fechaAnterior" value="<?php echo $datos->pe_fecha; ?>" />
                    <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control" id='cli_id' name='cli_id'>
                            <?php foreach ($clientes as $item) : ?>
                                <option value="<?php echo $item->cli_id; ?>" <?php echo $item->cli_id == $datos->cli_id  ? "selected" : ""; ?>>
                                    <?php echo $item->cli_nombre; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pe_fecha">Fecha</label>
                        <input type="text" class="form-control" name="pe_fecha" placeholder="Fecha" 
                        data-mask="99-99-9999" id="pe_fecha" value="<?php echo $datos->pe_fecha; ?>" data-toggle="datepicker"  data-validation="date" data-validation-format="dd-mm-yyyy" >
                    </div>
                    <div class="form-group">
                        <label for="pe_cantidad">Cantidad</label>
                        <input type="number" class="form-control" id="pe_cantidad" name="pe_cantidad" 
                        value=<?php echo $datos->pe_cantidad; ?> placeholder="Cantidad" data-validation="number">
                    </div>
                    <div class="form-group">
                        <label for="pe_precio">Precio</label>
                        <input type="text" class="form-control" id="pe_precio" name="pe_precio" 
                        value=<?php echo $datos->pe_precio; ?> placeholder="Precio"  data-validation="number" data-validation-allowing="float" data-validation-decimal-separator=".">
                    </div>
                    <div class="form-group">
                        <label for="pe_precio">Masas</label>
                        <input type="text" readonly="" class="form-control" id="pe_masas" 
                        name="pe_masas" value=<?php echo $datos->pe_masas; ?> placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary" >Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>
