<?php

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
$fechaRegCap = date("Y-m-d" . " " . "g:i a");

$variable = $_POST['buscarTicket'];

if (isset($variable) && !empty($variable)) {

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar!");
$cs = $con -> query("SELECT histTFolio,histTNombreC,histTFechaTick,histTFechaEntP FROM histTicket where histTNombreC LIKE '%$variable%'");

echo '

<table>
	<tr>
		<td class="p5">Folio</td>
		<td class="p5">Nombre</td>
		<td class="p5">Fecha de Ticket</td>
		<td class="p5">Fecha de Entrega</td>
	</tr>

';


while ( $bus = $cs -> fetchArray()) {
	echo '

		<tr>
		<td class="p1">'.$bus[0].'</td>
		<td class="p4">'.$bus[1].'</td>
		<td class="p4">'.$bus[2].'</td>
		<td class="p4">'.$bus[3].'</td>
		</tr>
';

}
$con -> close();

echo '

</table>

';


}else{
	echo "<h3>Estatus de Ticket:</h3>";
}



 ?>