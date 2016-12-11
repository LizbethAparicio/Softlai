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
			<h1>B&uacute;squeda General de Entradas</h1>
		  <p>CRITERIOS:
          <select name="criterios" id="select">
      		    <option value="Usuario">Fecha de Entrada</option>
      		    <option value="Todos" onclick="">Todas las Entradas</option>
          ></select>
		  </p>
		  <p>
			Buscar:
		    <input type="text" name="buscar1" placeholder="Buscar por Fecha" value="<?php if(isset($buscar1))echo $buscar1; ?>"/>
		  </p>
		  <p>
			<label>
			<input type="button" name="boton2" value="Buscar"  onclick="validaform3()" />
              
            <input type="image" src="images/excel.gif" name="boton2" onclick="excelent()"/>
            <input type="image" src="images/pdf.png" name="boton2" onclick="pdfentradas()"/>  
           
                    
			</label>
		  </p>
		  <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
		</center>
		</form>
        <form name="form4" method="post">
	    <table width="600" cols="3" border="1" cellpadding="0" cellspacing="0" align="center" >
         
            	<div id="pp">
				<thead>
				<tr>
				<td ><h4>RFC</h4></td>
				<td ><h4>NOMBRE</h4></td>
				<td ><h4>APELLIDOS</h4></td>
				<td ><h4>CIUDAD</h4></td>
				<td ><h4>ESTADO</h4></td>
				
				</tr>

				</thead>
				
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				$buscar1=$_REQUEST['buscar1'];
				$criterios=$_REQUEST['criterios'];  
			    if ($buscar1!="" or $criterios=="Todos"  ) {
					   if ($criterios=='Usuario') {
						$_pagi_sql="SELECT   a.rfc_proveedor,a.nombre,a.apellidos,a.ciudad,a.estado,a.telefono,b.fecha,c.cantidad,d.nombre_producto,c.precio,b.subtotal,b.iva,c.total from proveedor a 
inner join entradas b on a.rfc_proveedor=b.rfc_proveR
inner join detalle_entradas c on b.identradas=c.iddetalle_entradas
inner join productos d on c.iddetalle_entradas=d.idproductos WHERE b.fecha LIKE '$buscar1%'ORDER BY a.rfc_proveedor" ;   

					   }
					  if ($criterios=='Todos') {
							$_pagi_sql="SELECT   a.rfc_proveedor,a.nombre,a.apellidos,a.ciudad,a.estado,a.telefono,b.fecha,c.cantidad,d.nombre_producto,c.precio,b.subtotal,b.iva,c.total from proveedor a 
inner join entradas b on a.rfc_proveedor=b.rfc_proveR
inner join detalle_entradas c on b.identradas=c.iddetalle_entradas
inner join productos d on c.iddetalle_entradas=d.idproductos ORDER BY a.rfc_proveedor" ;
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
							<td data-label="rfc prove">'.$row["rfc_proveedor"].'</td>
							<td  data-label="Nombre">'.$row["nombre"].'</td>
							<td  data-label="Apellidos">'.$row["apellidos"].'</td>
							<td  data-label="Ciudad">'.$row["ciudad"].'</td>
							<td  data-label="Estado">'.$row["estado"].'</td>
							<td  data-label="Telefono">'.$row["telefono"].'</td>
							<td  data-label="Fecha">'.$row["fecha"].'</td>
							<td  data-label="Cantidad">'.$row["cantidad"].'</td>
							<td  data-label="Producto">'.$row["nombre_producto"].'</td>
							<td  data-label="Precio">'.$row["precio"].'</td>
							<td  data-label="Subtotal">'.$row["subtotal"].'</td>
							<td  data-label="IVA">'.$row["iva"].'</td>
							<td  data-label="Total">'.$row["total"].'</td>
							
								</tr>';

							}

							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="5" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="5" align="center"><h4>No hay Datos </h4></td></tr>';						
				}}
				?>								
				
                
           
        </table>	</div>
                <center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
				<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
				<input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />
        </form>	
        </body>
