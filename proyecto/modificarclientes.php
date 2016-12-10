<?php
session_start();
$v=intval($_SESSION['validacion']);
if($v!=1){
  session_destroy();
  header("Location:index.html"); 
  exit(); 
}
?>


<!DOCTYPE html>
<html>
<head>
 <link href="css/styleweb.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="js/validaciones.js"></script>
</head>
<body style="border:0px; background-color: #FEFEFE; margin-top:10px;">
  <div id="envoltura">
        <div id="contenedor"> 
            <div id="cabecera">
                    <h4>Modificar Datos del Cliente</h4>
                  </div> 
            <div id="cuerpo"> 
            <table cols="3" border="0" align="center" cellpadding="2" cellspacing="4">
<form name="form5" action="datoscliente.php" method="POST" enctype="multipart/form-data">
    <?php
        include("conexion.php");
          if(isset($_REQUEST['rfc5'])){
        $rfc5=$_REQUEST['rfc5'];
        $result1=mysql_query("select * from clientes where rfc_clientes='$rfc5'",$conexion); 
        if (mysql_num_rows($result1)>=1) {
          while ($row=mysql_fetch_array($result1))
          {
            $rfc5=$row["rfc_clientes"];
            $nombre5=$row["nombre"];
            $apellido5=$row["apellidos"];
            $telefono5=$row["telefono"];
            $usuario5=$row["usuario"];

            $email5=$row["email"];
                       
          }
     ?>        

                      <tr align="right" ><td>NOMBRE:</td><td>
                       <input name="nombre5" type="text"  autofocus required="" maxlength="60" pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" value="<?php echo $nombre5;?>"/></td></tr>
                      
                      <tr align="right" ><td> APELLIDOS:</td><td>
                       <input name="apellido5" type="text" autofocus required="" maxlength="60"
                       pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" value="<?php echo $apellido5;?>" /></td></tr>
                     
                     <tr align="right" ><td>TELEFONO:</td><td>
                       <input name="telefono5" type="text" autofocus required="" maxlength="10" pattern="^[0-9]{10}$" value="<?php echo $telefono5;?>"  /></td></tr>
                      
                     <tr align="right" ><td> USUARIO:</td><td>
                       <input name="usuario5" type="text"  autofocus required="" maxlength="60" value="<?php echo $usuario5;?>" /></td></tr>
                      
            
          
         <tr align="right" ><td> Email:</td><td>
         <input type="text"  name="email5"   pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  required="" value="<?php echo $email5;?>"> </td></tr>

             
             <tr align="center"><td colspan="2">


          <input type="button" name="Actualizar" value="Actualizar Datos" class="boton" onclick="actualiza()"/></td></tr>
        
          <tr align="center"><td colspan="3">         
          <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />
          <input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />
          <input type="hidden" name="g" value="<?php echo $g;?>" />
          <input type="hidden" name="b" value="<?php echo $b;?>" />
          <input type="hidden" name="af" value="<?php echo $af;?>" />
          </td></tr>  
          </table>
            <?php }
        else{
          echo"<BR><CENTER><H3>NO HAY DATOS</CENTER></H3>";
        }
        mysql_close($conexion);
        }
?>
       
     </form> 
</table>
</div> 
            <div id="pie"></div>
        </div><!-- fin contenedor -->
      </div>
</body>
</html>