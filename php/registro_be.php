<?php   

include("conexion.php");

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];

//encriptar contraseña
$password = hash('sha512', $password);


$query = "INSERT INTO usuarios(usuario, email,  password) 
            VALUES('$usuario', '$email', '$password')";


// veryficar si no hay usuarios o correos repetidos

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email'");

if(mysqli_num_rows($verificar_correo) > 0){
    header("location: ../login.php?error=email_registered");
    exit();
}

// veryficar si no hay usuarios o correos repetidos

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");

if(mysqli_num_rows($verificar_usuario) > 0){
    header("location: ../login.php?error=user_registered");
    exit(); 
}


$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    header("location: ../Adopet.php?success=registered");
}else{
    header("location: ../login.php?error=not_stored");
}
mysqli_close($conexion);
?>
