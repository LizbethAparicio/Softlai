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
    
    $departamento=$_POST['departamento'];
   
       
   

$registro=mysql_query("select nombre_departamento from departamentos where  nombre_departamento='".$departamento."'  ") or die("Error:".mysql_error());

if ($reg=mysql_fetch_array($registro))
{
 if( $_SESSION['departamento']=$reg['departamento']){
  $_SESSION = array();

  echo"  <script type='text/javascript'>
 alert('Ya existe este departamento registra otro diferente');window.location='departamentos.php';
      </script>";
 
}
}
else
{

  $regis="insert into departamentos(nombre_departamento) values('".$departamento."')";    
  $insertar=mysql_query($regis);
 echo"  <script type='text/javascript'>
 alert('El departamento se ha registrado con exito');window.location='registrodepartamentos.php';
      </script>";
    }

mysql_close($conexion);
?>

