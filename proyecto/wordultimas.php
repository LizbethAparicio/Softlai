<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_de_provedores.doc");


?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE SOLICITUDES</title>
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