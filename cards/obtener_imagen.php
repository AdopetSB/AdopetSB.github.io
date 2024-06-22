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

$sql = "SELECT id, nombre, tipo, datos FROM imagenes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['nombre'] . "</h2>";
        echo '<img src="data:' . $row['tipo'] . ';base64,' . $row['datos'] . '"/>';
    }
} else {
    echo "No se encontraron imágenes.";
}

$conn->close();
?>