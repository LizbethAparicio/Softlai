<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_de_provedores.doc");


?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="9" bgcolor="skyblue"><CENTER><strong>REPORTE DE LOS PROVEDORES</strong></CENTER></td>
  </tr>
  <tr>
   <td><strong>RFC</strong></td>
    <td><strong>Nombre</strong></td>
    <td><strong>Apellidos</strong></td>
    <td><strong>Ciudad</strong></td>
     <td><strong>Estado</strong></td>
     <td><strong>Colonia</strong></td>
      <td><strong>Calle/Num</strong></td>
     <td><strong>C.P</strong></td>
     <td><strong>Telefono</strong></td> 
     </tr>
  
<?PHP
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

   $rfc=$res["rfc_proveedor"];
   $nombre=$res["nombre"];
   $apellido=$res["apellidos"];
   $ciudad=$res["ciudad"];
   $estado=$res["estado"];  
   $colonia=$res["colonia"];; 
   $calle=$res["calle_y_numero"];
   $codigo=$res["codigo_postal"];
   $telefono=$res["telefono"];             

?>  
 <tr>
   <td><?php echo $rfc; ?></td>
   <td><?php echo $nombre; ?></td>
   <td><?php echo $apellido; ?></td>
   <td><?php echo $ciudad; ?></td>
   <td><?php echo $estado; ?></td>
   <td><?php echo $colonia; ?></td>  
   <td><?php echo $calle; ?></td>
   <td><?php echo $codigo; ?></td>
   <td><?php echo $telefono; ?></td>                    
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>