<?php
include("connection.php");
$con = connection();

$id = null;
$nombre_mascota = $_POST['nombre_mascota'];
$raza = $_POST['raza'];
$tipo_mascota = $_POST['tipo_mascota'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$nacimiento	 = $_POST['nacimiento'];
$ocupacion = $_POST['ocupacion'];
$horario = $_POST['horario'];
$genero = $_POST['genero'];
$direccion = $_POST['direccion'];
$direccion1 = $_POST['direccion1'];
$porque = $_POST['porque'];
$mas_mascotas = $_POST['mas_mascotas']; 
$pasaria = $_POST['pasaria'];
$situacion_casa = $_POST['situacion_casa'];
$hobbies = $_POST['hobbies'];
$consideras = $_POST['consideras'];
$mas_personas = $_POST['mas_personas'];
$vacaciones = $_POST['vacaciones'];
$espacio = $_POST['espacio'];
$con_quien = $_POST['con_quien'];
$adoptar = $_POST['adoptar'];
$elegiste = $_POST['elegiste'];
$amigo = $_POST['amigo'];


$sql = "INSERT INTO solicitudes VALUES('$id','$nombre_mascota','$raza','$tipo_mascota', '$nombre', '$correo', '$telefono', '$nacimiento', '$ocupacion',
                                            '$horario', '$genero', '$direccion', '$direccion1', '$porque', '$mas_mascotas', '$pasaria', '$situacion_casa' 
                                            , '$hobbies', '$consideras', '$mas_personas', '$vacaciones', '$espacio', '$con_quien', '$adoptar', '$elegiste' , '$amigo')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>