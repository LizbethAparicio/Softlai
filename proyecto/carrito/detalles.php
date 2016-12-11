
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/stilo.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>


<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
<!--RESPONSIVO-->

<link rel="stylesheet" href="../css/stylemenu.css">
  <link rel="stylesheet" href="../fonts/style.css">
  <script src="../js/jquery-latest.js"></script>
  <script src="../js/main.js"></script>


</head>
<body style="padding:0px; margin:0px; background-color:#fff;font-family:Arial, sans-serif">
<div id="pagewrap">

<header id="hed">
       <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
        </div>
 
        <nav>
            <ul>
                
                <li><a  href="index1.php""><span class="icon-images"></span>Catalógo</a></li>
                <li><a  href="carritodecompras.php" ><span class="icon-cart"></span>Ver Carrito de Compras</a></li>
              
                <li><a href="cerrar.php" ><span class="icon-lock"></span>Cerar Sesi&oacute;n</a></li>
            </ul>
        </nav>
    </header>
   
</div>
	<section>
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from productos where idproductos=".$_GET['idproductos'])or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>

		
		<center>
						<?php echo 
						'<tr> 

						
							<center>
							<img src="mostrarfoto.php?nombre_producto='.$f["nombre_producto"].'"><br><br></tr>';
							

				?>
				<span><?php echo $f['nombre_producto'];?></span><br>
				<span>Marca: <?php echo $f['marca'];?></span><br>
				<span>Precio: $<?php echo $f['precio'];?></span><br><br>
				<span>Unidad: </span>
				<select name="uni">
                      <?php
                      include("conexion.php");
                      echo ' <option value="0" selected="Selecciona" required="" >Selecciona</option>';
                  $consulta=mysql_query("select * from unidad ") or die("Error:".mysql_error());


                      while($reg=mysql_fetch_array($consulta)){
                        echo '<option
                               value="'.$reg['id_unidad'].'">'.$reg['descripcion'].'</option>';
                               echo "";
                             }
                      ?>

                     </select>
                     <br><br>
				<a href="./carritodecompras.php?idproductos=<?php  echo $f['idproductos'];?>">Añadir al carrito de compras</a>
			</center>
		
	<?php
		}
	?>
		
		

		
	</section>

</body>
</html>