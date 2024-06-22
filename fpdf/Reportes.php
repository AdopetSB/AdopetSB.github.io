<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {

      // $this->icon('../img/logos/LOGO.png');
      $this->Image('../img/logos/LOGOG.png', 8, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(80, 15, utf8_decode('ADOPET'), 1 , 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(25);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación:  Santa Barbara, SB. "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(25);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono:   9497-6009 "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(25);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo:  adopet.sb@gmail.com"), 0, 0, '', 0);
      $this->Ln(10);

      // /* TELEFONO */
      // $this->Cell(180);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      // $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 0, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(80, 10, utf8_decode("REPORTE DE ADOPCIONES"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(77, 132, 226); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(47, 47, 47); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(23, 10, utf8_decode('MASCOTA'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('RAZA'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
      $this->Cell(33, 10, utf8_decode('ADOPTANTE'), 1, 0, 'C', 1);
      $this->Cell(55, 10, utf8_decode('CORREO'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('TELEFONO'), 1, 0, 'C', 1);
      $this->Cell(45, 10, utf8_decode('DIRECCION'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('FECHA'), 1, 1, 'C', 1);
      // $this->Cell(53, 10, utf8_decode('OBSERVACIONES'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(47, 47, 47); //colorBorde


/* TABLA */
require '../php/conexion.php';
$consulta ="SELECT * FROM adopciones";
$resultado = mysqli_query($conexion, $consulta);

while ($row = $resultado->fetch_assoc()) { 
   
$pdf->Cell(15, 10, $row['id'], 1, 0, 'C', 0);
$pdf->Cell(23, 10, $row['mascota'], 1, 0, 'C', 0);
$pdf->Cell(35, 10, $row['raza'], 1, 0, 'C', 0);
$pdf->Cell(25, 10, $row['tipo_mascota'], 1, 0, 'C', 0);
$pdf->Cell(33, 10, $row['nombre'], 1, 0, 'C', 0);
$pdf->Cell(55, 10, $row['correo'], 1, 0, 'C', 0);
$pdf->Cell(25, 10, $row['telefono'], 1, 0, 'C', 0);
$pdf->Cell(45, 10, $row['direccion'], 1, 0, 'C', 0);
$pdf->Cell(25, 10, $row['fecha'], 1, 1, 'C', 0);
// $pdf->Cell(53, 10, $row['observaciones'], 1, 1, 'C', 0);

}



$pdf->Output('ADOPET.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
