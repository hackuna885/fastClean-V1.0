<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

if (isset($_POST['txtUsr']) && !empty($_POST['txtUsr']) &&
	isset($_POST['txtPw']) && !empty($_POST['txtPw'])) {

	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$cs = $con -> query("SELECT * FROM catUsuarios WHERE catUsrNomUsr = '$_POST[txtUsr]'");
	$rs = $cs -> fetchArray();
	$con -> close();

	if ($rs['catUsrPwUsr'] == md5($_POST['txtPw'])) {
		$_SESSION['username'] = $_POST['txtUsr'];
		$_SESSION['UsrNombre'] = $rs['catUsrNombre'];
		$_SESSION['permisos'] = $rs['catUsrPerUsr'];
		echo '
			<html>
				<head>
					<meta http-equiv="REFRESH" content="0; url=caja.php">
				</head>
			</html>
		';
	}else{
		echo "<script> alert('Usuario o Password Incorrecto!'); </script>";
		echo "<script> window.location='login.php'; </script>";
	}



}else{
	echo "<script> alert('Rellena todos los Campos!'); </script>";
	echo "<script> window.location='login.php'; </script>";
}


 ?>