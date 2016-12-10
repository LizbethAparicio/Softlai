<?php
session_start();
$v=intval($_SESSION['validacion']);
if($v!=1){
	session_destroy();
	header("Location:../index.html"); 
	exit();	
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title><link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/stilo.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="js/scripts.js"></script>


<!--RESPONSIVO-->

<link rel="stylesheet" href="../css/stylemenu.css">
  <link rel="stylesheet" href="../fonts/style.css">
  <script src="../js/jquery-latest.js"></script>
  <script src="../js/main.js"></script>
  <style type="text/css">
	#wss{
opacity: 0;
-webkit-transition.opacity: 1.0s linear 0s; transition:opacity 1.0s linear 0s;
	}</style>
	<script>
		var wss_i=0;
		var wss_array=["unidad","cajas","paquetes"];
		var wss_elem;
		function wssNext(){
			wss_i++;
			wss_elem.style.opacity=0;
			if (wss_i>(wss_array.length-1)) {
				wss_i=0;
			}
			setTimeout('wssSlide()',1000);
		}
		function wssSlide(){wss_elem.innerHTML=wss_array[wss_i];wss_elem.style.opacity=1;setTimeout('wssNext()',2000);}
	</script>

</head>
<body style="padding:0px; margin:0px; background-color:#fff;font-family:Arial, sans-serif">

<div id="pagewrap">

<header id="hed">
       <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
        </div>
 
        <nav>
            <ul>
                
                <li><a  href="carritodecompras.php" ><span class="icon-cart"></span>Ver Carrito de Compras</a></li>
              
                <li><a href="cerrar.php" ><span class="icon-lock"></span>Cerar Sesi&oacute;n</a></li>
            </ul>
        </nav>
    </header>
	</div>
    



	<section>
	<h1>Tus pedidos pueden por: <span id="wss"></span></h1>
<script >wss_elem=document.getElementById("wss");wssSlide();</script>
		
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from productos")or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>

		
		
						<div class="producto">
							
<center>
				<?php echo 
						'<tr> 

						
							<center>
							<img src="mostrarfoto.php?nombre_producto='.$f["nombre_producto"].'"><br><br></tr>';
							

				?>
				

			
						
							<span><?php echo $f['nombre_producto'];?></span><br><br>	

				<a href="./detalles.php?idproductos=<?php  echo $f['idproductos'];?>">ver</a>
					</center>					

        </div>
       	
        <?php
		}
	?>
	
	</section>


</body>
</html>