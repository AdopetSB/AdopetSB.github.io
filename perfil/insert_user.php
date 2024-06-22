<?php
include("connection.php");
$con = connection();

$id = null;
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento']; 
$ocupacion = $_POST['ocupacion'];
$horario = $_POST['horario'];
$genero = $_POST['genero'];
$direccion = $_POST['direccion'];
$direccion1 = $_POST['direccion1'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO perfilusuario (id, nombre_completo, correo, telefono, fecha_nacimiento, ocupacion, horario, genero, direccion, direccion1) 
            VALUES (NULL,  '$nombre_completo', '$correo', '$telefono', '$fecha_nacimiento', '$ocupacion', '$horario', '$genero', '$direccion', '$direccion1')";
    $query = mysqli_query($con, $sql);

    if($query){
        echo '
        <script>
            window.location = "perfil.php";
        </script>
        ';
    } else {
        echo "Error en la consulta: " . mysqli_error($con);
}

?>