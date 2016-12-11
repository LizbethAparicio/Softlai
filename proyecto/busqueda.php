<?php
session_start();
$v=intval($_SESSION['validacion']);
if($v!=1){
	session_destroy();
	header("Location:index.html");
	exit();	
}
?>   		

  		<script type="text/javascript" src="js/validaciones.js"></script>
  		<link rel="stylesheet" type="text/css" href="css/tabla.css">
  		<body>
  		<form name="form3" method="POST" action="" id="form">
		<center>
			<h1>B&uacute;squeda General de Clientes</h1>
		  <p>CRITERIOS:
          <select name="criterios" id="select">
      		    <option value="Usuario">Nombre del Cliente</option>
      		    <option value="Todos" onclick="">Todos los Clientes</option>
          ></select>
		  </p>
		  <p>
			Buscar:
		    <input type="text" name="buscar1" placeholder="Buscar por Nombre" value="<?php if(isset($buscar1))echo $buscar1; ?>"/>
		  </p>
		  <p>
			<label>
			<input type="button" name="boton2" value="Buscar"  onclick="validaform3()"; />
		<input type="image" src="images/word.jpg" name="boton3" onclick="word();"/>  
            <input type="image" src="images/excel.gif" name="boton2" onclick="excel();"/>  
           <input type="image" src="images/pdf.png" name="boton2" onclick="pdf();"/>
                    
			</label>
		  </p>
		  <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
		</center>
		</form>
        <form name="form4" method="post">
	    
          <tr>
            <td>
            	<div id="pp">
				<table width="600" cols="3" border="1" cellpadding="0" cellspacing="0" align="center" class="width200">
				<thead>
				<tr>
				<th ><h4>RFC</h4></th>
				<th ><h4>Nombre</h4></th>
				<th ><h4>Apellidos</h4></th>
				<!--<td ><h4>Departamento</h4></td>-->
				<th ><h4>Telefono</h4></th>
				<th ><h4>Usuario</h4></th>
				<th ><h4>E-Mail</h4></th>
				</tr>

				</thead>
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				$buscar1=$_REQUEST['buscar1'];
				$criterios=$_REQUEST['criterios'];  
			    if ($buscar1!="" or $criterios=="Todos"  ) {
					   if ($criterios=='Usuario') {
							$_pagi_sql="SELECT rfc_clientes,nombre,apellidos,telefono,usuario,email FROM  clientes WHERE nombre LIKE '$buscar1%' ORDER BY rfc_clientes"; 
					   }
					  if ($criterios=='Todos') {
							$_pagi_sql="SELECT rfc_clientes,nombre,apellidos,telefono,usuario,email FROM  clientes  ORDER BY rfc_clientes";  
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
<td data-label="rfc_clientes"><a href="modificarclientes.php?rfc5='.$row["rfc_clientes"].'">'.$row["rfc_clientes"].'</a></td>
							<td  data-label="nombre">'.$row["nombre"].'</td>
							<td  data-label="apellidos">'.$row["apellidos"].'</td>
							
							<td  data-label="telefono">'.$row["telefono"].'</td>
							<td  data-label="usuario">'.$row["usuario"].'</td>
							<td  data-label="email">'.$row["email"].'</td>



								</tr>';

							}

							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="6" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="6" align="center"><h4>No hay Datos </h4></td></tr>';						
				}}
				?>								
				
                </div>
                
            </td>
          </tr>
        </table>	<center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
				<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
				<input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />
        </form>	
        </body>
