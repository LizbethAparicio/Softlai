<?php
session_start();
$v=intval($_SESSION['validacion']);
if($v!=1){
  session_destroy();
  header("Location:index.html"); 
  exit(); 
}
?>

<!doctype html>
<html lang="es">
<head>
    <title>Usuario</title>
    <meta charset="utf-8">
     <link href="css/styleweb.css" rel="stylesheet" type="text/css"> 


<script>
  function lettersOnly(input){
    var regex=/[^0-9]/gi;
    input.value=input.value.replace(regex, "");
  }
</script>

    </head>


<body style="border:0px; background-color: #FEFEFE; margin-top:10px;">
   
 <div id="envolturaregistro"> 
        <div id="contenedor"> 
            <div id="cabecera" > 
                    <h3 id="p">CREAR UNA CUENTA<h3>
             </div> 
             <div id="cuerpo">
             <table cols="2" border="0" align="center" cellpadding="6" cellspacing="8" > 
                <form  action="validarregistro.php" method="post" >
                      <tr align="right" ><td id="p"> RFC:</td><td>
                      <input name="rfc" type="text" value="" autofocus required="" maxlength="13" pattern="[A-Z]{4}[ \-]?[0-9]{2}((0{1}[1-9]{1})|(1{1}[0-2]{1}))((0{1}[1-9]{1})|([1-2]{1}[0-9]{1})|(3{1}[0-1]{1}))[ \-]?[A-Z0-9]{3}"/></td></tr>
                         

                      <tr align="right" ><td id="p">NOMBRE:</td><td>
                       <input name="nombre" type="text" value="" autofocus required="" maxlength="60" pattern="[a-zA-Z]*"/></td></tr>
                      
                      <tr align="right" ><td id="p"> APELLIDOS:</td><td>
                       <input name="apellido" type="text" value="" autofocus required="" maxlength="60"
                       pattern="[a-zA-Z]*"/></td></tr>
                     
                      <tr align="right" ><td id="p">DEPARTAMENTO:</td><td id="p">
                     <select name="iddepa">
                      <?php
                      include("conexion.php");
                      echo ' <option value="0" selected="Selecciona" required="" >Selecciona</option>';
                  $consulta=mysql_query("select * from departamentos ") or die("Error:".mysql_error());


                      while($reg=mysql_fetch_array($consulta)){
                        echo '<option
                               value="'.$reg['iddepartamento'].'">'.$reg['nombre_departamento'].'</option>';
                               echo "";
                             }
                      ?>

                     </select>
                    </td></tr>
                   
                     <tr align="right" ><td>TELEFONO:</td><td>


                       <input name="telefono" maxlength="10" autofocus required="" onkeyup="lettersOnly(this)"></td></tr>
                      
                     <tr align="right" ><td> USUARIO:</td><td>
                       <input name="usuario" type="text" value="" autofocus required="" maxlength="60"/></td></tr>
                      
            <tr align="right" ><td>PASSWORD:</td><td>
            <input  type="password" name="password1" placeholder="******" value=""  maxlength="60"/></td></tr>
            
          <tr align="right" ><td> REPRTIR PASSWORD:</td><td>
          <input  type="password" name="password2" placeholder="******" value="" maxlength="60"/></td></tr>
          
         <tr align="right" ><td> Email:</td><td>
         <input type="text"  name="correo"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  required=""> </td></tr>

             
             <tr align="center"><td colspan="2">
             <input type="submit"  value="Registrar" class="boton"  />
             </td></tr>                    
                </form>

              </table>
              </div> 
         
            <div id="pie"><h2 id="p"></h2></div>
        </div><!-- fin contenedor -->
      </div>


</body>

</html>
 