<?php 

include("contAcceso.php");

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$idPrenda = $_GET['idPrenda'];
$_SESSION['idPrenda'] = $idPrenda;

 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<?php include("../../include/style.inc"); ?>
	<link rel="stylesheet" href="../../css/pTicket.css">
 	<title>Actualiza Importe de Catalogo de Prendas</title>
  </head>
 <body>
 	<div class="main_wrapper">
	<div class="cUno">
	<?php include("../../include/menu.inc"); ?>
	<div class="pTicket">
	<div class="c1Centro">
		<br>
		<div class="tituloEnt">
			<h1>Actualizar Prenda</h1>
		</div>
		<div class="cuadroTablaCat2">
		<table class="centTab2">
		 	<tr class="encTab">
		 		<td class="clEncTab"><h3>Prenda:</h3></td>
		 		<td class="clEncTab"><h3>Importe:</h3></td>
		 		<td></td>
		 	</tr>
		
		<form action="gActCatPrendas.php" method="post">
	<?php 

		$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
		$cs = $con -> query("SELECT * FROM catPrendas WHERE id = '$idPrenda'");
		while ($res = $cs -> fetchArray()) {

			echo '
			
			<tr>
		 		<td class="tabDer">'.$res[1].'</td>
		 		<td>$<input type="tel" name="txtImport" class="inImp" value="'.$res[2].'" min="1" max="999" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" autofocus/></td>
		 		

			';
		}
		$con -> close();

	 ?>
		 		<td><input type="submit" class="btnXNorm" value="Guardar"/></td>
			</tr>
		</table>
		</form>
		<br>
		<a href="catalogos.php"><button class="cancelXNorm" >Cancelar</button></a>
	</div>
	</div>
	</div>
	</div>
	</div>
 </body>
 </html>