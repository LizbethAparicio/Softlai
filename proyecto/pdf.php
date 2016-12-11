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
<h3><CENTER><strong>REPORTE DE LOS CLIENTES</strong></CENTER></h3>
  </tr>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <tr > 
    <td><strong>RFC</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>APELLIDOS</strong></td>
    <td><strong>DEPARTAMENTO</strong></td> 
    <td><strong>TELEFONO</strong></td>
    <td><strong>EMAIL</strong></td>     
     </tr>';
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
     if ($criterios=='Usuario') {
      $sql="SELECT rfc_clientes,nombre,apellidos,id_departamento,telefono,email,nombre_departamento FROM  clientes INNER JOIN departamentos ON clientes.id_departamento=iddepartamento WHERE nombre LIKE '$buscar1%' ORDER BY rfc_clientes";  
     }
    if ($criterios=='Todos') {
        $sql="SELECT rfc_clientes,nombre,apellidos,id_departamento,telefono,usuario,email,nombre_departamento  FROM  clientes INNER JOIN departamentos ON clientes.id_departamento=iddepartamento WHERE nombre LIKE '$buscar1%' ORDER BY rfc_clientes";  
    }
}
require('conexion.php');
$rs = mysql_query($sql);
while($res=mysql_fetch_array($rs)){
$codigoHTML.='  
    <tr>
        <td>'.$res['rfc_clientes'].'</td>
        <td>'.$res['nombre'].'</td>
        <td>'.$res['apellidos'].'</td>
        <td>'.$res['nombre_departamento'].'</td>
        <td>'.$res['telefono'].'</td>
        <td>'.$res['email'].'</td>
         
                                            
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
$dompdf->stream("Reporte_de_clientes.pdf");
?>