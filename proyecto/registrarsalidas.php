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
    <title>SALIDAS</title>
    <meta charset="utf-8">
     <link href="css/styleweb.css" rel="stylesheet" type="text/css"> 
 
</head> 
<body style="border:0px; background-color: #FEFEFE; margin-top:10px;">
     
        <div id="envoltura">
        <div id="contenedor"> 
            <div id="cabecera">
                    <h3 id="p">REGISTRAR SALIDAS<h3>
                  </div> 
            <div id="cuerpo"> 
              <table cols="2" border="0" align="center" cellpadding="0" cellspacing="4">
               <form  action="validarsalidas.php" method="post" >
               <tr align="right" ><td>Cliente:</td>
    
   <td><select name="rfc_client">
                      <?php
                      include("conexion.php");
                      echo ' <option value="0" selected="Selecciona" required="">Selecciona</option>';
                  $consulta=mysql_query("select * from clientes ") or die("Error:".mysql_error());


                      while($reg=mysql_fetch_array($consulta)){
                        echo '<option
                               value="'.$reg['rfc_clientes'].'">'.$reg['nombre'].'</option>';
                               echo "";
                             }
                      ?>
                     </select>
       </td>    
   </tr>
   <tr align="right"><td>Fecha:</td>
      <td><input name="fecha" type="date" id="fecha" class="fecha" placeholder="dia/mes/año" autofocus="" required=""/ ></td>
</tr>

   <tr align="right"><td>Cantidad:</td>
       <td><input name="cantidad" type="text" placeholder="Cantidad" required=""/></td>

    
    </tr>

    <tr align="right">  <td>Producto:</td>  
    <td><select name="producto">
    <?php
        include("conexion.php");
        echo ' <option value="0" selected="Selecciona" required="">Selecciona</option>';
        $consulta=mysql_query("select * from productos ") or die("Error:".mysql_error());
        while($reg=mysql_fetch_array($consulta)){
        echo '<option
        value="'.$reg['idproductos'].'">'.$reg['nombre_producto'].'</option>';
      
        }
    ?>
        </select></td>      
      
    </tr>

     <tr align="center"><td colspan="2"><input type="submit"  value="Registrar" class="boton"  /></td></tr>
                </form>
                </table>
              </div> 
            <div id="pie"></div>
        </div><!-- fin contenedor -->
      </div>
    </body> 
</html>

