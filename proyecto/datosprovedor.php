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
	$ncapa=$_REQUEST['ncapa']; 
	//$af=$_REQUEST['af'];
	if(isset($_REQUEST['g']))$g=$_REQUEST['g'];
	if(isset($_REQUEST['b']))$b=$_REQUEST['b'];
	if(isset($_REQUEST['af']))$af=$_REQUEST['af'];
	include("conexion.php"); 
	if(!$conexion)
	{
			echo "No se pudo conectar con la base de datos";
	}else{
	
		if ($ncapa==5 && $g==1){//CAPA 5 PARA ACTUALIZAR DATOS
			$rfc5=$_REQUEST['rfc5']; 
			$nombre5=$_REQUEST['nombre5']; 
			$apellido5=$_REQUEST['apellido5'];
			$ciudad5=$_REQUEST['ciudad5'];
			$estado5=$_REQUEST['estado5'];
			$colonia5=$_REQUEST['colonia5'];
			$calle5=$_REQUEST['calle5'];
			$cp5=$_REQUEST['cp5'];
			$telefono5=$_REQUEST['telefono5'];

   			$variable1="update proveedor set "; 

			$campos="rfc_proveedor='$rfc5',nombre='$nombre5',apellidos='$apellido5',ciudad='$ciudad5',estado='$estado5',colonia='$colonia5',calle_y_numero='$calle5',codigo_postal='$cp5',telefono='$telefono5'";
			$criterio=" where rfc_proveedor='$rfc5'";
			$rs=mysql_query($variable1.$campos.$criterio,$conexion);

			echo $rs=mysql_affected_rows($rs); 
			if($rs==1)
			{
					$ncapa='4';
				
					header("location:busqprovedor.php");exit();
			}
			else
			{
					$ncapa='5';
					$error="Error al Guardar ".mysql_error();
					//echo $variable1.$campos.$criterio;
				
					session_start();
					$_SESSION['rfc5']=$rfc5;
					$_SESSION['error']=$error;
					header("location:busqprovedor.php");exit();
			}
		}//FIN CAPA 5 PARA ACTUALIZAR DATOS
		
	}
	mysql_close($conexion);
?>

