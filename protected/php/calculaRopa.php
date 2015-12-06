<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

$kilos = $_POST['txtKgRopa'];

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$cs = $con -> query("SELECT * FROM catPrendas WHERE prenda = 'Kilogramo'");
$rs = $cs -> fetchArray();
$con -> close();

$monto = ($kilos * $rs['importe']) * $_SESSION['montoExpress'];


echo '<img src="../../css/img/Lavado.png" alt="">
			<br>
			<br>
			<h3>Monto: $'.$monto.'</h3>'

 ?>