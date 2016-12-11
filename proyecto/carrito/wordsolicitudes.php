<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_de_solicitudes.doc");


?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
<img src="images/sep.png">
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="9" bgcolor="skyblue"><CENTER><strong>REPORTE DE LAS SOLICITUDES</strong></CENTER></td>
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
            echo '<tr><td colspan="5" cellpadding="3px" cellspacing="3px">Compra Número: '.$f['numeroventa'].' </td></tr>';
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