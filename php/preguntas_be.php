<?php   

include("conexion.php");

$nombre_mascota = $_POST['nombre_mascota'];
$raza = $_POST['raza'];
$tipo_mascota = $_POST['tipo_mascota'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$nacimiento = $_POST['nacimiento'];
$ocupacion = $_POST['ocupacion'];
$horario = $_POST['horario'];
$genero = $_POST['genero'];
$direccion = $_POST['direccion'];
$direccion1 = $_POST['direccion1'];
$familia = $_POST['familia'];
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

$query = "INSERT INTO solicitudes(nombre_mascota, raza, tipo_mascota, nombre, correo, telefono, nacimiento, ocupacion, horario, genero, direccion, 
                    direccion1, familia, porque, mas_mascotas, pasaria, situacion_casa, hobbies, consideras, mas_personas, vacaciones, espacio, 
                    con_quien, adoptar, elegiste, amigo) 
            VALUES('$nombre_mascota', '$raza', '$tipo_mascota', '$nombre', '$correo', '$telefono', '$nacimiento', '$ocupacion', '$horario', '$genero', 
            '$direccion', '$direccion1', '$familia', '$porque', '$mas_mascotas', '$pasaria', '$situacion_casa', '$hobbies', '$consideras', 
            '$mas_personas', '$vacaciones', '$espacio', '$con_quien', '$adoptar', '$elegiste', '$amigo')";

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    header("Location: ../iniciosesion/formulario.php?status=success");
    exit();
}else{
    header("Location: ../iniciosesion/formulario.php?status=error");
    exit();
}

?>
