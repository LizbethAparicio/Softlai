<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_de_productos.doc");


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
    <td colspan="4" bgcolor="skyblue"><CENTER><strong>REPORTE DE LOS PRODUCTOS</strong></CENTER></td>
  </tr>
  <tr>
   <td><strong>PRODUCTO</strong></td>
    <td><strong>MARCA</strong></td>
    <td><strong>CANTIDAD</strong></td>
    <td><strong>PRECIO</strong></td> 
     </tr>
  
<?PHP
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

   $producto=$res["nombre_producto"];
   $marca=$res["marca"];
   $cantidad=$res["cantidad"];
   $precio=$res["precio"];
               

?>  
 
   <td><?php echo $producto; ?></td>
   <td><?php echo $marca; ?></td>
   <td><?php echo $cantidad; ?></td>
   <td><?php echo $precio; ?></td>
                  
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>