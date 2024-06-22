<?php
include("connection.php");
$con = connection();

$id = null;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];   


$sql = "INSERT INTO contacto VALUES('$id','$nombre','$email','$telefono', '$mensaje')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>