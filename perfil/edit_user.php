<?php

include("connection.php");
$con = connection();

$id =$_POST["id"];
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento']; 
$ocupacion = $_POST['ocupacion'];
$horario = $_POST['horario'];
$genero = $_POST['genero'];
$direccion = $_POST['direccion'];
$direccion1 = $_POST['direccion1'];


$sql="UPDATE perfilusuario SET nombre_completo='$nombre_completo', correo='$correo', telefono='$telefono', fecha_nacimiento='$fecha_nacimiento', ocupacion='$ocupacion', 
                        horario='$horario', genero='$genero', direccion='$direccion', direccion1='$direccion1' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: perfil.php");
}else{

}

?>