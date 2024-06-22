<?php
include("connection.php");
$con = connection();

$id = null;
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];
$id_cargo = $_POST['id_cargo'];


$sql = "INSERT INTO usuarios VALUES('$id','$usuario','$email','$password', '$id_cargo')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>