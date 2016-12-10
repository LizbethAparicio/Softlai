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
    $rfc=$_POST['rfc_client']; 
    $fecha=$_POST['fecha'];    
    $cantidad=$_POST['cantidad'];
    $producto=$_POST['producto'];
   


  $regis="insert into salidas(rfc_clienteR,fecha) 
  values('".$rfc."','".$fecha."')"; 

  $insertar=mysql_query($regis);

  $query= mysql_query("SELECT MAX(idsalidas) FROM salidas");
             if ($row = mysql_fetch_row($query)) 
            {
              $ultimo = trim($row[0]);
              }


  $regis2="insert into detalle_salidas(id_salidaR,cantidad,id_productooR) 
  values('".$ultimo."','".$cantidad."','".$producto."')"; 
  $insertar2=mysql_query($regis2);

  $registro=mysql_query("select cantidad from productos  ") or die("Error:".mysql_error());
  $reg=mysql_fetch_array($registro);

$resta=$reg['cantidad']-$cantidad;

 $sqls =  mysql_query("UPDATE productos SET cantidad='$resta' where idproductos='$producto'");
   
 $resta="0";
 
   echo"  <script type='text/javascript'>
 alert('Se ha registrado con exito tu salida');window.location='registrarsalidas.php';
      </script>";
mysql_close($conexion);
?>

