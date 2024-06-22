<?php

include("connection.php");
$con = connection();

$id =$_POST["id"];
$imagen = $_POST['imagen'];
$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$temperamento = $_POST['temperamento'];
$salud = $_POST['salud'];
$cuidados = $_POST['cuidados'];
$descripcion = $_POST['descripcion'];
$comentario = $_POST['comentario']; 


$sql="UPDATE conejos SET imagen='$imagen', nombre='$nombre', raza='$raza', edad='$edad', sexo='$sexo', temperamento='$temperamento', 
                        salud='$salud',  cuidados='$cuidados', descripcion='$descripcion', comentario='$comentario' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>