<?php 

include("contAcceso.php");

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">

 	<?php include("../../include/style.inc"); ?>
	<link rel="stylesheet" href="../../css/pTicket.css">

 	<title>Catálogos</title>
 </head>
 <body>
 	<div class="main_wrapper">
	<div class="cUno">
	<?php include("../../include/menu.inc"); ?>
	<div class="pTicket">
	<div class="c1Centro">
		<br>
		<div class="tituloEnt">
			<h1>Catalogo de Prendas</h1>
		</div>
		<div class="cuadroTablaCat">
		<table class="centTab2">
		 	<tr class="encTab">
		 		<td class="clEncTab"><h3>Prenda:</h3></td>
		 		<td class="clEncTab"><h3>Importe:</h3></td>
		 		<td></td>
		 	</tr>
		
	
	<?php 

		$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
		$cs = $con -> query("SELECT * FROM catPrendas ORDER BY prenda");
		while ($res = $cs -> fetchArray()) {

			echo '
			
			<tr>
		 		<td class="tabDer">'.$res[1].'</td>
		 		<td>$'.$res[2].'</td>
		 		<td><a href="actCatPrendas.php?idPrenda='.$res[0].'"><button class="btnXNorm">Actualizar</button></a></td>
		 	</tr>

			';
		}
		$con -> close();

	 ?>
		</table>
		</div>
	</div>
	</div>
	</div>
	</div>
 </body>
 </html>