<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_de_solicitudes.xls");

require('conexion.php');
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
    <td colspan="5" bgcolor="skyblue"><CENTER><strong>REPORTE DE LAS SOLICITUDES</strong></CENTER></td>
  </tr>
  <tr>
   <td><strong>Nombre</strong></td>
    <td><strong>Marca</strong></td>
    <td><strong>Precio</strong></td>
    <td><strong>cantidad</strong></td>
     <td><strong>subtotal</strong></td>
     
     </tr>
  
<?php
    include "conexion.php";
      $re=mysql_query("select * from compras");
      $numeroventa=0;
      while ($f=mysql_fetch_array($re)) {
          if($numeroventa !=$f['numeroventa']){
            echo '<tr><td colspan="5" cellpadding="3px" cellspacing="3px"><h3>Compra Número:'.$f['numeroventa'].'</h3>  </td></tr>';
          }
          $numeroventa=$f['numeroventa'];
          echo '<tr>
            
            <td>'.$f['nombre'].'</td>
            <td>'.$f['marca'].'</td>
            <td>'.$f['precio'].'</td>
            <td>'.$f['cantidad'].'</td>
            <td>'.$f['subtotal'].'</td>

          </tr>';
      }
    ?>
</table>
</body>
</html>