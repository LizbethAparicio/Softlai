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
    <title>PRODUCTO</title>
    <meta charset="utf-8">
     <link href="css/styleweb.css" rel="stylesheet" type="text/css"> 
 
</head> 
<body style="border:0px; background-color: #FEFEFE; margin-top:10px;">
     
        <div id="envoltura">
        <div id="contenedor"> 
            <div id="cabecera">
                    <h3 id="p">REGISTRAR ENTRADAS<h3>
                  </div> 
            <div id="cuerpo"> 
              <table cols="2" border="0" align="center" cellpadding="0" cellspacing="4">
               <form  action="validarentradas.php" method="post" >
                <tr><td align="right"> Proveedor</td><td>                 
            <select name="rfc_prove">
                      <?php
                      include("conexion.php");
                      echo ' <option value="0" selected="Selecciona" required="">Selecciona</option>';
                  $consulta=mysql_query("select * from proveedor ") or die("Error:".mysql_error());


                      while($reg=mysql_fetch_array($consulta)){
                        echo '<option
                               value="'.$reg['rfc_proveedor'].'">'.$reg['nombre'].'</option>';
                               echo "";
                             }
                      ?>
                     </select>
            </td></tr>

                <tr><td align="right">Fecha:</td><td>
                  <input name="fecha" type="date" id="fecha" class="fecha" placeholder="dia/mes/año" autofocus="" required=""/ >
                  </td></tr>

                  <tr><td align="right">Producto</td>
                  <td>
                     <select name="producto">
                      <?php
                      include("conexion.php");
                      echo ' <option value="0" selected="Selecciona" required="" >Selecciona</option>';
                  $consulta1=mysql_query("select * from productos ") or die("Error:".mysql_error());


                      while($rege=mysql_fetch_array($consulta1)){
                        echo '<option
                               value="'.$rege['idproductos'].'">'.$rege['nombre_producto'].'</option>';
                               echo "";
                             }
                      ?>

                     </select>
                  </td>
                  </tr>

                  <tr><td align=" right">Cantidad</td>
                  <td><input name="cantidad" type="text" placeholder="Cantidad" required=""/></td>
                  </tr>

                  <tr>
                    <td align="right">Precio</td>
                    <td><input name="precio" type="text" placeholder="$$$$$$$$" required=""/></td>
                  </tr>
                               
                <tr><td align="right">Subtotal:</td><td>
                   <input name="subtotal" type="text" placeholder="SUBTOTAL" required=""/></td> </tr>
                   
                 <tr><td align="right">IVA:</td><td>
                  <input name="iva" type="text" placeholder="IVA" required=""/></td> </tr>
                     
                  <tr><td align="right">Total</td><td>
                  <input name="total" type="text" placeholder="TOTAL" required=""/></td> </tr>
                 
             <tr align="center"><td colspan="2" rowspan="2"><input type="submit"  value="Guardar" />    </td></tr>
            
                </form>
                </table>
              </div> 
            <div id="pie"></div>
        </div><!-- fin contenedor -->
      </div>
    </body> 
</html>

