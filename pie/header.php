    
    <form class="form-check-inline" action="../controlador/buscador.php" method="GET">
          <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 shadow ">
            <a href="" class="navbar-brand col-sm-3 col-md-2 mr-0 text-info">
            <img src="../imagenes/logo2.ico" alt="" width="30" height="30" title="Bootstrap"> 
            ServiPortex
            </a>
            <input  class="form-control " required
            type="text" name ="buscaMenu" placeholder="Busca por nombre apellido cedula o nota" aria-label="Search" style="margin-right: 10px;">
                <button  type="submit" class="btn btn-info" style="margin: 10px 0px;"  >Buscar</button>
                <a class="btn" href="../modelo/cerrar.php" >
                <img src="../iconos/icons/power.svg" alt="" width="30" height="30" title="Cerrar Sessión"> 
                </a>
            
        </nav>
    </form>