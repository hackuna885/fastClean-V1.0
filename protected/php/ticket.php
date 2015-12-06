<?php 

include("contAcceso.php");

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
$fechaRegCap = date("Y-m-d" . " " . "g:i a");

		$txtNom = "";
		$txtDir = "";
		$txtTel = "";
		$txtFec = "";


if (isset($_POST['btn1'])) {
	$btn = $_POST['btn1'];

	if ($btn == "CANCELAR") {
		$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
		$eli = $con -> query("DELETE FROM prendasTMP ");
		$con -> close();
		
		echo "<script> alert('Venta CANCELADA!');</script>";
		echo "<script> window.location='caja.php';</script>";
	}
	if ($btn == "TICKET") {

		if (isset($_POST['txtNom']) && !empty($_POST['txtNom'])) {

			$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
			$csImp = $con -> query("SELECT SUM(importe) FROM prendasTMP");
			$resImp = $csImp -> fetchArray();
			$totCImp = $resImp[0];

			if ($totCImp > 0) {

				$txtNom = $_POST['txtNom'];
				$txtDir = $_POST['txtDir'];
				$txtTel = $_POST['txtTel'];
				$txtFec = $_POST['txtFec'];

				$_SESSION['txtNom'] = $txtNom;
				$_SESSION['txtDir'] = $txtDir;
				$_SESSION['txtTel'] = $txtTel;
				$_SESSION['txtFec'] = $txtFec;
					
				$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
				$csTotTick = $con -> query("SELECT folio, SUM(importe) FROM prendasTMP");
				$resTotTick = $csTotTick -> fetchArray();
				$impTotal = $resTotTick[1];
				$noTick = $resTotTick[0];
				$_SESSION['noTick'] = $noTick;
				$_SESSION['x'] = $impTotal;
				$con -> close();
				
			}else{
				echo "<script> alert('Falta Prenda!'); </script>";
				echo "<script> window.location='caja.php'; </script>";
			}

				

			
		}else{
			echo "<script> alert('Faltan Nombre en la nota!'); </script>";
			echo "<script> window.location='caja.php'; </script>";
		}



	}
}else{
			
			echo "<script> window.location='caja.php'; </script>";
		}


 ?>


 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<?php include("../../include/style.inc"); ?>
 	<link rel="stylesheet" href="../../css/pTicket.css">
 	<script type="text/javascript">
	function ejecutarAjax(){
		var ajax;
		if (window.XMLHttpRequest) {
			ajax = new XMLHttpRequest();
		}else{
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var url = "calcula.php";
		var imp = document.getElementById("importe").value;
		var acu = document.getElementById("acuenta").value;
		var valores = "importe="+imp+"&acuenta="+acu;

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
 	<title>Ticket</title>
 </head>
 <body>
 	<div class="main_wrapper">
	<div class="cUno">
	<?php include("../../include/menu.inc"); ?>
	<div class="pTicket">
	<div class="c1Centro">
		<div class="ticket1">
			<img class="imglogo" src="../../img/logo.png" alt="">
			<p class="txtTicket">
				Mariano Escobedo #20 Col. Zaragoza C.P. 54457. Nicolás Romero. Edo-Méx. Tel: 1660-3794
			</p>
			<p class="txtTicket">
			Horarios de Lunes a Viernes: 9:00 am. - 8:00 pm. Sábados y Domingos: 9:00 am. - 2:00 pm.
			</p>
			
			<table class="centTab">
					<tr>
						<td class="tabTicket">Folio</td>
						<td class="tabTicket">Cod. Arti</td>
						<td class="tabTicket">Prenda</td>
						<td class="tabTicket">Monto</td>
					</tr>
				<?php 

					$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
					$cs = $con -> query("SELECT * FROM prendasTMP");
					while ($res = $cs -> fetchArray()) {

						$codArt = $res[0];
						$prenda = $res[1]." ".$res[4];
						$monto = $res[2];
						$folio = $res[3];

						echo '
							

							<tr>
								<td class="tabTicket">'.$folio.'</td>
								<td class="tabTicket">'.$codArt.'</td>
								<td class="tabTicketDer">'.$prenda.'</td>
								<td class="tabTicket">$'.$monto.'</td>
							</tr>

						';
					}
					$con -> close();
				 ?>
				 <tr>
						<td class="tabTicket"></td>
						<td class="tabTicket"></td>
						<td class="tabTicketDer">Total: </td>
						<td class="tabTicket">$<?php echo $impTotal; ?></td>
					</tr>
			</table>
			
			<p class="txtTicketAIz">
				Nombre: <?php  echo $txtNom; ?>
				<br>
				Dirección: <?php  echo $txtDir; ?>
				<br>
				Teléfono: <?php  echo $txtTel; ?>
				<br>
				Fecha Ticket: <?php  echo $fechaRegCap; ?> 
				<br>
				Fecha Entrega: <?php  echo $txtFec  . " 2:00 pm"; ?>
				<br>
				Te Atendió: <?php echo $_SESSION['UsrNombre']; ?>
				<br>
			</p>
			<p class="txtTicketCod">
				<?php echo '*'.$noTick.'*'; ?>
			</p>
			<p class="txtTicket">
				No. Ticket: <?php echo $noTick; ?>
			</p>
			<br>
			<br>
		</div>
		<div class="cForm">
			<form action="impTick.php" method="post">
				<p class="cajaBold">Total a pagar: $<?php echo $impTotal; ?></p>
				<br>
				<input class="inRegC" type="tel" id="importe" name="txtImpRec" placeholder="Importe Recibido $$$.." onkeyup="ejecutarAjax()" required  maxlength="4" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" autofocus/>
				<br>
				<br>
				<input class="inRegC" type="tel" id="acuenta" name="txtACuent" placeholder="A cuenta $$$.." onkeyup="ejecutarAjax()" maxlength="4" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
				<br>
				<br>
				<div id="resCambio" class="cajaBold">
				Cambio: $
				<br>
				Restante: $
				</div>
				<br>
				<input class="btnAct" id="ticket" type="submit" value="Imprimir"/>
				<br>
				<button class="btnAct" id="cancel" type="button" onclick="window.location='caja.php';">Regresar..</button>
			</form>
		</div>
	</div>
	</div>
	</div>
	</div>
 </body>
 </html>