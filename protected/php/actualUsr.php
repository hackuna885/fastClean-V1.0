<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

if (isset($_POST['txtPwUsr']) && !empty($_POST['txtPwUsr'])) {
	$txtIdUsr = $_POST['txtIdUsr2'];
	$txtNombre = $_POST['txtNombre'];
	$txtApePat = $_POST['txtApePat'];
	$txtApeMat = $_POST['txtApeMat'];
	$txtDirecc = $_POST['txtDirecc'];
	$txtNumTelCasa = $_POST['txtNumTelCasa'];
	$txtNumTelCel = $_POST['txtNumTelCel'];
	$txtNomUsr = $_POST['txtNomUsr'];
	$txtPwUsr = md5($_POST['txtPwUsr']);
	$optTipUsr = $_POST['optTipUsr'];


	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$cs = $con -> query("UPDATE catUsuarios SET catUsrNombre='$txtNombre', catUsrAPaterno='$txtApePat', catUsrAMaterno='$txtApeMat', catUsrDirecc='$txtDirecc', catUsrTelCasa='$txtNumTelCasa', catUsrTelCelu='$txtNumTelCel', catUsrNomUsr='$txtNomUsr', catUsrPwUsr='$txtPwUsr', catUsrPerUsr='$optTipUsr' WHERE catUsrIDUsr = '$txtIdUsr'");
	$con-> close();

	echo '

	<html>
		<head>
			<meta http-equiv="REFRESH" content="0; url=usuarios.php">
		</head>
	</html>

	';
}else{
	
	echo '

	<html>
		<head>
			<meta http-equiv="REFRESH" content="0; url=usuarios.php">
		</head>
	</html>

	';
}

 ?>