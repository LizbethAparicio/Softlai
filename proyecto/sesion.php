<!doctype html>
<html lang="en"> 
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
<!-- disable iPhone inital scale -->
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<title>I. T. Tlaxiaco</title>

<!-- main css -->
<link href="css/style.css" rel="stylesheet" type="text/css">
<!-- media queries css -->
<link href="css/media-queries.css" rel="stylesheet" type="text/css">

<!--RESPONSIVO-->
<link rel="stylesheet" href="css/stylemenu.css">
  <link rel="stylesheet" href="fonts/style.css">
  <script src="js/jquery-latest.js"></script>
  <script src="js/main.js"></script>
  <style type="text/css">
    body{backgroud:#000; color=#fff; text-align:center;}
    .flashit{
        animation: flash linear 1s infinite;
    }
    @keyframes flash{
        0%{opacity: 1;} 50%{opacity: .1;} 100%{opacity: 1;}}
      
    </style>
    <!-- icono del face -->
    <style type="text/css">      
        .icons{
            background: url(images/hilera1.png);
            width: 59px;
            height: 59px;
            border: none;
            outline: none;
            cursor: pointer;
            margin: 5px;
        }
        #rss_btn{background-position: 0px 0px;}
        #rss_btn:hover{background-position: 0px -59px;}
        #rss_btn:active{background-position: -2px -125px;}        
    </style>
     <!-- fin del icono del face -->
</head>
<body>
<div id="pagewrap">
<header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
        </div>
 
        <nav>
            <ul>
                <li><a id="e" href="index.html"><span class="icon-home"></span>Inicio</a></li>
                <li><a id="e" href="sesion.php"><span class="icon-users"></span>Iniciar Sesión</a></li>
                <li><a id="e" href="map.html"><span class="icon-location"></span>Ubicacion</a></li>
                
            </ul>
        </nav>
    </header>
    <header id="header">
          <hgroup >
            <img src="sof.gif"  class="flashit" align="left" width="100px"  >
            <img src="images/logo.png" class="flashit" align="right" width="90px" / >
            <h1 id="#site-logo" align="center">"CONTROL DE INVENTARIO"</h1>
            <h2 id="site-description" align="center">INSTITUTO TECNOL&Oacute;GICO DE TLAXIACO</h2>

        </hgroup>
        
    </header>

 <div id="content">
<div id="envoltura">
        <div id="contenedor">
 
            <div id="cabecera" >
     <p id="p"> <span class="icon-users"></span>  INICIO DE SESI&Oacute;N</p>
            </div>
 
            <div id="cuerpo">
                <form id="form-login" action="validarlogin.php" method="POST" autocomplete="off" >
                
                    <p id="p"><label >Usuario:</label></p>
                        <input name="usuario" type="text" id="user" placeholder="Ingresa Usuario" autofocus="" required=""/></p>
 
                    <p id="p"><label>Contraseña:</label></p>
                        <input name="password" type="password" id="pass" placeholder="Ingresa Password" required=""/></p>
 
                    <p id="p"><input type="submit" id="enviar" name="enviar" value="Ingresar" class="boton"/><span class="icon-spinner"></span> </p>
                  
                   
                   <p id="aviso" style="color: red;"></p>     
                </form>
                </div>
                </div>
          

    </div>
    </div>


    <!-- /#header -->   
   <aside id="sidebar">
        <section class="widget">
            <h4 class="widgettitle">Informaci&oacute;n</h4>
            <ul>
                <li><a href="#">Directorio</a> (3)</li>
                <li><a href="#">Ubicaci&oacute;n</a> (23)</li>
                <li><a href="#">Ejemplos</a>(18)</li>
                <li><p>El proyecto del letrero de LEDs es desarrollado con el fin de automatizar las promociones, las ventas, etc., ya que hoy en día la mayor publicidad es estática y no dinámica, se pretende construir un tablero de leds que te permita escribir desde su dispositivo móvil el producto, la oferta, el precio el cual se verá reflejado en el letrero de LEDs donde se podrá ver de manera mas llamativa e intuitiva.</p></li>
            </ul>
        </section>
        <!-- /.widget -->
        <section class="widget clearfix">
           <video id="miVideo" width="100%" height="100%" controls>
              <source src="video/tlaxiao.ogv" type="video/ogv">
              <source src="video/tlaxiao.mp4" type="video/mp4">
              <source src="video/tlaxiao.webm" type="video/webm">
              <object data="video/tlaxiao.mp4" width="320" height="240">
                  <embed width="320" height="240" src="video/lego.swf">
              </object>
              <track kind="subtitles" src="video/subtitulo-es.vtt" srclang="es" label="Spanish" default />
          </video>
                <br>
      
          <button onclick="document.getElementById('miVideo').play()">Play</button>
          <button onclick="document.getElementById('miVideo').pause()">Pause</button>
          <button onclick="document.getElementById('miVideo').volume += 0.1">Vol+ </button>
          <button onclick="document.getElementById('miVideo').volume -= 0.1">Vol- </button>
          <button onclick="document.getElementById('miVideo').muted = true">Mute</button>
          <button onclick="document.getElementById('miVideo').muted = false">Unmute </button>
          <br> 
        </section>
        <!-- /.widget -->  
        <section> <!-- icono del face-->  
        
           <button  id="rss_btn" class="icons" ><a id="e" href="https://www.facebook.com/TecTlaxiaco/">facebook</a>
</button>

        </section>                       
    </aside>
    <!-- /#footer -->   


<footer id="dautor" >

    <hr>
         <div id="dautor" style="text-align: center;">&copy; Derechos Reservados Instituto Tecnológico de Tlaxiaco 2016</div>
        <hr>
        </footer> 
    <footer id="fin" >
    <div style="text-align: center;">Boulevard Tecnológico Km. 2.5, Llano Yosovee  C.P. 69800. Tlaxiaco. Oax.<br>
    Tels. Dir. (953) 55 20788,  (953) 55 21322, fax: (953) 55 20405  e-mail:  rmateriales@ittlaxiaco.edu.mx<br>
  </div>
</footer>
</div>

</body>
</html>