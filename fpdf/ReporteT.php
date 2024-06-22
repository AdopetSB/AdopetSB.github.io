<?php
require('./fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('../img/logos/LOGOG.png', 8, 5, 20);
        $this->SetFont('Arial', 'B', 19);
        $this->Cell(95);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(80, 15, utf8_decode('ADOPET'), 1 , 1, 'C', 0);
        $this->Ln(3);
        $this->SetTextColor(103);

        $this->Cell(25);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(96, 10, utf8_decode("Ubicación:  Santa Barbara, SB. "), 0, 0, '', 0);
        $this->Ln(5);

        $this->Cell(25);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(59, 10, utf8_decode("Teléfono:   9497-6009 "), 0, 0, '', 0);
        $this->Ln(5);

        $this->Cell(25);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Correo:  adopet.sb@gmail.com"), 0, 0, '', 0);
        $this->Ln(10);

        $this->SetTextColor(0, 0, 0);
        $this->Cell(100);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80, 10, utf8_decode("REPORTE DE ADOPCIONES"), 0, 1, 'C', 0);
        $this->Ln(7);

        $this->SetFillColor(77, 132, 226);
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(10, 10, utf8_decode('ID'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('MASCOTA'), 1, 0, 'C', 1);
        $this->Cell(28, 10, utf8_decode('RAZA'), 1, 0, 'C', 1);
        $this->Cell(35, 10, utf8_decode('TIPO MASCOTA'), 1, 0, 'C', 1);
        $this->Cell(35, 10, utf8_decode('ADOPTANTE'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('CORREO'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('TELEFONO'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('DIRECCION'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('FECHA'), 1, 1, 'C', 1);
        // $this->Ln();
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / {nb}', 0, 0, 'C');
    }
}

// Verificar si se ha enviado el mes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mascota'])) {
    $mascota = $_POST['mascota'];
    generateReport($mascota);
}

function generateReport($mascota)
{
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage("landscape");
    $pdf->SetFont('Arial', '', 12);

    // Aquí deberías realizar la consulta a la base de datos para obtener los datos
    // según la direccion seleccionado. Este es un ejemplo de cómo se vería:

    require '../php/conexion.php';

$mascota = $_POST['mascota'];


// Preparar la consulta SQL utilizando una declaración preparada
$sql = "SELECT * FROM adopciones WHERE tipo_mascota = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $mascota);

// Ejecutar la consulta
$stmt->execute();
$resultado = $stmt->get_result();

// Agregar los datos al PDF
while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(10, 10, $row['id'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['mascota'], 1, 0, 'C');
    $pdf->Cell(28, 10, $row['raza'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['tipo_mascota'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['nombre'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['correo'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['telefono'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['direccion'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['fecha'], 1, 1, 'C');
}

// Cerrar la declaración y la conexión
$stmt->close();
$conexion->close();

// Salida del PDF
$pdf->Output();
}
?>
