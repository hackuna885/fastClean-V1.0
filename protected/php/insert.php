<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

if (isset($_POST['txtFolio']) && !empty($_POST['txtFolio'])) {
		
		$txtFolio = $_POST['txtFolio'];
		$txtCambio = $_POST['txtCambio'];
		$txtRestan = $_POST['txtRestan'];
		$txtFechaTick = $_POST['txtFechaTick'];

		$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
		$cs = $con -> query("SELECT * FROM prendasTMP WHERE folio = '$txtFolio'");
					while ($res = $cs -> fetchArray()) {

						$codArt = $res[0];
						$prenda = $res[1];
						$monto = $res[2];
						$folio = $res[3];

						$inHistVentas = $con -> query("INSERT INTO histVentas (histVFolio,histVCodArt,histVPrenda,histVMonto) VALUES('$folio','$codArt','$prenda','$monto')");
					}

		if ($_SESSION['acuenta'] == 0) {
			$impReal = $_SESSION['importe'];
		}else{
			$impReal = $_SESSION['acuenta'];
		}
		if ($impReal >= $_SESSION['x']) {
			$inHistTicket = $con -> query("INSERT INTO histTicket (histTFolio,histTTotal,histTRecibido,histTaCuenta,histTCambio,histTRestante,histTNombreC,histTDireccC,histTTelC,histTFechaTick,histTFechaEnt,histTFechaEntP,histTTotalEntr,histTEstatus) VALUES('$txtFolio','$_SESSION[x]','$_SESSION[importe]','$_SESSION[acuenta]','$txtCambio','$txtRestan','$_SESSION[txtNom]','$_SESSION[txtDir]','$_SESSION[txtTel]','$txtFechaTick','$_SESSION[txtFec]','','$_SESSION[x]','L')");
		}else{
			$inHistTicket = $con -> query("INSERT INTO histTicket (histTFolio,histTTotal,histTRecibido,histTaCuenta,histTCambio,histTRestante,histTNombreC,histTDireccC,histTTelC,histTFechaTick,histTFechaEnt,histTFechaEntP,histTTotalEntr,histTEstatus) VALUES('$txtFolio','$_SESSION[x]','$_SESSION[importe]','$_SESSION[acuenta]','$txtCambio','$txtRestan','$_SESSION[txtNom]','$_SESSION[txtDir]','$_SESSION[txtTel]','$txtFechaTick','$_SESSION[txtFec]','','$impReal','P')");
		}
		

		if ($txtRestan == 0) {
			$actCatFolio = $con -> query("UPDATE catFolio SET fUsado='1', fStatus='1' WHERE numFolio = '$txtFolio'");
		}else{
			$actCatFolio = $con -> query("UPDATE catFolio SET fUsado='1' WHERE numFolio = '$txtFolio'");
		}

		$delTmp = $con -> query("DELETE FROM prendasTMP");

		$con -> close();
		echo '

			<html>
				<head>
					<meta http-equiv="REFRESH" content="0; url=caja.php">
				</head>
			</html>

		';



}else{
	echo "<script> alert('Ocurrio un Error al Insertar!'); </script>";
	echo "<script> window.location='caja.php'; </script>";
}

 ?>