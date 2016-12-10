						
<?php

include('conexion.php');
include 'simpletetst/autorun.php';
$usuario=$_REQUEST['usuario'];
$password=$_REQUEST['password'];
 
$pas=md5($password);

$registro=mysql_query("select * from clientes where usuario='$_REQUEST[usuario]'  and password='$pas' ") or die("Error:".mysql_error());

$row=mysql_fetch_array($registro);
 if( $_SESSION['usuario']=$row['usuario'] and $_SESSION['password']=$row['password']  ){

 if ($row['cargo'] == 1) {
         session_start();
        //variable de sesion llamada validacion igual a 1
        //el valor de la sesion equivale a 1
        $_SESSION['validacion'] = 1 ;
        header("location:template.php");//autentificacion de manera local
        ////////echo "<script>location.href='template.php'</script>";/////autentificacion en el hosting
       
      //si es 2 hara lo siguiente mostrara vista clientes
      }
      else  if($row['cargo'] == 2){
        session_start();

       $_SESSION['validacion'] = 1 ;
        header("location:templateuser.php");//autentificacion de manera local
        ////////echo "<script>location.href='template.php'</script>";/////autentificacion en el hosting

        
       }}
       else{
        echo"  <script type='text/javascript'>
 alert('Datos Incorrectos');window.location='sesion.php';
      </script>";

       }
       	

?>
