<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

$fechaRegCap = date("Y-m-d" . " " . "g:i a");

$folioSalida = $_POST['txtFolioEnt'];

if (isset($folioSalida) && !empty($folioSalida)) {
	
	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$actFolio = $con -> query("UPDATE catFolio SET fEntregado = '1' WHERE numFolio = '$folioSalida'");
	$actHistFTick = $con -> query("UPDATE histTicket SET histTFechaEntP = '$fechaRegCap' WHERE histTFolio = '$folioSalida'");
	$con -> close();
	echo "<script> alert('Prenda Entregada!'); </script>";
	echo "<script> window.location='entrega.php'; </script>";
}else{
	echo "<script> window.location='entrega.php'; </script>";
}



 ?>