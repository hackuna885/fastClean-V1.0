<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtImport = $_POST['txtImport'];
$idPrenda = $_SESSION['idPrenda'];

if (isset($txtImport) && !empty($txtImport)) {
	
	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$cs = $con -> query("UPDATE catPrendas SET importe = '$txtImport' WHERE id = '$idPrenda'");
	$con -> close();
	echo "<script>alert('Datos Actualizados!');</script>";
	echo "<script>window.location='catalogos.php';</script>";
}else{
	echo "<script>window.location='catalogos.php';</script>";
}

 ?>