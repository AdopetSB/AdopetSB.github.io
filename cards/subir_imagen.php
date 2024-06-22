<?php
$servername = "localhost"; // Cambia esto a tu servidor de base de datos
$username = "root"; // Cambia esto a tu usuario de base de datos
$password = ""; // Cambia esto a tu contraseña de base de datos
$dbname = "dbadopet"; // Cambia esto al nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen'])) {
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTipo = $_FILES['imagen']['type'];
    $imagenDatos = file_get_contents($_FILES['imagen']['tmp_name']);
    $imagenBase64 = base64_encode($imagenDatos);
    
    $stmt = $conn->prepare("INSERT INTO imagenes (nombre, tipo, datos) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $imagenNombre, $imagenTipo, $imagenBase64);
    
    if ($stmt->execute()) {
        echo "Imagen subida y guardada en la base de datos con éxito.";
    } else {
        echo "Error al guardar la imagen: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>