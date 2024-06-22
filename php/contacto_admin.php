<?php   

include("conexion.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];


$query = "INSERT INTO contacto(nombre, email, telefono, mensaje) 
            VALUES('$nombre', '$email', '$telefono', '$mensaje')";


$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    header("location: ../contacto.php?success=data_sent");
    exit();   
} else {
    header("location: ../contacto.php?error=data_sent");
}
mysqli_close($conexion);
?>
