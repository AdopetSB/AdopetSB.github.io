<?php
include("connection.php");
$con = connection();

$id = null;
$imagen = $_POST['imagen'];
$tipo_mascota = $_POST['tipo_mascota'];
$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$sexo	 = $_POST['sexo'];
$temperamento = $_POST['temperamento'];
$salud = $_POST['salud'];
$cuidados = $_POST['cuidados'];
$descripcion = $_POST['descripcion'];
$comentario = $_POST['comentario']; 


$sql = "INSERT INTO mascotas VALUES('$id','$imagen','$tipo_mascota','$nombre','$raza','$edad', '$sexo', '$temperamento', '$salud', '$cuidados', '$descripcion', '$comentario')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>