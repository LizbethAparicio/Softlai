<?php
session_start();
$v=intval($_SESSION['validacion']);
if($v!=1){
	session_destroy();
	header("Location:index.html"); 
	exit();	
}
?>    		
<link rel="stylesheet" type="text/css" href="css/estilo.css">
  		<script type="text/javascript" src="js/validaciones.js"></script>
  		<link rel="stylesheet" type="text/css" href="css/esti.css">
  		<body>
  		<form name="form3" method="POST" action="" id="form">
		<center>
			<h1>B&uacute;squeda General de Productos</h1>
		  <p>CRITERIOS:
          <select name="criterios" id="select">
      		    <option value="Usuario">Nombre del Producto</option>
      		    <option value="Todos" onclick="">Todos los Productos</option>
          ></select>
		  </p>
		  <p>
			Buscar:
		    <input type="text" name="buscar1" placeholder="Buscar por Nombre" value="<?php if(isset($buscar1))echo $buscar1; ?>"/>
		  </p>
		  <p>
			<label>
		<input type="button" name="boton2" value="Buscar"  onclick="validaform3()" />
            <input type="image" src="images/word.jpg" name="boton3" onclick="wordpro()"/>  
            <input type="image" src="images/excel.gif" name="boton2" onclick="excelpro()"/>  
            <input type="image" src="images/pdf.png" name="boton2" onclick="pdfpro()"/>
            
                    
			</label>
		  </p>
		  <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
		</center>
		</form>
        <form name="form4" method="post">
	    <table width="610px" border="0" align="center">
          <tr>
            <td>
            	<div id="pp">
				<table cols="3" border="1" cellpadding="0" cellspacing="0" align="center">
				<thead>
				<tr>
				<td ><h4>Nombre</h4></td>
				<td ><h4>Marca</h4></td>
				<td ><h4>Cantidad</h4></td>
				<td ><h4>Precio</h4></td>
				<td ><h4>Foto</h4></td>
				
				</tr>

				</thead>
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				$buscar1=$_REQUEST['buscar1'];
				$criterios=$_REQUEST['criterios'];  
			    if ($buscar1!="" or $criterios=="Todos"  ) {
					   if ($criterios=='Usuario') {
							$_pagi_sql="SELECT nombre_producto,marca,cantidad,precio FROM  productos WHERE nombre_producto LIKE '$buscar1%' ORDER BY nombre_producto"; 
					   }
					  if ($criterios=='Todos') {
							$_pagi_sql="SELECT nombre_producto,marca,cantidad,precio FROM  productos  ORDER BY nombre_producto";  
					   }
						include("conexion.php"); 
						$result1=mysql_query($_pagi_sql);
						//if (mysql_num_rows($result1)>=1) {
							//$_pagi_cuantos = 5;
							//$_pagi_nav_num_enlaces = 5;
							//include("paginator.inc.php");
							while ($row=mysql_fetch_array($result1))
							{
							echo '<tr> 
<td data-label="nombre_producto"><a href="modificarproductos.php?rfc5='.$row["nombre_producto"].'">'.$row["nombre_producto"].'</a></td>
							<td  data-label="marca">'.$row["marca"].'</td>
							<td  data-label="cantidad">'.$row["cantidad"].'</td>
							<td  data-label="precio">'.$row["precio"].'</td>
							<td data-label="foto"><img src="mostrarfoto.php?nombre_producto='.$row["nombre_producto"].'" width="50" height="50" align="absmiddle"></td>
							
								</tr>';

							}

							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="4" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="4" align="center"><h4>No hay Datos </h4></td></tr>';						
				}}
				?>								
				</table>
                </div>
                <center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
				<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
				<input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />
            </td>
          </tr>
        </table>	
        </form>	
        </body>
