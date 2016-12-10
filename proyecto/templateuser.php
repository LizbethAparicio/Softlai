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
<meta charset="utf-8">
<!-- disable iPhone inital scale --> 
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<title>I. T. Tlaxiaco</title>

<!-- main css -->
<link href="css/styleweb.css" rel="stylesheet" type="text/css">
<!-- media queries css -->
<link href="css/media-queries.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css">
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
<body style="padding:0px; margin:0px; background-color:#fff;font-family:Arial, sans-serif">
<div id="pagewrap">
 <header>
       <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
        </div>
 
        <nav>
            <ul>
                <li><a  href="slaider.php" target="Zona1"><span class="icon-home"></span>Inicio</a></li>
                <li><a  href="carrito/index1.php" ><span class="icon-cart"></span>Mi Carrito</a></li>
              
                <li><a href="cerrarsesion.php" ><span class="icon-lock"></span>Cerar Sesi&oacute;n</a></li>
            </ul>
        </nav>
    </header>

  <header id="header">
        <hgroup >
        
            <img src="sof.gif" class="flashit" align="left" width="100px"  >
            <img src="images/logo.png"  class="flashit" align="right" width="90px" / >
            <h1 id="#site-logo" align="center">"CONTROL DE INVENTARIO"</h1>
            <h2 id="site-description" align="center">INSTITUTO TECNOL&Oacute;GICO DE TLAXIACO</h2>

        </hgroup>
       
        
    </header>
   
	<hr>
	 
  <div id="content" >
    <!--iframe width="100%" height="1090px" src="home.html" name="cont" frameborder="0" padding="0px" allowfullscreen></iframe--> 
  <iframe  src="slaider.php" name="Zona1" width="100%" height="100%" style="border:0px; background-color: #FEFEFE;"></iframe> 

  </div>
  <!-- /#content -->  
  <aside id="sidebar">
    <section class="widget">
      <h4 class="widgettitle">Informaci&oacute;n</h4>
      <ul>
        <li><a href="#">Directorio</a> (3)</li>
        <li><a href="#">Ubicaci&oacute;n</a> (23)</li>
        <li><a href="#">Ejemplos</a>(18)</li>
      </ul>
    </section>
    <!-- /.widget -->
    <section class="widget menu">
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
  <!-- /#sidebar -->





<footer id="dautor" >

    <hr>
         <div id="dautor" style="text-align: center;">&copy; Derechos Reservados Instituto Tecnol&oacute;gico de Tlaxiaco 2016</div>
        <hr>
        </footer> 

    <footer id="fin" >
    <div style="text-align: center;">Boulevard Tecnol&oacute;gico Km. 2.5, Llano Yosovee  C.P. 69800. Tlaxiaco. Oax.<br>
    Tels. Dir. (953) 55 20788,  (953) 55 21322, fax: (953) 55 20405  e-mail:  rmateriales@ittlaxiaco.edu.mx<br>
  </div>
</footer>
  <!-- /#footer -->   
</div>
 </div>
<!-- /#pagewrap -->
</body>
</html>