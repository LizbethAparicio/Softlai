

<!--registro-->
<?php
   include('conexion.php');
    $rfc=$_POST['rfc'];    
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $departamento=$_POST['iddepa'];
    $telefono=$_POST['telefono'];
    $usuario=$_POST['usuario'];    
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $email=$_POST['correo'];
          

$registro=mysql_query("select rfc_clientes from clientes where  rfc_clientes='".$rfc."'  ") or die("Error:".mysql_error());

if ($reg=mysql_fetch_array($registro))
{
 if($_SESSION['rfc']=$reg['rfc_clientes']  ){
  $_SESSION = array();
echo"  <script type='text/javascript'>
 alert('Ya existe un usuario con estos datos');window.location='registrarse.php';
      </script>";

  
}
}
else
{

if ($password1==$password2){
  $password=md5($password1);
    $regis="insert into clientes values('".$rfc."','".$nombre."','".$apellido."',
      '".$departamento."','".$telefono."','".$usuario."','".$password."','".$email."',2)";    
  $insertar=mysql_query($regis);
   echo"  <script type='text/javascript'>
 alert('El usuario se ha registrado con exito');window.location='registrarse.php';
      </script>";
//eeeeeeeeeeeeeeeeeeeeeeeeeeeeeenvio de correooooooooooooooooooooooooooooooooo-->
include_once('class.phpmailer.php');
include_once('class.smtp.php');
@$para=$_POST['correo'];
@$user = $_POST['usuario'];
@$pass = $_POST['password1'];
@$pas= $_POST['password2'];  
         
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
 $mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username ='navitlalpa@gmail.com';
$mail->Password =  'dragonesksi';
$mail->AddAddress($para);
$mail->Subject ="Datos para acceder al sistema de Control de Inventario";
$mail->Body = $pass;
$mail->MsgHTML("Accede con estos datos para realizar pedidos <br><br>Usuario: ".$user."<br> <br> Password: ".$pass."<br>");
if($mail->Send())
 {
echo "Los datos se han enviado Correctamente";
}
else{
  echo "Error al enviar los datos ";
}
//fin de envio-
  ////
$contenido="Usuario: ".$usuario."\nPassword: ".$password1;
mail($email,"datos para acceder al sistema y hacer solicitudes de materiales", $contenido);
//////
}else{
  echo "Las password no coinciden";
}
}

mysql_close($conexion);
?>
