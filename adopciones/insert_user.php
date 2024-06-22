<?php
include("connection.php");
$con = connection();

$id = null;
$mascota = $_POST['mascota'];
$raza = $_POST['raza'];
$tipo_mascota = $_POST['tipo_mascota'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$fecha = $_POST['fecha'];
// $observaciones = $_POST['observaciones'];

$sql = "INSERT INTO adopciones VALUES('$id','$mascota','$raza','$tipo_mascota','$nombre','$correo','$telefono', '$direccion','$fecha's)";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>