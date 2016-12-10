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
<html lang="es">
<head>
    <title>PRODUCTO</title> 
    
     <link href="css/styleweb.css" rel="stylesheet" type="text/css"> 
 <script type="text/javascript"  src="js/validaciones.js"></script>
</head> 
<body style="border:0px; background-color: #FEFEFE; margin-top:10px;">
     
        <div id="envolturaregistro">
        <div id="contenedor"> 
            <div id="cabecera">
                    <h3 id="p">REGISTRAR PRODUCTOS<h3>
                  </div> 
            <div id="cuerpo"> 
<table cols="2" border="0" align="center" cellpadding="0" cellspacing="4">
             <form name="form1" action="validarproductos.php" method="post" enctype="multipart/form-data">
                 <tr align="right" ><td align="right">NOMBRE :</td><td align="left">               
                  <input name="nombre" required="" type="text" value="" autofocus  maxlength="60"/></td></tr>
                  
                  <tr align="right" ><td  align="right">MARCA:</td><td align="left">
                   <input name="marca" type="text" value="" autofocus required="" maxlength="60"/></td></tr>
                   
               <!--  <tr align="right" ><td>CANTIDAD:</td><td>
                  <input name="cantidad" type="text" value="" autofocus required="" maxlength="60"/></td></tr>-->
                     
                  <tr align="right" ><td align="right">PRECIO:</td><td align="left">
                  <input name="precio" type="text" value="" autofocus required="" maxlength="60"/></td></tr>
                    
                       <tr align="right" ><td align="right">UNIDAD:</td><td align="left">      
                  <select name="unidad">
                      <?php
                      include("conexion.php");
                      echo ' <option value="0" selected="Selecciona" required="">Selecciona</option>';
                  $consulta=mysql_query("select * from unidad ") or die("Error:".mysql_error());


                      while($reg=mysql_fetch_array($consulta)){
                        echo '<option
                               value="'.$reg['id_unidad'].'">'.$reg['descripcion'].'</option>';
                               echo "";
                             }
                      ?>

                     </select>
                     </td></tr>


<tr ><td colspan="2" align="left"><input name="file" type="file" class="texto2" size="10" maxlength="80"></td></tr>           

             <tr align="center"><td colspan="2">
             
             <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
        <input type="button" name="enviar" value="Guardar" onclick="valida()"/>
        <input type="reset" name="reestablecer"/>
        <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />          
             </td></tr>                     
                </form>
                </table>
              </div> 
            <div id="pie"></div>
        </div><!-- fin contenedor -->
      </div>
    </body> 
</html>

