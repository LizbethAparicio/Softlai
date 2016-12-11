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
			<h1>B&uacute;squeda General de Salidas</h1>
		  <p>CRITERIOS:
          <select name="criterios" id="select">
      		    <option value="Usuario">Fecha de Salidas</option>
      		    <option value="Todos" onclick="">Todas las Salidass</option>
          ></select>
		  </p>
		  <p>
			Buscar:
		    <input type="text" name="buscar1" placeholder="Buscar por Fecha" value="<?php if(isset($buscar1))echo $buscar1; ?>"/>
		  </p>
		  <p>
			<label>
			<input type="button" name="boton2" value="Buscar"  onclick="validaform3()" />
            
            <input type="image" src="images/excel.gif" name="boton2" onclick="excelsal()"/>  
           
                    
			</label>
		  </p>
		  <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
		</center>
		</form>
        <form name="form4" method="post">
	    <table width="610px" border="0" align="center">
         
            	<div id="pp">
				<table cols="3" border="1" cellpadding="0" cellspacing="0" align="center">
				<thead>
				<tr>
				<td ><h4>ID_SALIDAS</h4></td>
				<td ><h4>FECHA</h4></td>
				<td ><h4>RFC_CLIENTE</h4></td>
				<td ><h4>NOMBRE</h4></td>
				<td ><h4>APELLIDOS</h4></td>
				<td ><h4>TELEFONO</h4></td>
				<td ><h4>DEPARTAMENTO</h4></td>
				<td ><h4>EMAIL</h4></td>
				<td ><h4>CANTIDAD</h4></td>
				<td ><h4>PRODUCTO</h4></td>
				<td ><h4>MARCA</h4></td>
				<td ><h4>PRECIO</h4></td>
				
				</tr>

				</thead>
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				$buscar1=$_REQUEST['buscar1'];
				$criterios=$_REQUEST['criterios'];  
			    if ($buscar1!="" or $criterios=="Todos"  ) {
					   if ($criterios=='Usuario') {
							$_pagi_sql="SELECT a.idsalidas,a.fecha,a.rfc_clienteR,b.nombre,b.apellidos,b.telefono,c.nombre_departamento,b.email,d.cantidad,e.nombre_producto,e.marca,e.precio FROM salidas a inner join clientes b on a.rfc_clienteR=b.rfc_clientes inner join departamentos c on b.id_departamento=c.iddepartamento inner join detalle_salidas d on a.idsalidas=d.id_salidaR inner join productos e on d.id_productooR=e.idproductos WHERE a.fecha LIKE '$buscar1%'ORDER BY a.rfc_clienteR" ;



					   }
					  if ($criterios=='Todos') {
							$_pagi_sql="SELECT a.idsalidas,a.fecha,a.rfc_clienteR,b.nombre,b.apellidos,b.telefono,c.nombre_departamento,b.email,d.cantidad,e.nombre_producto,e.marca,e.precio FROM salidas a inner join clientes b on a.rfc_clienteR=b.rfc_clientes inner join departamentos c on b.id_departamento=c.iddepartamento inner join detalle_salidas d on a.idsalidas=d.id_salidaR inner join productos e on d.id_productooR=e.idproductos ORDER BY a.rfc_clienteR";  
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
							<td data-label="ID salidas">'.$row["idsalidas"].'</td>
							<td  data-label="Fecha">'.$row["fecha"].'</td>
							<td  data-label="RFC Cliente">'.$row["rfc_clienteR"].'</td>
							
							
							<td  data-label="nombre">'.$row["nombre"].'</td>
							<td  data-label="apellidos">'.$row["apellidos"].'</td>
							<td  data-label="telefono">'.$row["telefono"].'</td>
							<td  data-label="nombre departamento">'.$row["nombre_departamento"].'</td>
							<td  data-label="email">'.$row["email"].'</td>
							<td  data-label="cantidad">'.$row["cantidad"].'</td>
							<td  data-label="nombre producto">'.$row["nombre_producto"].'</td>
							<td  data-label="marca">'.$row["marca"].'</td>
							<td  data-label="precio">'.$row["precio"].'</td>
							
							
								</tr>';

							}

							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="12" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="12" align="center"><h4>No hay Datos </h4></td></tr>';						
				}}
				?>								
				
                </div>
               
           
        </table>	 <center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
				<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
				<input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />
        </form>	
        </body>
