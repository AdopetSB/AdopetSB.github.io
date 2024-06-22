<?php

include("connection.php");
$con = connection();

$id=$_POST["id"];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];
$id_cargo = $_POST['id_cargo'];



$sql="UPDATE usuarios SET usuario='$usuario', password='$password', email='$email', id_cargo='$id_cargo' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>