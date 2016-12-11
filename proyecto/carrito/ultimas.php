
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>


	<style type="text/css">
		 td{

			 border: none;border-bottom: 1px solid #ccc; position: relative;padding-left: 5%; 
        
		}
	</style>
</head>
<body>

<label>
	<center><h1>Imprimir reporte</h1></center>

	<center><a href="wordsolicitudes.php" ><input type="image" src="images/word.jpg" > </a>
	<a href="excelsolicitudes.php" ><input type="image" src="images/excel.gif"> </a>
	</center>
			</label>
	<center><h1>Últimas Solicitudes</h1></center>
	<table border="1px" width="100%" cellpadding="8px" cellspacing="0px">	
		<tr>
		
			<td>Nombre</td>
			<td>Marca</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
		</tr>	


		<?php
		include "conexion.php";
			$re=mysql_query("select * from compras");
			$numeroventa=0;
			while ($f=mysql_fetch_array($re)) {
					if($numeroventa	!=$f['numeroventa']){
						echo '<tr><td colspan="5" cellpadding="3px" cellspacing="3px">Compra Número: '.$f['numeroventa'].' </td></tr>';
					}
					$numeroventa=$f['numeroventa'];
					echo '<tr>
						
						<td>'.$f['nombre'].'</td>
						<td>'.$f['marca'].'</td>
						<td>'.$f['precio'].'</td>
						<td>'.$f['cantidad'].'</td>
						<td>'.$f['subtotal'].'</td>

					</tr>';
			}
		?>
	</table>
	</section>
	
	

</body>
</html>