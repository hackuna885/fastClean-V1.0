<?php 

include("contAcceso.php");

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
$fechaRegCap = date("Y-m-d" . " " . "g:i a");

$_SESSION['montoExpress'] = 1;
$_SESSION['pVapor'] = 0;
$_SESSION['ganchoR'] = 0;

 ?>


 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">

 	<script>
 	function calculaPlancha(){
		var ajax;
		if (window.XMLHttpRequest) {
			ajax = new XMLHttpRequest();
		}else{
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var url = "calculaPlancha.php";
		var Piezas = document.getElementById("txtNumPiezas").value;
		var valores = "txtNumPiezas="+Piezas;

		ajax.open("POST",url,true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState==4 && ajax.status==200) {
				document.getElementById("midiv").innerHTML = ajax.responseText;
			}
		}

		ajax.send(valores);
	}
	</script>

	<script>
	function ejecutarExpress(str){
		var express;
		if (window.XMLHttpRequest) {
			express = new XMLHttpRequest();
		}else{
			express = new ActiveXObject("Microsoft.XMLHTTP");
		}

		express.onreadystatechange=function(){
			if (express.readyState==4 && express.status==200) {
				document.getElementById("areaExpress").innerHTML = express.responseText;
			}
		}
		express.open("GET","expressP.php?varExpress=" + str, true);
		express.send();
	}
	</script>
	<script>
	function ejecutarVapor(str){
		var vapor;
		if (window.XMLHttpRequest) {
			vapor = new XMLHttpRequest();
		}else{
			vapor = new ActiveXObject("Microsoft.XMLHTTP");
		}

		vapor.onreadystatechange=function(){
			if (vapor.readyState==4 && vapor.status==200) {
				document.getElementById("areaVapor").innerHTML = vapor.responseText;
			}
		}
		vapor.open("GET","calculaVapor.php?varVapor=" + str, true);
		vapor.send();
	}
	</script>
		<script>
	function ejecutarGancho(str){
		var gancho;
		if (window.XMLHttpRequest) {
			gancho = new XMLHttpRequest();
		}else{
			gancho = new ActiveXObject("Microsoft.XMLHTTP");
		}

		gancho.onreadystatechange=function(){
			if (gancho.readyState==4 && gancho.status==200) {
				document.getElementById("areaGancho").innerHTML = gancho.responseText;
			}
		}
		gancho.open("GET","calculaGancho.php?varGancho=" + str, true);
		gancho.send();
	}
	</script>

 	<?php include("../../include/style.inc"); ?>
 	<link rel="stylesheet" href="../../css/pTicket.css">
 	<title>Planchado</title>
 </head>
 <body>
 	<div class="main_wrapper">
	<div class="cUno">
	<?php include("../../include/menu.inc"); ?>
	<div class="pTicket">
	<div class="c1Centro">
		<br>
		<div class="tituloEnt">
			<h1>Planchado</h1>
		</div>
		<br>
		<div class="cIzqUno">

			<form action="insertPlanchado.php" method="post">

			<br>
			<div id="areaVapor" class="areaVapor">
			<input type="checkbox" name="vapor" value="1" onclick="ejecutarVapor(this.value); alert('Plachado Vapor!'); calculaPlancha()"/>Planchado Vapor
			</div>
			<br>
			<div id="areaGancho" class="areaGancho">
			<input type="checkbox" name="gancho" value="1" onclick="ejecutarGancho(this.value); alert('Con Gancho!'); calculaPlancha()"/>Gancho de Ropa
			</div>
			<br>
			<h2>Número de Piezas</h2>
			<br>
			<input class="inRegC" type="tel" id="txtNumPiezas" name="txtNumPiezas" placeholder="Cuantas Piezas?" onkeyup="calculaPlancha()" maxlength="2" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"  autofocus/>
			<br>
			<br>
			<div id="areaExpress" class="areaExpress2">
			<input type="checkbox" name="express" value="1" onclick="ejecutarExpress(this.value); alert('Express!'); calculaPlancha()"/>Express
			</div>
			<br>
			<input class="btnAct" id="ticket" type="submit" value="Agregar a Caja"/>
			</div>
			</form>

			<div class="cDerUno" id="midiv">
			<img src="../../css/img/PlanchadoNormal.png" alt="">
			<br>
			<br>
			<h3>Monto: $</h3>
		</div>
	</div>
	</div>
	</div>
	</div>
 </body>
 </html>