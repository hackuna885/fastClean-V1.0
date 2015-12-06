<?php 

include("contAcceso.php");

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">

 	<?php include("../../include/style.inc"); ?>
	<link rel="stylesheet" href="../../css/pTicket.css">
	<link rel="stylesheet" href="../../css/reportes.css">
 	<title>Reportes</title>
 </head>
 <body>
 	<div class="main_wrapper">
	<div class="cUno">
	<?php include("../../include/menu.inc"); ?>
	<div class="pTicket">
	<div class="c1Centro">
		<br>
		<div class="tituloEnt">
			<h1>Reportes</h1>
		</div>
		<div class="cReportBus">
			<div class="cBusUno">
			<form action="busReporte.php" method="post">
				<div class="cFechaBus">
					<h2>Fecha Inicial</h2>
					<br>
					<input type="date" class="inCor" name="txtFechaIni" value="<?php echo date("Y-m-d"); ?>"/>
				</div>
				<div class="cFechaBus">
					<h2>Fecha Final</h2>
					<br>
					<input type="date" class="inCor" name="txtFechaFin" value="<?php echo date("Y-m-d"); ?>"/>
				</div>
			</div>
			<div class="cBusDos">
				<select name="optReport" id="" class="optReport">
					<option value="">Normal</option>
					<option value="P">Pendientes</option>
					<option value="L">Liquidados</option>
					<option value="C">Cancelados</option>
				</select>
				<br>
				<br>
				<input type="submit" class="btnBusRep" value="Buscar"/>
			</div>
			</form>
		</div>
	</div>
	</div>
	</div>
	</div>
 </body>
 </html>