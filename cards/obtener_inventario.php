<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbadopet";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de mascotas desde la tabla "perros"
$sql = "SELECT datos, nombre, raza, edad, sexo, comentario FROM perros";
$result = $conn->query($sql);

$mascotas = array();

if ($result->num_rows > 0) {
    // Obtener cada fila de resultados como un array asociativo
    while($row = $result->fetch_assoc()) {
        // Codificar la imagen en base64 si no es nula
        if (!is_null($row['datos'])) {
            $row['imagen'] = 'data:image/jpeg;base64,' . base64_encode($row['datos']);
        } else {
            $row['imagen'] = null;
        }
        // Eliminar 'datos' del array ya que se ha renombrado a 'imagen'
        unset($row['datos']);
        // Agregar cada fila a un array de mascotas
        $mascotas[] = $row;
    }
} else {
    echo "0 resultados";
}

// Devolver los datos de productos como JSON
header('Content-Type: application/json');
echo json_encode($mascotas);

// Cerrar la conexión
$conn->close();
?>