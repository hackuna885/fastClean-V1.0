<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$cs2 = $con -> query("SELECT COUNT(catUsrIDUsr), MAX(catUsrIDUsr) FROM catUsuarios");
$res2 = $cs2 -> fetchArray();
$count2 = $res2[0];
$max2 = $res2[1];
$con -> close();

if ($count2 == 0) {
	$idUsr2 = "A0001";
}else{
	$idUsr2 = "A".substr((substr($max2, 1) + 10001), 1);
}

echo '
<input type="text" class="inRegC" name="txtIdUsr" id="txtIdUsr" placeholder="Id de Usuario.." value="'.$idUsr2.'" disabled/>
';
 		

 ?>