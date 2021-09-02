<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Cambiar Password</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="index.php?c=usuario&a=UpdatePassword">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Password Actual</label>
                                <input type="text" class="form-control" name="password_actual" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="pass_confirmation" data-validation="length" data-validation-length="min6">
                            </div>
                            <div class="form-group">
                                <label for="">Confirmacion Password</label>
                                <input type="text" class="form-control" name="pass" data-validation="confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Aceptar</button>
                            <br><br>

                            <div style="color:red">
                                <?php
                                if (isset($_REQUEST["validacion"])) {
                                    echo $_REQUEST["validacion"];
                                    echo "<br>";
                                }
                                ?>
                            </div>

                        </div>


                </form>

            </div>
        </div>
    </div>
</div>