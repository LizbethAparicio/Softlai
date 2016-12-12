<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_de_clientes.doc");


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
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LOS CLIENTES</strong></CENTER></td>
  </tr>
  <tr >
  <td><strong>RFC</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>APELLIDOS</strong></td>
    <td><strong>DEPARTAMENTO</strong></td> 
    <td><strong>TELEFONO</strong></td>
    <td><strong>EMAIL</strong></td>
     </tr>
  
<?PHP
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
     if ($criterios=='Usuario') {
      $sql="SELECT rfc_clientes,nombre,apellidos,id_departamento,telefono,email,nombre_departamento FROM  clientes INNER JOIN departamentos ON clientes.id_departamento=iddepartamento WHERE nombre LIKE '$buscar1%' ORDER BY rfc_clientes";  
     }
    if ($criterios=='Todos') {
       $sql="SELECT rfc_clientes,nombre,apellidos,id_departamento,telefono,email,nombre_departamento FROM  clientes INNER JOIN departamentos ON clientes.id_departamento=iddepartamento WHERE nombre LIKE '$buscar1%' ORDER BY rfc_clientes";   
    }
}
require('conexion.php');
$rs = mysql_query($sql);
while($res=mysql_fetch_array($rs)){      

   $rfc=$res["rfc_clientes"];
   $nombre=$res["nombre"];
   $apellidos=$res["apellidos"];
   $departamento=$res["nombre_departamento"];
    $telefono=$res["telefono"];
   $email=$res["email"];
               

?>  
 
   <td><?php echo $rfc; ?></td>
   <td><?php echo $nombre; ?></td>
   <td><?php echo $apellidos; ?></td>
   <td><?php echo $departamento; ?></td>
   <td><?php echo $telefono; ?></td>
   <td><?php echo $email; ?></td>
                  
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>