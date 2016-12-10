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
<html lang="en">
<head>
<meta charset="utf-8">
<!-- disable iPhone inital scale --> 
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<title>Provedor</title>

<!-- main css -->
<link href="css/styleweb.css" rel="stylesheet" type="text/css">


<script>
  function lettersOnly(input){
    var regex=/[^0-9]/gi;
    input.value=input.value.replace(regex, "");
  }
</script>


</head>
<body style="border:0px; background-color: #FEFEFE; margin-top:10px;">
  
  
   <div id="envoltura">
        <div id="contenedor">  
            <div id="cabecera">
                    <h3 id="p">REGISTRAR PROVEEDOR<h3>
                  </div> 
            <div id="cuerpo"> 
                <table cols="2" border="0" align="center" cellpadding="6" cellspacing="8">
                  <form  action="validarprovedor.php" method="post" >
                    <tr align="center" ><td>RFC:</td><td>
                    <input name="rfc" type="text" value="" pattern="[A-Z]{4}[ \-]?[0-9]{2}((0{1}[1-9]{1})|(1{1}[0-2]{1}))((0{1}[1-9]{1})|([1-2]{1}[0-9]{1})|(3{1}[0-1]{1}))[ \-]?[A-Z0-9]{3}"  autofocus required="" maxlength="13"/>

                <tr align="center" ><td>NOMBRE:</td><td>
                    <input name="nombre" type="text" value="" pattern="^[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)$*" autofocus required="" maxlength="60"/></td></tr>

               <tr align="center" ><td>APELLIDOS:</td><td>
                    <input name="apellidos" type="text" value="" pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" autofocus required="" maxlength="60"/> </td></tr>                    
                
                <tr align="center" ><td>CIUDAD:</td><td>
                    <input name="ciudad" type="text" value="" pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" autofocus required="" maxlength="60"/></td></tr>
               
                <tr align="center" ><td>ESTADO:</td><td>
                    <input name="estado" type="text" value="" pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" autofocus required="" maxlength="60"/> </td></tr>
                
                <tr align="center" ><td>COLONIA:</td><td>
                    <input name="colonia" type="text" value="" pattern="[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?(( |\-)[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿]+\.?)*" autofocus required="" maxlength="60"/></td></tr>
                
                <tr align="center" ><td> CALLE/NUM:</td><td>
                    <input name="calle" type="text" value="" autofocus required="" maxlength="60"/></td></tr>                      
                <tr align="center" ><td>CODIGO POSTAL:</td><td>               
                    <input name="cp" type="text" value="" pattern="^[0-9]{5}$" autofocus required="" maxlength="5"/></td></tr>                     
              
          
                    <tr align="right" ><td>TELEFONO:</td><td>


                       <input name="telefono" maxlength="10" autofocus required="" onkeyup="lettersOnly(this)"></td></tr>
          
                <tr align="center"><td colspan="2">
             <input type="submit"  value="Guardar" />   
              </td></tr>           
                </form>
                </table>
              </div> 
            <div id="pie"></div>
        </div><!-- fin contenedor -->
      </div>
   

  
  
</body>
</html>
