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
<h3><CENTER><strong>REPORTE DE LOS PRODUCTOS</strong></CENTER></h3>
  </tr>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <tr > 
    <td><strong>PRODUCTO</strong></td>
    <td><strong>MARCA</strong></td>
    <td><strong>CANTIDAD</strong></td>
    <td><strong>PRECIO</strong></td>     
     </tr>';
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
      if ($criterios=='Usuario') {
         $sql="SELECT nombre_producto,marca,cantidad,precio FROM  productos WHERE nombre_producto LIKE '$buscar1%' ORDER BY nombre_producto"; 
      }
      if ($criterios=='Todos') {
            $sql="SELECT nombre_producto,marca,cantidad,precio FROM  productos  ORDER BY nombre_producto";  
      }
}
require('conexion.php');
$rs = mysql_query($sql);
while($res=mysql_fetch_array($rs)){
$codigoHTML.='  
    <tr>
        <td>'.$res['nombre_producto'].'</td>
        <td>'.$res['marca'].'</td>
        <td>'.$res['cantidad'].'</td>
        <td>'.$res['precio'].'</td>
         
                                            
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
$dompdf->stream("Reporte_de_productos.pdf");
?>