<?php 

session_start();

$cImporte = $_POST['cImporte'];
$x = $_SESSION['cantidadRest'];
$numFolioTick = $_SESSION['numFolioTick'];

if (isset($cImporte)) {

	if ($cImporte < $x) {
		$calcula = $x - $cImporte;
		echo "Cambio: $0 <br>";
		echo "Faltan: $".$calcula;
	}else{
		$calcula = $cImporte - $x;
		echo "Cambio: $".$calcula."<br>";
		echo "Faltan: $0";
		echo '
				<br>
				<br>
		 		<input type="submit" class="btnEntrega" value="Entregar" />
		 		<input type="text" name="txtFolioEnt" value="'.$numFolioTick.'" hidden/>
		 		<input type="text" name="txtTotalEnt" value="'.$x.'" hidden/>
		 		<input type="text" name="txtRecibiEnt" value="'.$cImporte.'" hidden/>
		 		<input type="text" name="txtCambioEnt" value="'.$calcula.'" hidden/>
		 	';
	}
}

?>