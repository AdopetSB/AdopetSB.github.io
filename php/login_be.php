<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbadopet";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para verificar las credenciales del usuario
    $stmt = $conn->prepare("SELECT id_cargo, password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id_cargo, $db_password);
    $stmt->fetch();
    $stmt->close();

    // Verificar la contraseña
    if ($db_password === $password || $db_password === hash('sha512', $password)) {
        $_SESSION['email'] = $email;
        $_SESSION['id_cargo'] = $id_cargo;
        if ($id_cargo == 1) {
            header('Location: ../perfil_admin.php');
        } else if ($id_cargo == 0) {
            header('Location: ../Adopet.php');
        }
        exit();
    } else {
        header("location: ../login.php?error=invalid_credentials");
    }
}

$conn->close();
?>
