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
  include("conexion.php");
 $rfc=$_REQUEST['nombre_producto'];
 $con="SELECT tipo, foto, nfoto FROM productos WHERE nombre_producto='$rfc' ";
 $res = mysql_query($con,$conexion); 
 $tipo = mysql_result($res, 0, "tipo"); 
 $contenido = mysql_result($res, 0, "foto"); 
 $nombre= mysql_result($res, 0, "nfoto"); 
 header("Content-type: $tipo"); 
 header("Content-Disposition: ; filename=\"$nombre\""); 
 print $contenido;  
?>



