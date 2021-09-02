<?php 
require_once "../../constants/sessionControlAdmin.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "../../constants/head.html"; ?>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/addProduct.css">
    <link id="toast-status" rel="stylesheet" href="../../css/toast-red.css">
    <style>
        #productos-link {
            background-color: #FAB740;
        }
    </style>
    <title>Agregar Productos</title>
</head>

<body>
    <header>
        <?php require_once "../../constants/navbar-admin.html"; ?>
    </header>

    <main>
        <div class="title-indicator"> <span>Eliminar Productos</span> </div>

        <div class="container">
        <table class="highlight centered striped responsive-table">
        <thead>
          <tr>
              <th>#</th>
              <th>CODIGO DEL PRODUCTO DEL PRODUCTO</th>
              <th>NOMBRE DEL PRODUCTO</th>
              <th>PRESENTACION</th>
              <th>PRECIO</th>
          </tr>
        </thead>

        <tbody id="body-table">
         
        </tbody>
      </table>
      </div>
      <div class="container">
            <ul id="pagination" class="pagination">
                
            </ul>
            </div>

    </main>
    <?php require_once "../../constants/footer.html"; ?>
    <script src="../../js/inputs-validation.js"></script>
    <script src="../../js/productos-edit.js"></script>
    <script src="../../js/paginacion.js"></script>
</body>

</html>