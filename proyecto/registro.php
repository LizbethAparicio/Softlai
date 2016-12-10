<!DOCTYPE html>
<html lang="es">
<html>
<head>
    <title>REGISTRARSE</title>
    <meta charset="utf-8">
     <link type="text/css" href="css/csslogin.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="validacion.js"></script>
</head>
 
<body>
<header>
<table align="center" width="80%" border="0" cellpading="0" cellspacing="0"> <br><br>
<tr><td><div><a href="http://www.ittlaxiaco.edu.mx/" title="ITT" ><img src="img/tlaxiaco.png"></a></div></td><td><h1>TECNOL&Oacute;GICO NACIONAL DE M&Eacute;XICO</h1><h3>INSTITUTO TECNOL&Oacute;GICO DE TLAXIACO</h3></td></tr></table>

       

    </header>
 
     <br><br>
        <div id="envoltura">
        <div id="contenedor">
 
            <div id="cabecera">
                    CREAR UNA CUENTA
            </div>
 
            <div id="cuerpo">
 
                <form id="form-login" action="#" method="post" >
                    <p><label for="nombre">Nombre:</label></p>
                        <input  type="text" id="nombre" class="nombre" placeholder="Nombre" autofocus=""/ ></p>
 
                    <!--=============================================================================================-->
                    <!--La sisguientes 2 líneas son para agregar campos al formulario con sus respectivos labels-->
                    <!--Puedes usar tantas como necesites-->
                    <p><label for="apellidos">Apellidos:</label></p>
                        <input  type="text" id="apellido" class="apellidos" placeholder="Apellidos" /></p>

                         <p><label for="departamento">Nombre del departamento:</label></p>
                        <input  type="text" id="departamento" class="departamento" placeholder="Departamento" /></p>
                    <!--=============================================================================================-->
 
                    <p><label for="correo">Usuario:</label></p>
                        <input  type="text" id="usuario" class="correo" placeholder="Usuario" /></p>
 
                    <p><label for="pass">Password:</label></p>
                        <input  type="password" id="pass" class="pass" placeholder="Password"/ ></p>
 
                    <p><label for="repass">Repetir Password:</label></p>
                        <input type="password" id="repass" class="repass" placeholder="Repite password" /></p>
 
                  
                   <p id="bot"><input type="submit" id="boton" value="Registrar" class="boton"/></p>
                    
                    <input type="button" id="button" name="submit" value="Regresar" onclick="window.location='index.html'"  class="boton">
                    <p id="msg"></p>
                </form>
            </div>
 
            <div id="pie">INSTITUTO TECNOL&Oacute;GICO DE TLAXIACO</div>
        </div><!-- fin contenedor -->
 </div>
     <br><br>
 <div id="dautor" style="text-align: center;">&copy; Derechos Reservados Instituto Tecnol&oacute;gico de Tlaxiaco 2016</div>
        <hr>
<footer><div style="text-align: center;">Boulevard Tecnol&oacute;gico Km. 2.5, Llano Yosovee  C.P. 69800. Tlaxiaco. Oax.<br>
    Tels. Dir. (953) 55 20788,  (953) 55 21322, fax: (953) 55 20405  e-mail:  rmateriales@ittlaxiaco.edu.mx<br>
  </div>
</footer>
</body>
 
</html>