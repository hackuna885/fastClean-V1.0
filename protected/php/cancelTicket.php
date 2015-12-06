<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtCancelTicket = $_POST['txtCancelTicket'];

if (isset($txtCancelTicket) && !empty($txtCancelTicket)) {

	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$cs = $con -> query("UPDATE catFolio SET fEntregado = '2' WHERE numFolio = '$txtCancelTicket'");
	$cs2 = $con -> query("UPDATE histTicket SET histTEstatus = 'C', histTTotalEntr = 0 WHERE histTFolio = '$txtCancelTicket'");
	$con -> close();

	echo "<script> alert('Folio CANCELADO!'); </script>";
	echo "<script> window.location='cancelar.php'; </script>";

}


 ?>