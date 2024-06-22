<?php

include("connection.php");
$con = connection();

$id =$_POST["id"];
$mascota = $_POST['mascota'];
$raza = $_POST['raza'];
$tipo_mascota = $_POST['tipo_mascota'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$fecha = $_POST['fecha'];
// $observaciones = $_POST['observaciones'];


$sql="UPDATE adopciones SET mascota='$mascota', raza='$raza', tipo_mascota='$tipo_mascota', nombre='$nombre', correo='$correo', telefono='$telefono', direccion='$direccion', fecha='$fecha' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>