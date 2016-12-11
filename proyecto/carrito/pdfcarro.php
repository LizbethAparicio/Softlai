<?php
require('fpdf/fpdf.php');//fpdf path
require('conexion.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 2);

$pdf->Cell(10, 8, 'LISTADO DE PROVEEDORES', 3);

$pdf->Ln(25);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(40, 5, 'NOMBRE', 0);
$pdf->Cell(25, 5, 'MARCA', 0);
$pdf->Cell(25, 5, 'CANTIDAD', 0);
$pdf->Cell(25, 5, 'PRECIO', 0);
$pdf->Cell(25, 5, 'SUBTOTAL', 0);




$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 10);
//CONSULTA
$total=0;
		$tabla='<table border="1"><tr>
		<th>Nombre</th>
		<th>Marca</th>
		
		<th>Cantidad</th>
		<th>Precio</th>
		<th>Subtotal</th></tr>';
		for($i=0;$i<count($arreglo);$i++){
			
			$tabla=$tabla.'<tr>
			<td>'.$arreglo[$i]['Nombre'].'</td>
			<td>'.$arreglo[$i]['Marca'].'</td>
		
			<td>'.$arreglo[$i]['Cantidad'].'</td>
			<td>'.$arreglo[$i]['Precio'].'</td>
			<td>'.$arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'].'</td>
			</tr>';
			$total=$total+($arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']);			
		}
		$tabla.'</table>';

$pdf->Output();

?>