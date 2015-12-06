<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

if ($_SESSION['pVapor'] > 0) {


$piezas = $_POST['txtNumPiezas'];

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$cs = $con -> query("SELECT * FROM catPrendas WHERE prenda = 'Planchado Norm'");
$rs = $cs -> fetchArray();
$con -> close();

$monto = (($piezas * ($rs['importe'] + $_SESSION['pVapor'])) * $_SESSION['montoExpress']) + $_SESSION['ganchoR'];


echo '<img src="../../css/img/PlanchadoVapor.png" alt="">
			<br>
			<br>
			<h3>Monto: $'.$monto.'</h3>'
;


}else{

$piezas = $_POST['txtNumPiezas'];

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$cs = $con -> query("SELECT * FROM catPrendas WHERE prenda = 'Planchado Norm'");
$rs = $cs -> fetchArray();
$con -> close();

$monto = (($piezas * ($rs['importe'] + $_SESSION['pVapor'])) * $_SESSION['montoExpress']) + $_SESSION['ganchoR'];


echo '<img src="../../css/img/PlanchadoNormal.png" alt="">
			<br>
			<br>
			<h3>Monto: $'.$monto.'</h3>'
;

}

 ?>