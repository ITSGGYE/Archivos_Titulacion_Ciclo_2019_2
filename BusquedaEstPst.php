<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');
require_once '../appws/clases/conexion.php';

class BusquedaEstPst
{
    private $objConexion;
    private $conexion;

    public function __construct()
    {
        $this->objConexion = new conexion();
        $this->conexion = $this->objConexion->getConexion();
    }

    public function getPstCedula($argCedula){
        try {
            $query = "SELECT * FROM titulacion_6to_c.tb_registro_pasante WHERE pst_cedula LIKE :CEDULA";
            $cedula = "%".$argCedula."%";
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt = $this->conexion->prepare($query);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt->bindParam(":CEDULA",$cedula,PDO::PARAM_STR,10);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            if (isset($stmt)){
                if ($stmt->execute()){

                    $cadena="";
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $row){

                        $img = $row["pst_id"];


                          $cadena = $cadena ."<tr>
                        <td scope='row'>".$row['pst_cedula']."</td>
                        <td scope='row'>".$row['pst_nombres']."</td>
                        <td scope='row'>".$row['pst_apellidos']."</td>
                        <td scope='row'>".$row['pst_celular']."</td>
                        <td scope='row'>".$row['pst_correo']."</td>
                        <td scope='row'>".$row['pst_convencional']."></td>
                        <td scope='row'>".$row['pst_direccion']."</td>
                        <td scope='row'>".$row['pst_fecha_nacimiento']."</td>
                        <td scope='row'>".$row['pst_edad']."</td>
                        <td scope='row'>".$row['pst_enfermedad']."</td>
                        <td scope='row'>".$row['pst_alergias']."</td>
                        <td scope='row'>".$row['pst_tipo_sangre']."</td>
                        <td scope='row'>".$row['pst_genero']."</td>
                        <td scope='row'>".$row['pst_curso']."</td>
                        <td scope='row'>".$row['pst_jornada']."</td>
                        <td scope='row'>".$row['pst_trabaja']."</td>
                        <td scope='row'>".$row['pst_provincia']."</td>
                        <td scope='row'>".$row['pst_ciudad']."</td>
                        <td scope='row'>".$row['pst_dependiente']."</td>
                        <td scope='row'>".$row['pst_vive']."</td>
                        <td scope='row'>".$row['pst_civil']."</td>
                        <td scope='row'>".$row['pst_hijos']."</td>
                        <td scope='row'>".$row['pst_universidad']."</td>
                        <td scope='row'>".$row['pst_nombre_ref']."</td>
                        <td scope='row'>".$row['pst_apellidos_ref']."</td>
                        <td scope='row'>".$row['pst_direccion_ref']."</td>
                        <td scope='row'>".$row['pst_tlf_ref']."</td> 
                        <td scope='row'>".$row['pst_fecha']."</td'>
                        <td scope='row' style='cursor: pointer;'><a onclick='viewImage(".$img.")'><i class='fa fa-id-card fa-2x fa-xs'></i></a>
                        </td>
                        <td scope='row' style='cursor: pointer;'><a href='ver_pasante.php?cargar=ver_pasantes&ver_est=".$row['pst_cedula']."'><i class='fa fa-file-text fa-2x fa-xs'></i></a>
                        </td>
                        <td scope='row'><a href='editar_pasante.php?cargar=editar_pasante&editar_pst=".$row['pst_cedula']."'><i class='fa fa-pencil-square-o fa-2x fa-xs' ></i></a>
                        </td>
                        <td scope='row'><a href='historial_pasante.php?func=delete&codice=".$row['pst_id']. "'><i class='fa fa-trash fa-2x fa-lg' style='color:#ff0000;'></i></a>
                        </td>
                        </tr>";
                    }
                    if ($cadena != ""){
                        return $cadena;
                    }else{
                        return "No hay datos";
                    }
                }else{
                    echo 2;
                }
            }else{
                echo 3;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getEstCedula($argCedula){
        try {
            $query = "SELECT * FROM titulacion_6to_c.tb_registro_estudiante WHERE est_cedula LIKE :CEDULA";
            $cedula = "%".$argCedula."%";
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt = $this->conexion->prepare($query);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt->bindParam(":CEDULA",$cedula,PDO::PARAM_STR,10);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            if (isset($stmt)){
                if ($stmt->execute()){

                    $cadena="";
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $row){
                        $cadena = $cadena ."<tr>
                            <td scope='row'>".$row['est_cedula']."</td>
                            <td scope='row'>".$row['est_nombres']."</td>
                            <td scope='row'>".$row['est_apellidos']."</td>
                            <td scope='row'>".$row['est_celular']."</td>
                            <td scope='row'>".$row['est_correo']."</td>
                            <td scope='row'>".$row['est_convencional']."</td>
                            <td scope='row'>".$row['est_direccion']."</td>
                            <td scope='row'>".$row['est_fecha_nacimiento']."</td>
                            <td scope='row'>".$row['est_edad']."</td>
                            <td scope='row'>".$row['est_enfermedad']."</td>
                            <td scope='row'>".$row['est_alergias']."</td>
                            <td scope='row'>".$row['est_tipo_sangre']."</td>
                            <td scope='row'>".$row['est_genero']."</td>
                            <td scope='row'>".$row['est_curso']."</td>
                            <td scope='row'>".$row['est_jornada']."</td>
                            <td scope='row'>".$row['est_provincia']."</td>
                            <td scope='row'>".$row['est_ciudad']."</td>
                            <td scope='row'>".$row['est_trabaja']."</td>
                            <td scope='row'>".$row['est_vive']."</td>
                            <td scope='row'>".$row['est_hermanos']."</td>
                            <td scope='row'>".$row['est_civil']."</td>
                            <td scope='row'>".$row['est_hijos']."</td>
                            <td scope='row'>".$row['est_nombre_ref']."</td>
                            <td scope='row'>".$row['est_apellidos_ref']."</td>
                            <td scope='row'>".$row['est_cedula_ref']."</td>
                            <td scope='row'>".$row['est_correo_ref']."</td>
                            <td scope='row'>".$row['est_tlf_ref']."</td>
                            <td scope='row'>".$row['est_direccion_ref']."</td>
                            <td scope='row'>".$row['est_fecha']."</td>
                            <td scope='row' style='cursor: pointer;'><a onclick='viewImage(".$row['est_id'].")'><i class='fa fa-id-card fa-2x fa-xs'></i></a>
                            </td>
                            <td scope='row' style='cursor: pointer;'><a href='ver_estudiante.php?cargar=ver_estudiantes&ver_est=".$row['est_cedula']."'><i class='fa fa-file-text fa-2x fa-xs'></i></a>
                            </td>
                            <td scope='row'><a href='editar_estudiante.php?cargar=editar_estudiantes&editar_est=".$row['est_cedula']."'><i class='fa fa-pencil-square-o fa-2x fa-xs' ></i></a>
                            </td>
                            <td scope='row'><a href='historial_estudiante.php?func=delete&codice=".$row['est_id']. "'><i class='fa fa-trash fa-2x fa-lg' style='color:#ff0000;'></i></a>
                            </td>
                            </tr>";
                    }
                    if ($cadena != ""){
                        return $cadena;
                    }else{
                        return "No hay datos";
                    }
                }
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getCurriculums($argCedula){
        try {
            $query = "SELECT * FROM titulacion_6to_c.tb_curriculum WHERE est_cedula LIKE :CEDULA";
            $cedula = "%".$argCedula."%";
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt = $this->conexion->prepare($query);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt->bindParam(":CEDULA",$cedula,PDO::PARAM_STR,10);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            if (isset($stmt)){
                if ($stmt->execute()){

                    $cadena="";
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $row){
                        $cadena = $cadena ."<tr>
                            <td scope='row'>".$row['est_cedula']."</td>
                            <td scope='row'>".$row['est_nombres']."</td>
                            <td scope='row'>".$row['est_apellidos']."</td>
                            <td scope='row'>".$row['est_celular']."</td>
                            <td scope='row'>".$row['est_correo']."</td>
                            <td scope='row'>".$row['est_convencional']."</td>
                            <td scope='row'>".$row['est_direccion']."</td>
                            <td scope='row'>".$row['est_fecha_nacimiento']."</td>
                            <td scope='row'>".$row['est_edad']."</td>
                            <td scope='row'>".$row['est_enfermedad']."</td>
                            <td scope='row'>".$row['est_alergias']."</td>
                            <td scope='row'>".$row['est_tipo_sangre']."</td>
                            <td scope='row'>".$row['est_genero']."</td>
                            <td scope='row'>".$row['est_curso']."</td>
                            <td scope='row'>".$row['est_jornada']."</td>
                            <td scope='row'>".$row['est_provincia']."</td>
                            <td scope='row'>".$row['est_ciudad']."</td>
                            <td scope='row'>".$row['est_trabajo']."</td>
                            <td scope='row'>".$row['est_vive']."</td>
                            <td scope='row'>".$row['est_hermanos']."</td>
                            <td scope='row'>".$row['est_civil']."</td>
                            <td scope='row'>".$row['est_hijos']."</td>
                            <td scope='row'>".$row['est_nombre_ref']."</td>
                            <td scope='row'>".$row['est_apellidos_ref']."</td>
                            <td scope='row'>".$row['est_cedula_ref']."</td>
                            <td scope='row'>".$row['est_correo_ref']."</td>
                            <td scope='row'>".$row['est_tlf_ref']."</td>
                            <td scope='row'>".$row['est_direccion_ref']."</td>
                            <td scope='row'>".$row['est_aceptar']."</td>
                            <td scope='row'>".$row['est_fecha']."</td>
                            <td scope='row' style='cursor: pointer;'><a onclick='viewImage(".$row['est_id'].")'><i class='fa fa-id-card fa-2x fa-xs'></i></a>
                            </td>
                            <td scope='row' style='cursor: pointer;'><a href='ver_estudiante_online.php?cargar=ver_estudiante_online&ver_est=".$row['est_cedula']."'><i class='fa fa-file-text fa-2x fa-lg' style='color:#0985E1;'></i></a>
                            </td>
                            <td scope='row'><a href='editar_estudiante_online.php?cargar=editar_estudiante_online&editar_est=".$row['est_cedula']."'><i class='fa fa-pencil-square-o fa-2x fa-lg' style='color:#0985E1;'></i></a>
                            </td>
                            <td scope='row'><a href='curriculums.php?func=delete&codice=".$row['est_id']."'><i class='fa fa-trash fa-2x fa-lg' style='color:red;'></i></a>
                            </td>
                               </tr>";
                    }
                    if ($cadena != ""){
                        return $cadena;
                    }else{
                        return "No hay datos";
                    }
                }
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function getPasantesOn($argCedula){
        try {
            $query = "SELECT * FROM titulacion_6to_c.tb_pasantes WHERE pst_cedula LIKE :CEDULA";
            $cedula = "%".$argCedula."%";
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt = $this->conexion->prepare($query);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt->bindParam(":CEDULA",$cedula,PDO::PARAM_STR,10);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            if (isset($stmt)){
                if ($stmt->execute()){

                    $cadena="";
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $row){
                        $cadena = $cadena ."<tr>
                            <td scope='row'>".$row['pst_cedula']."</td>
                            <td scope='row'>".$row['pst_nombres']."</td>
                            <td scope='row'>".$row['pst_apellidos']."</td>
                            <td scope='row'>".$row['pst_convencional']."</td>
                            <td scope='row'>".$row['pst_celular']."</td>
                            <td scope='row'>".$row['pst_correo']."</td>
                            <td scope='row'>".$row['pst_direccion']."</td>
                            <td scope='row'>".$row['pst_fecha_nacimiento']."</td>
                            <td scope='row'>".$row['pst_edad']."</td>
                            <td scope='row'>".$row['pst_enfermedad']."</td>
                            <td scope='row'>".$row['pst_alergias']."</td>
                            <td scope='row'>".$row['pst_tipo_sangre']."</td>
                            <td scope='row'>".$row['pst_genero']."</td>
                            <td scope='row'>".$row['pst_curso']."</td>
                            <td scope='row'>".$row['pst_jornada']."</td>
                            <td scope='row'>".$row['pst_trabaja']."</td>
                            <td scope='row'>".$row['pst_provincia']."</td>
                            <td scope='row'>".$row['pst_ciudad']."</td>
                            <td scope='row'>".$row['pst_dependiente']."</td>
                            <td scope='row'>".$row['pst_vive']."</td>
                            <td scope='row'>".$row['pst_civil']."</td>
                            <td scope='row'>".$row['pst_hijos']."</td>
                            <td scope='row'>".$row['pst_universidad']."</td>
                            <td scope='row'>".$row['pst_nombre_ref']."</td>
                            <td scope='row'>".$row['pst_apellidos_ref']."</td>
                            <td scope='row'>".$row['pst_direccion_ref']."</td>
                            <td scope='row'>".$row['pst_tlf_ref']."</td>
                            <td scope='row'>".$row['pst_aceptar']."</td>                      
                            <td scope='row'>".$row['pst_fecha']."</td>
                            <td scope='row' style='cursor: pointer;'><a onclick='viewImage(".$row['pst_id'].")'><i class='fa fa-id-card fa-2x fa-xs'></i></a>
                            </td>
                            <td scope='row' style='cursor: pointer;'><a href='ver_pasante_online.php?cargap=ver_pasante_online&ver_pst=".$row['pst_cedula']."'><i class='fa fa-file-text fa-2x' style='color:#0985E1;'></i></a>
                            </td>
                            <td scope='row'><a href='editar_pasante_online.php?cargar=editar_pasante_online&editar_pst=".$row['pst_cedula']."'><i class='fa fa-pencil-square-o fa-2x' style='color:#0985E1;'></i></a>
                            </td>
                            <td scope='row'><a href='online_pasantes.php?func=delete&codice=".$row['pst_id']."'><i class='fa fa-trash fa-2x' style='color:red;'></i></a>
                                </td>
                            </tr>";
                    }
                    if ($cadena != ""){
                        return $cadena;
                    }else{
                        return "No hay datos";
                    }
                }
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getDocumentVer($argCedula){
        try {
            $query = "SELECT * FROM titulacion_6to_c.tb_document WHERE doc_cedula LIKE :CEDULA";
            $cedula = "%".$argCedula."%";
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt = $this->conexion->prepare($query);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            $stmt->bindParam(":CEDULA",$cedula,PDO::PARAM_STR,10);
        }catch(PDOException $e){
            die($e->getMessage());
        }

        try {
            if (isset($stmt)){
                if ($stmt->execute()){

                    $cadena="";
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $row){
                        $cadena = $cadena . ' <tr>
                          <th scope="row">'.$row["doc_cedula"].'</th>
                          <th scope="row">'.$row["doc_nombre"].'</th>
                          <th scope="row">'.$row["doc_apellido"].'</th>
                          <th scope="row">'.$row["doc_direccion"].'</th>
                          <th scope="row">'.$row["doc_genero"].'</th>
                          <th scope="row">'.$row["doc_telefono"].'</th>
                          <th scope="row">'.$row["doc_curso"].'</th>
                          <th scope="row">'.$row["doc_aprobo"].'</th>
                          <th scope="row">'.$row["doc_reprobo"].'</th>
                          <th scope="row">'.$row["doc_motivo"].'</th>
                          <th scope="row">'.$row["doc_fecha"].'</th>
                          <th scope="row"><a href="documentver.php?func=delete&codice='.$row["doc_id"].'" style="margin-top:0px !important;" class="btn btn-primary">Eliminar</a></th>
                    </tr>';
                    }
                    if ($cadena != ""){
                        return $cadena;
                    }else{
                        return "No hay datos";
                    }
                }
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
}

$objBusqueda = new BusquedaEstPst();
$busqueda = $objBusqueda;

if (isset($_GET)){
    if (isset($_GET["cedula_est"])){
        echo json_encode($busqueda->getEstCedula($_GET["cedula_est"]));
    }elseif (isset($_GET["cedula_pst"])){
        echo json_encode($busqueda->getPstCedula($_GET["cedula_pst"]));
    }elseif (isset($_GET["cedula_cur"])){
        echo json_encode($busqueda->getCurriculums($_GET["cedula_cur"]));
    }elseif (isset($_GET["cedula_pst_on"])){
        echo json_encode($busqueda->getPasantesOn($_GET["cedula_pst_on"]));
    }elseif(isset($_GET["documentver"])){
        echo json_encode($busqueda->getDocumentVer($_GET["documentver"]));
    }
}