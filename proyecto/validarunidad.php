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
    
    $unidad=$_POST['unidad'];
   
       
   

$registro=mysql_query("select descripcion from unidad where  descripcion='".$unidad."'  ") or die("Error:".mysql_error());

if ($reg=mysql_fetch_array($registro))
{
 if( $_SESSION['unidad']=$reg['unidad']){
  $_SESSION = array();

  echo"  <script type='text/javascript'>
 alert('Ya existe este tipo de unidad ');window.location='registrarunidad.php';
      </script>";
 
}
}
else
{

  $regis="insert into unidad(descripcion) values('".$unidad."')";    
  $insertar=mysql_query($regis);
 echo"  <script type='text/javascript'>
 alert('La unidad se ha registrado con exito');window.location='registrarunidad.php';
      </script>";
    }

mysql_close($conexion);
?>

