<?php

include("connection.php");
$con = connection();

$id =$_POST["id"];
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


$sql="UPDATE solicitudes SET nombre_mascota='$nombre_mascota', raza='$raza', tipo_mascota='$tipo_mascota', nombre='$nombre', correo='$correo', telefono='$telefono', 
                            nacimiento='$nacimiento', ocupacion='$ocupacion', horario='$horario', genero='$genero', direccion='$direccion', direccion1='$direccion1'
                            , porque='$porque', mas_mascotas='$mas_mascotas', pasaria='$pasaria', situacion_casa='$situacion_casa', hobbies='$hobbies', consideras='$consideras'
                            , mas_personas='$mas_personas', vacaciones='$vacaciones', espacio='$espacio', con_quien='$con_quien', adoptar='$adoptar', elegiste='$elegiste', amigo='$amigo'WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>