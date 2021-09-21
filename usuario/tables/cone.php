<?php  
$Chost = "localhost";
$Cuser = "root";
$Cpass = "123456789";
$Cdb = "consultorios_odontologicos";
$con = new mysqli($Chost,$Cuser,$Cpass,$Cdb);
if ($con->connect_errno) {
die("un error");
}
?>