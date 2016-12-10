<?php

require_once("dompdf/dompdf_config.inc.php");

$codigoHTML='
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<h3><CENTER><strong>REPORTE DE LOS PROVEDORES</strong></CENTER></h3>
  </tr>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <tr > 
    <td><strong>RFC</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>APELLIDOS</strong></td>
    <td><strong>CIUDAD</strong></td>
     <td><strong>ESTADO</strong></td>
     <td><strong>COLONIA</strong></td>
      <td><strong>CALLE/NUM</strong></td>
     <td><strong>C.P</strong></td>
     <td><strong>TELEFONO</strong></td> 
     </tr>';
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
       if ($criterios=='Usuario') {
            $sql="SELECT rfc_proveedor,nombre,apellidos,calle_y_numero,colonia,ciudad,estado,codigo_postal,telefono FROM  proveedor WHERE nombre LIKE '$buscar1%' ORDER BY rfc_proveedor";
       }
        if ($criterios=='Todos') {
                $sql="SELECT rfc_proveedor,nombre,apellidos,calle_y_numero,colonia,ciudad,estado,codigo_postal,telefono FROM  proveedor  ORDER BY rfc_proveedor"; 
        }
}
require('conexion.php');
$rs = mysql_query($sql);
while($res=mysql_fetch_array($rs)){
$codigoHTML.='  
    <tr>
        <td>'.$res['rfc_proveedor'].'</td>
        <td>'.$res['nombre'].'</td>
        <td>'.$res['apellidos'].'</td>
        <td>'.$res['ciudad'].'</td>
        <td>'.$res['estado'].'</td>
        <td>'.$res['colonia'].'</td>
        <td>'.$res['calle_y_numero'].'</td>
        <td>'.$res['codigo_postal'].'</td>
        <td>'.$res['telefono'].'</td>     
                                            
    </tr>';
    
}
$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_de_provedores.pdf");
?>