<?php

	session_start();
	include './conexion.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['idproductos'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['idproductos']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$marca="";
						$unidad="";
						$precio=0;
						$re=mysql_query("select * from productos where idproductos=".$_GET['idproductos']);
						while ($f=mysql_fetch_array($re)) {
							$nombre=$f['nombre_producto'];
							$marca=$f['marca'];
							$precio=$f['precio'];
						
						}
						$datosNuevos=array('Id'=>$_GET['idproductos'],
										'Nombre'=>$nombre,
										'Marca'=>$marca,
										
										'Precio'=>$precio,	
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}





	}else{
		if(isset($_GET['idproductos'])){
			$nombre="";
			$marca="";
			$precio=0;
			$re=mysql_query("select * from productos where idproductos=".$_GET['idproductos']);
			while ($f=mysql_fetch_array($re)) {
				$nombre=$f['nombre_producto'];
				$marca=$f['marca'];
				
				$precio=$f['precio'];
				
			}
			$arreglo[]=array('Id'=>$_GET['idproductos'],
							'Nombre'=>$nombre,
							'Marca'=>$marca,
							
							'Precio'=>$precio,
												'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="css/stilo.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="js/scripts.js"></script>



<!--RESPONSIVO-->

<link rel="stylesheet" href="../css/stylemenu.css">
  <link rel="stylesheet" href="../fonts/style.css">
  <script src="../js/jquery-latest.js"></script>
  <script src="../js/main.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />

</head>
<body style="padding:0px; margin:0px; background-color:#fff;font-family:Arial, sans-serif">
<div id="pagewrap">

<header id="hed">
       <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
        </div>
 
        <nav>
            <ul>
                
                <li><a  href="index1.php"><span class="icon-images"></span>Catalógo</a></li>
                <li><a  href="carritodecompras.php" ><span class="icon-cart"></span>Ver Carrito de Compras</a></li>
              
                <li><a href="../cerrarsesion.php" ><span class="icon-lock"></span>Cerar Sesi&oacute;n</a></li>
            </ul>
        </nav>
    </header>
    </div>

	<section>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				<div class="producto">
					<center>
					
						<span ><?php echo $datos[$i]['Nombre'];?></span><br>
							<span>Marca:<?php echo $datos[$i]['Marca'];?></span><br>	
						<span>Precio: $<?php echo $datos[$i]['Precio'];?></span><br>
					<span>Cantidad: 
							<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-marca="<?php echo $datos[$i]['Marca'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad">
						</span><br>
						<span class="subtotal">Subtotal: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br><br>
						<a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
					</center>
									</div>

			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
			}
				
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total :$ '.$total.'</h2></center>';


			if($total!=0){

					echo '<center><a href="./compras.php" class="aceptar">Comprar</a></center>;';
			}
			
		?>
		<center><a href="./index1.php" class="ver">Ver catal&oacute;go</a></center>
		
			

		
	</section>
	
</body>
</html>