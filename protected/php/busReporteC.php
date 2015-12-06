<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$fechaIni = $_SESSION['varFechaIni'];
$fechaFin = $_SESSION['varFechaFin'];
$optReport = $_SESSION['varOptReport'];

if ($fechaFin >= $fechaIni) {

	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$cs = $con -> query("SELECT histTFolio, histTFechaTick, histTEstatus, histTTotalEntr, SUBSTR(histTFechaTick, 1, 10) AS FechaTicket FROM histTicket WHERE FechaTicket BETWEEN '$fechaIni' AND '$fechaFin' AND histTEstatus LIKE '%$optReport%' ORDER BY histTFolio");
	$cs2 = $con ->query("SELECT SUM(histTTotalEntr) AS impTotal, SUBSTR(histTFechaTick, 1, 10) AS FechaTicket FROM histTicket WHERE FechaTicket BETWEEN '$fechaIni' AND '$fechaFin' AND histTEstatus LIKE '%$optReport%'");	

}else{
	echo "<script> alert('La Fecha Final no puede ser Menor!'); </script>";
	echo "<script> window.location='reportes.php'; </script>";
}



 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="../../css/impTickC.css">
	<link rel="stylesheet" href="../../css/impTickC2.css" media="print">
 	<title>Corte del Día: </title>
 </head>
 <body>
<!--  <body onload="window.print();"> -->
 	<div class="main_wrapper">
 		<div class="tickImpre">
			<img class="imglogo" src="../../img/logo.png" alt="">
			<p class="imptxt">
				Mariano Escobedo #20 Col. Zaragoza C.P. 54457. Nicolás Romero. Edo-Méx. Tel: 1660-3794
			</p>
			<br>
			<p>"Corte de caja: <span class="Enc"><?php echo $fechaIni. '</span> al <span class="Enc">' .$fechaFin; ?></span>" </p>
			<br>
 	<table class="centTab">
 		<tr>
 			<td class="Enc">Folio</td>
 			<td class="Enc">Fecha</td>
 			<td class="Enc">Estatus</td>
 			<td class="Enc">Monto</td>
 		</tr>
 		
 			<?php 
 				while ($res = $cs -> fetchArray()) {

 					echo '
 					<tr>
					<td class="tTab">'.$res['histTFolio'].'</td>
		 			<td class="tTab">'.$res['histTFechaTick'].'</td>
		 			<td class="tTab">'.$res['histTEstatus'].'</td>
		 			<td class="tTab">$'.$res['histTTotalEntr'].'</td>
		 			</tr>
 					';
				}
				$res2 = $cs2 -> fetchArray();
					echo '
					<tr>
			 			<td></td>
			 			<td></td>
			 			<td class="Enc">Total: </td>
			 			<td class="Enc">$'.$res2['impTotal'].'</td>
			 		</tr>
					';
				$con -> close();
 			 ?>
 	</table>
	 	</div>
	 	<div class="botonera">
		<input class="btnAct" id="ticket" type='button' onclick='window.print();' value='Re-Imprimir Carta' />
		<br>
		<button type="button" class="btnAct" id="cancel" onclick="window.location='reportes.php'">Regresar..</button>
	</div>
	</div>
 </body>
 </html>