<?php

include("connection.php");
$con = connection();

$id =$_POST["id"];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];



$sql="UPDATE contacto SET nombre='$nombre', email='$email', telefono='$telefono', mensaje='$mensaje' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>