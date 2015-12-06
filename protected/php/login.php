<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include("../../include/style.inc"); ?>
	<link rel="stylesheet" href="../../css/pTicket.css">
	<title>Iniciar Sesión</title>
</head>
<body>
	<div class="main_wrapper">
	<div class="cUno">
	<div class="cLogin">
		<br>
		<img src="../../img/logo.png" alt="logo" class="imglogo">
		<h2>Iniciar Sesión</h2>
		<form action="verifica.php" method="post">
			<br>
			<input type="text"  class="inRegC" name="txtUsr" placeholder="Usuario..." required autofocus/>
			<br>
			<br>
			<input type="password"  class="inRegC" name="txtPw" placeholder="Password..." required/>
			<br>
			<br>
			<input type="submit" class="btnAct" id="ticket" value="Entrar"/>
		</form>
	</div>
	</div>
	</div>
</body>
</html>