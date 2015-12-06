<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

$fechaRegCap = date("Y-m-d" . " " . "g:i a");
$fechaRegCapS = date("Y-m-d");

$folioSalida = $_POST['txtFolioEnt'];
$txtTotalEnt = $_POST['txtTotalEnt'];
$txtRecibiEnt = $_POST['txtRecibiEnt'];
$txtCambioEnt = $_POST['txtCambioEnt'];


$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$cs = $con -> query("SELECT * FROM histTicket WHERE histTFolio = '$folioSalida'");
$res = $cs -> fetchArray();
$tNombreC = $res['histTNombreC'];
$tDireccC = $res['histTDireccC'];
$tTelC = $res['histTTelC'];
$con -> close();

if (isset($folioSalida) && !empty($folioSalida)) {
	
	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$actFolio = $con -> query("UPDATE catFolio SET fStatus = '1', fEntregado = '1' WHERE numFolio = '$folioSalida'");
	$actHistFTick = $con -> query("UPDATE histTicket SET histTFechaEntP = '$fechaRegCap' WHERE histTFolio = '$folioSalida'");
	$inHistTicket = $con -> query("INSERT INTO histTicket (histTFolio,histTTotal,histTRecibido,histTaCuenta,histTCambio,histTRestante,histTNombreC,histTDireccC,histTTelC,histTFechaTick,histTFechaEnt,histTFechaEntP,histTTotalEntr,histTEstatus) VALUES('$folioSalida','$txtTotalEnt','$txtRecibiEnt','','$txtCambioEnt','','$tNombreC','$tDireccC','$tTelC','$fechaRegCap','$fechaRegCapS','$fechaRegCap','$txtTotalEnt','L')");
	$con -> close();
	echo "<script> alert('Prenda Entregada!'); </script>";
	echo "<script> window.location='entrega.php'; </script>";
}else{
	echo "<script> window.location='entrega.php'; </script>";
}


 ?>