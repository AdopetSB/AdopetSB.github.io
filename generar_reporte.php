<?php
require __DIR__ . '\vendor\autoload.php'; // Asegúrate de que la ruta a autoload.php esté correcta
// Incluir la clase TCPDF
require_once('TCPDF-main/tcpdf.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbadopet";
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    // Obtener fechas del formulario
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];

    // Determinar el tipo de reporte seleccionado (PDF o Excel)
    $tipo_reporte = $_POST["tipo_reporte"];

    // Consulta SQL dinámica para el rango de fechas
    $sql = " SELECT * FROM solicitudes WHERE nacimiento BETWEEN '$fecha_inicio' AND '$fecha_fin'";

    // Ejecutar consulta SQL
    $result = $conn->query($sql);

    // Generar PDF y descargar automáticamente
    if (isset($tipo_reporte) && $tipo_reporte == "pdf") {
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Reporte de Solicitudes');
        $pdf->SetHeaderData('', 0, 'Reporte de Solicitudes', '');
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->AddPage();
        $pdf->Cell(0, 10, "Reporte de Solicitudes del $fecha_inicio al $fecha_fin", 0, 1, 'C');
        $pdf->Ln();
    
        if ($result->num_rows > 0) {
            $pdf->SetFont('helvetica', 'B', 10);
            
            // Encabezado de la primera parte
            $pdf->Cell(10, 7, 'Id', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Mascota', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Raza', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Tipo Mascota', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Solicitante', 1, 0, 'C');
            $pdf->Cell(53, 7, 'Correo', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Telefono', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Nacimiento', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Ocupacion', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Horario', 1, 1, 'C');
        
            $pdf->SetFont('helvetica', '', 10);
            while ($row = $result->fetch_assoc()) {
                $pdf->Cell(10, 7, $row["id"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["nombre_mascota"], 1, 0, 'C');
                $pdf->Cell(30, 7, $row["raza"], 1, 0, 'C');
                $pdf->Cell(30, 7, $row["tipo_mascota"], 1, 0, 'C');
                $pdf->Cell(35, 7, $row["nombre"], 1, 0, 'C');
                $pdf->Cell(53, 7, $row["correo"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["telefono"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["nacimiento"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["ocupacion"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["horario"], 1, 1, 'C');
    
                // Salto de línea si es necesario
                // $pdf->Ln();
            }
            
            // Agregar una nueva página
            $pdf->AddPage();
            


            // Encabezado de la segunda parte
            $pdf->SetFont('helvetica', 'B', 10);
            $pdf->Cell(0, 10, "Reporte de Solicitudes del $fecha_inicio al $fecha_fin", 0, 1, 'C');
            $pdf->Ln();
            $pdf->Cell(20, 7, 'Genero', 1, 0, 'C');
            $pdf->Cell(80, 7, 'Direccion', 1, 0, 'C');
            $pdf->Cell(60, 7, 'S.Direccion', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Familia', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Porque', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Mas Mascotas', 1, 1, 'C');

            $pdf->SetFont('helvetica', '', 10);
            foreach ($result as $row) {
                $pdf->Cell(20, 7, $row["genero"], 1, 0, 'C');
                $pdf->Cell(80, 7, $row["direccion"], 1, 0, 'C');
                $pdf->Cell(60, 7, $row["direccion1"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["familia"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["porque"], 1, 0, 'C');
                $pdf->Cell(30, 7, $row["mas_mascotas"], 1, 1, 'C');

                    // Salto de línea si es necesario
                    // $pdf->Ln();
            }

            // Agregar una nueva página
            $pdf->AddPage();


             // Encabezado de la segunda parte
            $pdf->SetFont('helvetica', 'B', 10);
            $pdf->Cell(0, 10, "Reporte de Solicitudes del $fecha_inicio al $fecha_fin", 0, 1, 'C');
            $pdf->Ln();
            $pdf->Cell(60, 7, 'Pasaria', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Casa', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Hobbies', 1, 0, 'C');
            $pdf->Cell(60, 7, 'Consideras', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Niños', 1, 0, 'C');
            $pdf->Cell(60, 7, 'Vacaciones', 1, 1, 'C');

            $pdf->SetFont('helvetica', '', 10);
            foreach ($result as $row) {
                $pdf->Cell(60, 7, $row["pasaria"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["situacion_casa"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["hobbies"], 1, 0, 'C');
                $pdf->Cell(60, 7, $row["consideras"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["mas_personas"], 1, 0, 'C');
                $pdf->Cell(60, 7, $row["vacaciones"], 1, 1, 'C');

                // Salto de línea si es necesario
                // $pdf->Ln();
            }

            // Agregar una nueva página
            $pdf->AddPage();

            $pdf->SetFont('helvetica', 'B', 10);
            $pdf->Cell(0, 10, "Reporte de Solicitudes del $fecha_inicio al $fecha_fin", 0, 1, 'C');
            $pdf->Ln();
            $pdf->Cell(80, 7, 'Espacio', 1, 0, 'C');
            $pdf->Cell(43, 7, 'Con quien', 1, 0, 'C');
            $pdf->Cell(95, 7, 'Adoptar', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Elegiste', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Referencia', 1, 1, 'C');

            $pdf->SetFont('helvetica', '', 10);
            foreach ($result as $row) {
                $pdf->Cell(80, 7, $row["espacio"], 1, 0, 'C');
                $pdf->Cell(43, 7, $row["con_quien"], 1, 0, 'C');
                $pdf->Cell(95, 7, $row["adoptar"], 1, 0, 'C');
                $pdf->Cell(25, 7, $row["elegiste"], 1, 0, 'C');
                $pdf->Cell(40, 7, $row["amigo"], 1, 1, 'C');
    
                // Salto de línea si es necesario
                // $pdf->Ln();
            }
        } else {
            $pdf->Cell(0, 10, 'No se encontraron solicitudes para el rango de fechas especificado.', 0, 1, 'C');
        }
    
        $pdf->Output('reporte_solicitudes.pdf', 'I');
    
    



        // Define el nombre del archivo con las fechas incluidas -----excel-----
        $filename = 'reporte_solicitudes_' . $fecha_inicio . '_to_' . $fecha_fin . '.pdf';

        // Enviar encabezados para descargar el archivo
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');

        // Enviar el archivo al usuario
        $pdf->Output($filename, 'D');
        exit();
    }

    // Generar Excel y descargar automáticamente
    if (isset($tipo_reporte) && $tipo_reporte == "excel") {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'nombre_mascota');
        $sheet->setCellValue('C1', 'Raza');
        $sheet->setCellValue('D1', 'tipo_mascota');
        $sheet->setCellValue('E1', 'nombre');
        $sheet->setCellValue('F1', 'correo');
        $sheet->setCellValue('G1', 'telefono');
        $sheet->setCellValue('H1', 'nacimiento');
        $sheet->setCellValue('I1', 'ocupacion');
        $sheet->setCellValue('J1', 'horario');
        $sheet->setCellValue('K1', 'genero');
        $sheet->setCellValue('L1', 'direccion');
        $sheet->setCellValue('M1', 'direccion1');
        $sheet->setCellValue('N1', 'familia');
        $sheet->setCellValue('O1', 'porque');
        $sheet->setCellValue('P1', 'mas_mascotas');
        $sheet->setCellValue('Q1', 'pasaria');
        $sheet->setCellValue('R1', 'situacion_casa');
        $sheet->setCellValue('S1', 'hobbies');
        $sheet->setCellValue('T1', 'consideras');
        $sheet->setCellValue('U1', 'mas_personas');
        $sheet->setCellValue('V1', 'vacaciones');
        $sheet->setCellValue('W1', 'espacio');
        $sheet->setCellValue('X1', 'con_quien');
        $sheet->setCellValue('Y1', 'adoptar');
        $sheet->setCellValue('Z1', 'elegiste');
        $sheet->setCellValue('AA1', 'amigo');

        $rowNumber = 2;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sheet->setCellValue('A' . $rowNumber, $row["id"]);
                $sheet->setCellValue('B' . $rowNumber, $row["nombre_mascota"]);
                $sheet->setCellValue('C' . $rowNumber, $row["raza"]);
                $sheet->setCellValue('D' . $rowNumber, $row["tipo_mascota"]);
                $sheet->setCellValue('E' . $rowNumber, $row["nombre"]);
                $sheet->setCellValue('F' . $rowNumber, $row["correo"]);
                $sheet->setCellValue('G' . $rowNumber, $row["telefono"]);
                $sheet->setCellValue('H' . $rowNumber, $row["nacimiento"]);
                $sheet->setCellValue('I' . $rowNumber, $row["ocupacion"]);
                $sheet->setCellValue('J' . $rowNumber, $row["horario"]);
                $sheet->setCellValue('K' . $rowNumber, $row["genero"]);
                $sheet->setCellValue('L' . $rowNumber, $row["direccion"]);
                $sheet->setCellValue('M' . $rowNumber, $row["direccion1"]);
                $sheet->setCellValue('N' . $rowNumber, $row["familia"]);
                $sheet->setCellValue('O' . $rowNumber, $row["porque"]);
                $sheet->setCellValue('P' . $rowNumber, $row["mas_mascotas"]);
                $sheet->setCellValue('Q' . $rowNumber, $row["pasaria"]);
                $sheet->setCellValue('R' . $rowNumber, $row["situacion_casa"]);
                $sheet->setCellValue('S' . $rowNumber, $row["hobbies"]);
                $sheet->setCellValue('T' . $rowNumber, $row["consideras"]);
                $sheet->setCellValue('U' . $rowNumber, $row["mas_personas"]);
                $sheet->setCellValue('V' . $rowNumber, $row["vacaciones"]);
                $sheet->setCellValue('W' . $rowNumber, $row["espacio"]);
                $sheet->setCellValue('X' . $rowNumber, $row["con_quien"]);
                $sheet->setCellValue('Y' . $rowNumber, $row["adoptar"]);
                $sheet->setCellValue('Z' . $rowNumber, $row["elegiste"]);
                $sheet->setCellValue('AA' . $rowNumber, $row["amigo"]);
                $rowNumber++;
            }
        }

        // Define la ruta temporal donde se guardará el archivo
        // Define el nombre del archivo con las fechas incluidas
        $filename = 'reporte_solicitudes_' . $fecha_inicio . '_to_' . $fecha_fin . '.xlsx';
        $filepath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $filename;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filepath);

        // Enviar encabezados para descargar el archivo
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        // Leer el archivo y enviarlo al usuario
        readfile($filepath);

        // Eliminar el archivo temporal
        unlink($filepath);
        exit();
    }

    // Cerrar conexión
    $conn->close();
}
