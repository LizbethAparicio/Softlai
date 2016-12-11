<?php
session_start();
include "conexion.php";
		$arreglo=$_SESSION['carrito'];
		
		$numeroventa=0;

		$re=mysql_query("select * from compras order by numeroventa DESC limit 1") or die(mysql_error());	
		while (	$f=mysql_fetch_array($re)) {
					$numeroventa=$f['numeroventa'];	
		}
		if($numeroventa==0){
			$numeroventa=1;
		}else{
			$numeroventa=$numeroventa+1;
		}
		for($i=0; $i<count($arreglo);$i++){
			mysql_query("insert into compras (numeroventa,nombre,marca,precio,cantidad,subtotal) values(
				".$numeroventa.",
				
				'".$arreglo[$i]['Nombre']."',	
				'".$arreglo[$i]['Marca']."',
				'".$arreglo[$i]['Precio']."',
				'".$arreglo[$i]['Cantidad']."',
				'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."'
				)")or die(mysql_error());
		}
		
		/* A Continuacion comenzarémos a crear la esctructura de nuestro Email.*/

		//Imprimimos una tabla recorriendo el arreglo.
		$total=0;
		$tabla='<table border="1"><tr>
		<th>Nombre</th>
		<th>Marca</th>
		
		<th>Cantidad</th>
		<th>Precio</th>
		<th>Subtotal</th></tr>';
		for($i=0;$i<count($arreglo);$i++){
			
			$tabla=$tabla.'<tr>
			<td>'.$arreglo[$i]['Nombre'].'</td>
			<td>'.$arreglo[$i]['Marca'].'</td>
					<td>'.$arreglo[$i]['Cantidad'].'</td>
			<td>'.$arreglo[$i]['Precio'].'</td>
			<td>'.$arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'].'</td>
			</tr>';
			$total=$total+($arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']);			
		}
		$tabla.'</table>';
		//CONFIGURAMOS LOS DATOS DEL ENVIO
		echo $tabla;
		
        $fecha=date("d-m-Y");
        $hora=date("H:i:s");      
        $asunto='Solicitud de materiales';
        $desde="www.tupagina.com";
        //Direccion del remitente
        $correo="lizar_238@hotmail.com";
        /*Debe de indicar los estilos css aqui mismo en la variable  y si quieres incluir imagenes,estas tendran que 
        estar en un servidor yo tome la de google */
       $comentario='
        <div style="
	        border: 1px solid #d6d2d2;
	        border-radius: 5px;
	        box-shadow: 5px 5px 10px rgba(57,29,150,0.5);
	        color:#9378f0;
	        paddin:10px;
	        width:800px%;
	        heigth:400px;
        ">
        <center>
        <img src="http://www.ideasmx.com.mx/blog/wp-content/uploads/2008/12/google_mexico_logo.jpg" width="400" heigth="250">
        <h1><em>Muchas Gracias por tu compra</em></h1></center>

            <hr width="90%">

            <p>Hola muchas gracias por realizar la solicitud en nuestro sitio a continuación te mostramos los detalles de la misma.</p>
            Cantidad de articulos: '.count($arreglo).'<br>
            Lista de Articulos: <br>
            '.$tabla.'<br>
            Total: '.$total.'';


        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=utf8\r\n"; 

        //dirección del remitente 
        $headers .= "From: Remitente\r\n"; 
        
        //FUNCION PARA ENVIAR EL EMAIL
        mail($correo,$asunto,$comentario,$headers);
	
		
		//unset($_SESSION['carrito']);
		//header("Location: ../admin.php");

?>
<!DOCTYPE html>

<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/stilo.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="js/scripts.js"></script>

      
      <link rel="stylesheet" type="text/css" href="css/estilo.css">
  		<script type="text/javascript" src="js/validaciones.js"></script> 
  		
<br><br>


<link rel="stylesheet" href="../css/stylemenu.css">
  <link rel="stylesheet" href="../fonts/style.css">
  <script src="../js/jquery-latest.js"></script>
  <script src="../js/main.js"></script>

  <style type="text/css">

table{
	width: 50%;
	height: 20%;
	margin: auto;
	text-align: center;
}
</style>
</head>

<body style="padding:0px; margin:0px; background-color:#fff;font-family:Arial, sans-serif">
<div id="pagewrap">

<header id="hed">
       <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
        </div>
 
        <nav>
            <ul>
              
              
                <li><a href="cerrar.php" ><span class="icon-"></span>Regresar</a></li>
                
            </ul>
        </nav>
    </header>
	</div>

        
<center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
				<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
				<input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />


</body>
</html>