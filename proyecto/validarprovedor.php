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
    $rfc=$_POST['rfc'];    
    $nombre=$_POST['nombre'];
     $apellidos=$_POST['apellidos'];
     $ciudad=$_POST['ciudad'];
     $estado=$_POST['estado'];
     $colonia=$_POST['colonia']; 
     $calle=$_POST['calle']; 
     $cp=$_POST['cp']; 
     $telefono=$_POST['telefono'];

   

$proveedor=mysql_query("select * from proveedor where  rfc_proveedor='".$rfc."' ") or die("Error:".mysql_error());

if ($reg=mysql_fetch_array($proveedor))
{
 $_SESSION['rfc']=$reg['rfc_proveedor'];
  $_SESSION = array();
   echo"  <script type='text/javascript'>
 alert('Ya existe un usuario con estos datos');window.location='registroprovedor.php';
      </script>";


}
else
{

    $regis="INSERT INTO proveedor (rfc_proveedor,nombre,apellidos,ciudad,estado,colonia,calle_y_numero,codigo_postal,telefono)
     VALUES('".$rfc."','".$nombre."','".$apellidos."','".$ciudad."','".$estado."','".$colonia."','".$calle."','".$cp."','".$telefono."')";    
  $insertar=mysql_query($regis);
   echo"  <script type='text/javascript'>
 alert('El proveedor se ha registrado con exito');window.location='registroprovedor.php';
      </script>";
  

}

mysql_close($conexion);
?>

