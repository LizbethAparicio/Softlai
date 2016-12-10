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
    if ($ncapa==3){//CAPA 3 PARA GUARDAR DATOS
      
      $nombre=$_REQUEST['nombre']; 
      $marca=$_REQUEST['marca']; 
      $cantidad=$_REQUEST['cantidad'];
      $precio=$_REQUEST['precio'];
      $unidad=$_REQUEST['unidad'];
      
      ob_start();
      $tipo = $_FILES["file"]["type"];
            $contenido = $_FILES["file"]["tmp_name"];
            $tamanio= $_FILES["file"]["size"];
            $nfoto = basename($_FILES["file"]["name"]);
      if (!strpos($tipo,"gif") and !strpos($tipo,"jpg") and !strpos($tipo,"jpeg") and !strpos($tipo,"png")) { 
        $error="El Formato $tipo es Incompatible..........";
        session_start();
         $_SESSION['nombre']=$nombre;
        $_SESSION['marca']=$marca;
        $_SESSION['cantidad']=$cantidad;
        $_SESSION['precio']=$precio;
        $_SESSION['unidad']=$unidad;
      
        $_SESSION['error']=$error;
        header("location:registrarproductos.php");exit();
      }
      if($tamanio>500000000){//500kb
        $error="El Tamaño del Archivo es muy Grande: $tamanio ..........";
        session_start();
        $_SESSION['nombre']=$nombre;
        $_SESSION['marca']=$marca;
        $_SESSION['cantidad']=$cantidad;
        $_SESSION['precio']=$precio;
        $_SESSION['unidad']=$unidad;
      
        $_SESSION['error']=$error;
        header("location.registrarproductos.php");exit();
      }
      if ($contenido=="none"){
        $error="Seleccione un archivo valido..........";
        header("location:index2.php?ncapa=$ncapa&error=$error");exit();       
      }else{
        # Contenido del archivo
            $fp = fopen($contenido, "rb");
         $contenido = fread($fp, $tamanio);
         $contenido = addslashes($contenido);
         fclose($fp); 
        $variable1="insert into productos"; 
        $campos=" (nombre_producto,marca,cantidad,precio,id_unidadR,nfoto,foto,tamanio,tipo)";
        $valores=" values('$nombre','$marca','$cantidad','$precio','$unidad','$nfoto','$contenido',$tamanio,'$tipo')";
        $rs=mysql_query($variable1.$campos.$valores,$conexion);
        if(!$rs){
            echo $error="Error al guardar ".mysql_error();
            session_start();
           $_SESSION['nombre']=$nombre;
        $_SESSION['marca']=$marca;
        $_SESSION['cantidad']=$cantidad;
        $_SESSION['precio']=$precio;
        $_SESSION['unidad']=$unidad;
      
            $_SESSION['error']=$error;
            header("location:registrarproductos.php");exit();
        }else
        {
            header("location:registrarproductos.php");exit();
        }
      }
      ob_end_flush();     
    }//FIN CAPA 3 PARA GUARDAR DATOS
    
  
  }
  mysql_close($conexion);
?>

