<?php 

include("contAcceso.php");

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
$fechaRegCap = date("Y-m-d" . " " . "g:i a");

 ?>


 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<script type="text/javascript">
 	function ejecutarAjax(){
 		var ajax;
		if (window.XMLHttpRequest) {
			ajax = new XMLHttpRequest();
		}else{
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var url = "buscarTicketCancel.php";
		var busTick = document.getElementById("txtBusTick").value;
		var valores = "buscarTicket="+busTick;

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
 	function calcula(){
		var ajax;
		if (window.XMLHttpRequest) {
			ajax = new XMLHttpRequest();
		}else{
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var url = "calcula2.php";
		var imp = document.getElementById("cImporte").value;
		var valores = "cImporte="+imp;

		ajax.open("POST",url,true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState==4 && ajax.status==200) {
				document.getElementById("resCambio").innerHTML = ajax.responseText;
			}
		}

		ajax.send(valores);
	}
	</script>
 	<script>
 		function validateEnter(e) {
		var key=e.keyCode || e.which;
		if (key==13){ return true; } else { return false; }
		
	}
 	</script>

 	<?php include("../../include/style.inc"); ?>
 	<link rel="stylesheet" href="../../css/pTicket.css">
 	<title>Cancelar Ticket</title>
 </head>
 <body>
 	<div class="main_wrapper">
	<div class="cUno">
	<?php include("../../include/menu.inc"); ?>
	<div class="pTicket">
	<div class="c1Centro">
		<br>
		<div class="tituloEnt">
			<h1>Cancelar Ticket</h1>
		</div>
		<br>
		<div class="cIzqUno">
			<br>
			<h2>Código de Ticket</h2>
			<br>
			<input class="inRegC" type="text" id="txtBusTick" name="txtCodEnt" placeholder="Código de 6 dígitos" onkeyup="if(validateEnter(event) == true) { ejecutarAjax(); }" maxlength="6" autofocus/>
			<br>
			<br>
			<input class="btnAct" id="ticket" type="submit" value="Buscar Ticket" onclick="ejecutarAjax();" />
		</div>
		<div class="cDerUno" id="midiv">
			<h3>Estatus de Ticket:</h3>
		</div>
	</div>
	</div>
	</div>
	</div>
 </body>
 </html>