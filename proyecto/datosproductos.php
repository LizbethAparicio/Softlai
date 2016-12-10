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
			$marca5=$_REQUEST['marca5']; 
			$descripcion5=$_REQUEST['descripcion5']; 
			
   			$variable1="update productos set "; 

			$campos="nombre_producto='$rfc5',marca='$marca5',id_unidadR='$descripcion5'";
			$criterio=" where nombre_producto='$rfc5'";

			$rs=mysql_query($variable1.$campos.$criterio,$conexion);

			echo $rs=mysql_affected_rows($rs); 
			if($rs==1)
			{
					$ncapa='4';
				
					header("location:busqproductos.php");exit();
			}
			else
			{
					$ncapa='5';
					$error="Error al Guardar ".mysql_error();
					//echo $variable1.$campos.$criterio;
				
					session_start();
					$_SESSION['rfc5']=$rfc5;
					$_SESSION['error']=$error;
					header("location:busqproductos.php");exit();
			}
		}//FIN CAPA 5 PARA ACTUALIZAR DATOS

		if ($ncapa==5 && $af==1){//CAPA 5 PARA ACTUALIZAR FOTO
			echo $ncapa.''.$af;
			$rfc5=$_REQUEST['rfc5'];
			ob_start();
			$tipo = $_FILES["file2"]["type"];
            $contenido = $_FILES["file2"]["tmp_name"];
            $tamanio= $_FILES["file2"]["size"];
            $nfoto = basename($_FILES["file2"]["name"]);
			if (!strpos($tipo,"gif") & !strpos($tipo,"jpg") & !strpos($tipo,"jpeg") & !strpos($tipo,"png")) { 
				$error="El Formato ".$tipo." es Incompatible..........";
				session_start();
				$_SESSION['rfc5']=$rfc5;
				$_SESSION['error']=$error;
				header("location:busqueda.php");

				exit();
			}
			if($tamanio>500000){//500kb
				$error="El Tamaño del Archivo es muy Grande: $tamanio ..........";
				session_start();
				$_SESSION['rfc5']=$rfc5;
				$_SESSION['error']=$error;
				header("location:busqproductos.php");exit();
			}
			if ($contenido=="none"){
				$error="Seleccione un archivo valido..........";
				session_start();
				$_SESSION['rfc5']=$rfc5;
				$_SESSION['error']=$error;
				header("location:busqproductos.php");exit();				
			}else{
 				# Contenido del archivo
		        $fp = fopen($contenido, "rb");
        		$buffer = fread($fp, filesize($contenido));
                fclose($fp);
				$buffer=addslashes($buffer);
				$variable1="update productos set nfoto='$nfoto',foto='$buffer',tipo='$tipo',tamanio=$tamanio where nombre_producto='$rfc5'";
				@$rs=mysql_query($variable1,$conexion);
				//$rs=mysql_affected_rows($rs); 
				if($rs==1)
				{
					$ncapa='4';
					header("location:busqproductos.php");exit();
				}
				else
				{
					$ncapa='5';
					$error="Error al Guardar ".mysql_error();
					session_start();
					$_SESSION['rfc5']=$rfc5;
					$_SESSION['nombre5']=$nombre5;
					$_SESSION['error']=$error;
					header("location:busqproductos.php");exit();
				}
			}
			ob_end_flush();	
		}//FIN CAPA 5 PARA ACTUALIZAR FOTOS
	
		
	}
	mysql_close($conexion);
?>

