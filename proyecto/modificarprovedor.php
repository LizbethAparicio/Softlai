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
                    <h4>Modificar Datos del Producto</h4>
                  </div> 
            <div id="cuerpo"> 
            <table cols="3" border="0" align="center" cellpadding="2" cellspacing="4">
<form name="form5" action="datosprovedor.php" method="POST" enctype="multipart/form-data">
    <?php
        include("conexion.php");
          if(isset($_REQUEST['rfc5'])){
        $rfc5=$_REQUEST['rfc5'];
        $result1=mysql_query("select * from proveedor where rfc_proveedor='$rfc5'",$conexion); 
        if (mysql_num_rows($result1)>=1) {
          while ($row=mysql_fetch_array($result1))
          {
            $rfc5=$row["rfc_proveedor"];
            $nombre5=$row["nombre"];
            $apellido5=$row["apellidos"];
            $ciudad5=$row["ciudad"];
            $estado5=$row["estado"];
            $colonia5=$row["colonia"];
            $calle5=$row["calle_y_numero"];
            $cp5=$row["codigo_postal"];
            $telefono5=$row["telefono"];
            

                       
          }
     ?>        
                <tr align="center" ><td>NOMBRE:</td><td>
                    <input name="nombre5" type="text"  pattern="^[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)$*" autofocus required="" maxlength="60" value="<?php echo $nombre5;?>"/></td></tr>

               <tr align="center" ><td>APELLIDOS:</td><td>
                    <input name="apellido5" type="text" pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" autofocus required="" maxlength="60" value="<?php echo $apellido5;?>" /> </td></tr>                    
                
                <tr align="center" ><td>CIUDAD:</td><td>
                    <input name="ciudad5" type="text"  pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" autofocus required="" maxlength="60" value="<?php echo $ciudad5;?>"/></td></tr>
               
                <tr align="center" ><td>ESTADO:</td><td>
                    <input name="estado5" type="text" pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" autofocus required="" maxlength="60" value="<?php echo $estado5;?>"/> </td></tr>
                
                <tr align="center" ><td>COLONIA:</td><td>
                    <input name="colonia5" type="text" pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" autofocus required="" maxlength="60" value="<?php echo $colonia5;?>"/></td></tr>
                
                <tr align="center" ><td> CALLE/NUM:</td><td>
                    <input name="calle5" type="text" autofocus required="" maxlength="60" value="<?php echo $calle5;?>"/></td></tr>      

                <tr align="center" ><td>CODIGO POSTAL:</td><td>               
                    <input name="cp5" type="text" pattern="^[0-9]{5}$" autofocus required="" maxlength="5" value="<?php echo $cp5;?>"/></td></tr>                     
                
                <tr align="center" ><td>TELEFONO:</td><td>
                    <input name="telefono5" type="text" pattern="^[0-9]{10}$"  autofocus required="" maxlength="10" value="<?php echo $telefono5;?>"/>          </td></tr>
             
             <tr align="center"><td colspan="2"><input  class="boton" type="button" name="Actualizar" value="Actualizar Datos" onclick="actualiza()"/></td></tr>

        
          <tr align="center"><td colspan="3">         
          <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />
          <input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />
          <input type="hidden" name="g" value="<?php echo $g;?>" />
          <input type="hidden" name="b" value="<?php echo $b;?>" />
          <input type="hidden" name="af" value="<?php echo $af;?>" />
          </td></tr>  
          
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