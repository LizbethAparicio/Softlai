<?php
session_start();
$v=intval($_SESSION['validacion']);
if($v!=1){
  session_destroy();
  header("Location:index.html"); 
  exit(); 
}
?>

<?php
   include('conexion.php');
    $rfc=$_POST['rfc_prove']; 
    $fecha=$_POST['fecha'];
    $producto=$_POST['producto'];
    $cantidad=$_POST['cantidad'];
    $precio=$_POST['precio'];
    $subtotal=$_POST['subtotal'];  
    $iva=$_POST['iva']; 
    $total=$_POST['total']; 


  $regis="insert into entradas(rfc_proveR,fecha,subtotal,iva,total) 
  values('".$rfc."','".$fecha."','".$subtotal."','".$iva."','".$total."')"; 

  $insertar=mysql_query($regis);

  $query= mysql_query("SELECT MAX(identradas) FROM entradas");
             if ($row = mysql_fetch_row($query)) 
            {
              $ultimo = trim($row[0]);
              }


  $regis2="insert into detalle_entradas(id_entradasR,cantidad,id_pruductoR,precio,total) 
  values('".$ultimo."','".$cantidad."','".$producto."','".$precio."','".$total."')"; 
  $insertar2=mysql_query($regis2);

  $registro=mysql_query("select cantidad from productos  ") or die("Error:".mysql_error());
  $reg=mysql_fetch_array($registro);

$suma=$cantidad+$reg['cantidad'];

 $sqls =  mysql_query("UPDATE productos SET cantidad='$suma' where idproductos='$producto'");
   
 $suma="0";
 
   echo"  <script type='text/javascript'>
 alert('Se ha registrado con exito tu entrada');window.location='registrarentradas.php';
      </script>";
mysql_close($conexion);
?>

