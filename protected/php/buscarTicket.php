<?php

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
$fechaRegCap = date("Y-m-d" . " " . "g:i a");

$variable = $_POST['buscarTicket'];

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar!");
$cs = $con -> query("SELECT numFolio,fUsado,fStatus,fEntregado, COUNT(id) AS encont FROM catFolio where numFolio = '$variable'");
$bus = $cs -> fetchArray();
$con -> close();


if ($bus['encont'] == 0) {
	echo '<h3>No tengo resultados!</h3>';
}else{

	switch ($bus['fEntregado']) {
		case 0:

		if ($bus['fUsado'] == 0) {
			echo '<h3>Folio Encontrado, No Usado!</h3>';
		}else{
			if ($bus['fStatus'] == 1) {
				echo '<h3>Pagado</h3>
			<br>
			<br>
			<form action="actEntrega.php" method="post">
		 		<input type="submit" class="btnEntrega" value="Entregar"/>
				<input type="text" name="txtFolioEnt" value="'.$bus['numFolio'].'" hidden/>
		 	</form>

			';
			}else{
				$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar!");
				$cs = $con -> query("SELECT * FROM histTicket where histTFolio = '$variable'");
				$busHist = $cs -> fetchArray();
				$cantidadRest = $busHist['histTRestante'];
				$_SESSION['numFolioTick'] = $bus['numFolio'];
				$_SESSION['cantidadRest'] = $cantidadRest;

				$con -> close();

				echo 'Restan: $'.$cantidadRest.'

				<br>
				<br>
				<form action="actEntrega2.php" method="post">
					<input class="inRegC" type="tel" id="cImporte" name="txtImpRec" placeholder="Importe Recibido $$$.." onkeyup="calcula()" maxlength="4" required/>
					<br>
					<br>
					<div id="resCambio">

					</div>
					
			 	</form>

					';
				
			}
		}
			
			break;
		case 1:	
			echo '<h3>Prenda Entregada!</h3>';
			break;
		case 2:
			echo '<h3>Folio CANCELADO!</h3>';
			break;
	}

}

 ?>
