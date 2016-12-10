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
    <title>DEPARTAMENTOS</title>
    <meta charset="utf-8">
     <link href="css/styleweb.css" rel="stylesheet" type="text/css"> 
</head>
<body style="border:0px; background-color: #FEFEFE; margin-top:10px;" >
   
 <div id="envoltura">
        <div id="contenedor"> 
            <div id="cabecera">
                    <h3 id="p">REGISTRAR DEPARTAMENTOS<h3>
                  </div> 
            <div id="cuerpo"> 
            <table cols="2" border="0" align="center" cellpadding="6" cellspacing="2">
               <form  action="validardepartamento.php" method="post" >
                         
                      <tr align="center" ><td>NOMBRE DEPARTAMENTO:</td><td>
                    <input name="departamento" type="text" required="" value="" autofocus pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*"  maxlength="60" /></td></tr>  
                                       
              <tr align="center"><td colspan="2">
              <input type="submit"  value="Registrar" class="boton"/>
                </td></tr>     
                </form>
                </table>
              </div> 
            <div id="pie"></div>
        </div><!-- fin contenedor -->
      </div>

</body>
</html>