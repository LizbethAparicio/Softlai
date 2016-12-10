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
<form name="form5" action="datosproductos.php" method="POST" enctype="multipart/form-data">
    <?php
        include("conexion.php");
          if(isset($_REQUEST['rfc5'])){
        $rfc5=$_REQUEST['rfc5'];
        $result1=mysql_query("select 
        a.nombre_producto,a.marca,b.descripcion from productos a 
        inner join unidad b on a.id_unidadR=b.id_unidad where nombre_producto='$rfc5'",$conexion); 
        if (mysql_num_rows($result1)>=1) {
          while ($row=mysql_fetch_array($result1))
          {
            $rfc5=$row["nombre_producto"];
            $marca5=$row["marca"];
            $descripcion5=$row["descripcion"];
            
           

                       
          }
     ?>
          
                      
             <tr align="right" ><td>NOMBRE :</td><td>               
                  <input name="rfc5" type="text"  autofocus required="" maxlength="60" value="<?php echo $rfc5;?>"/></td></tr>
                  
                  <tr align="right" ><td>MARCA:</td><td>
                   <input name="marca5" type="text" autofocus required="" maxlength="60" value="<?php echo $marca5;?>"/></td></tr>
                    
                       <tr align="right" ><td>UNIDAD:</td><td>      
                    <?php
                   include('conexion.php');
                   $consulta=mysql_query("select * FROM unidad"); 
                   $reg=mysql_fetch_array($consulta);?>  
                <select name="descripcion5" > 
                   <option selected value="<?php echo $reg['id_unidad']?>"><?php echo $descripcion5; ?> </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $reg['id_unidad']?>"><?php echo $reg['descripcion']?></option> 
            <?php 
        } while ($reg = mysql_fetch_assoc($consulta)); 
      ?> 
          </select>
                     </td></tr>
             <td colspan="2"><input name="file2" type="file" class="texto2" size="10" maxlength="80"></td> </tr>
             <tr align="center">
             <td colspan="2"><input  type="button" name="Actualizar" value="Actualizar Datos" onclick="actualiza()"/>
              <input type="button" name="modfoto" value="Actualizar foto" onclick="afoto( )"/>
             </td>
             
             </tr>


          
        
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
            <div id="pie"><h5></h5></div>
        </div><!-- fin contenedor -->
      </div>
</body>
</html>

   
