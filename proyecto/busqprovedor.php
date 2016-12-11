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
			<h1>B&uacute;squeda General de Proveedores</h1>
		  <p>CRITERIOS:
          <select name="criterios" id="select">
      		    <option value="Usuario">Nombre del Proveedor</option>
      		    <option value="Todos" onclick="">Todos los Proveedores</option>
          ></select>
		  </p>
		  <p>
			Buscar:
		    <input type="text" name="buscar1" placeholder="Buscar por Nombre" value="<?php if(isset($buscar1))echo $buscar1; ?>"/>
		  </p>
		  <p>
			<label>
			<input type="button" name="boton2" value="Buscar"  onclick="validaform3()"; />
			<input type="image" src="images/word.jpg" name="boton3" onclick="wordp();"/> 
			 <input type="image" src="images/excel.gif" name="boton2" onclick="excelp();"/>  
           <input type="image" src="images/pdf.png" name="boton2" onclick="pdfprove();"/>            
           
                    
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
				<td ><h4>RFC</h4></td>
				<td ><h4>Nombre</h4></td>
				<td ><h4>Apellidos</h4></td>
				<td ><h4>calle y Numero</h4></td>
				<td ><h4>Colonia</h4></td>
				<td ><h4>Ciudad</h4></td>
				<td ><h4>Estado</h4></td>
				<td ><h4>C. P.</h4></td>		
				<td ><h4>Telefono</h4></td>
				</tr>

				</thead>
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				$buscar1=$_REQUEST['buscar1'];
				$criterios=$_REQUEST['criterios'];  
			    if ($buscar1!="" or $criterios=="Todos"  ) {
					   if ($criterios=='Usuario') {
							$_pagi_sql="SELECT rfc_proveedor,nombre,apellidos,calle_y_numero,colonia,ciudad,estado,codigo_postal,telefono FROM  proveedor WHERE nombre LIKE '$buscar1%' ORDER BY rfc_proveedor"; 
					   }
					  if ($criterios=='Todos') {
							$_pagi_sql="SELECT rfc_proveedor,nombre,apellidos,calle_y_numero,colonia,ciudad,estado,codigo_postal,telefono FROM  proveedor  ORDER BY rfc_proveedor";  
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
<td data-label="rfc_proveedor"><a href="modificarprovedor.php?rfc5='.$row["rfc_proveedor"].'">'.$row["rfc_proveedor"].'</a></td>

							
							<td  data-label="nombre">'.$row["nombre"].'</td>
							<td  data-label="apellidos">'.$row["apellidos"].'</td>
							<td  data-label="calle_y_numero">'.$row["calle_y_numero"].'</td>
							<td  data-label="colonia">'.$row["colonia"].'</td>
							<td  data-label="ciudad">'.$row["ciudad"].'</td>
							<td  data-label="estado">'.$row["estado"].'</td>
							<td  data-label="codigo_postal">'.$row["codigo_postal"].'</td>
							<td  data-label="telefono">'.$row["telefono"].'</td>						

								</tr>';

							}

							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="9" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="9" align="center"><h4>No hay Datos </h4></td></tr>';						
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
