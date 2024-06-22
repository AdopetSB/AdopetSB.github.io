<?php   

include("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$experiencia = $_POST['experiencia'];
$puesto = $_POST['puesto'];


$query = "INSERT INTO voluntarios(nombre, correo, telefono, experiencia, puesto) 
            VALUES('$nombre', '$correo', '$telefono', '$experiencia', '$puesto')";


$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    header("location: ../index.php?success=data_sent");
    exit();   
} else {
    header("location: ../index.php?error=data_sent");
}

mysqli_close($conexion);
?>
