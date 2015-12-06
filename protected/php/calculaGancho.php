<?php 

session_start();

$varGancho = $_GET['varGancho'];

if ($varGancho == 1) {

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$csG = $con -> query("SELECT importe FROM catPrendas WHERE prenda = 'Gancho'");
$rsG = $csG -> fetchArray();
$varGanchoP = $rsG['importe'];
$con -> close();

$sinGancho = "alert('Sin Gancho!'); calculaPlancha()";
$conGancho = "alert('Con Gancho!'); calculaPlancha()";
$_SESSION['prendaCGancho'] = $conGancho;

$_SESSION['ganchoR'] = $varGanchoP;

echo '
<input type="checkbox" name="vapor" value="0" onclick="ejecutarGancho(this.value); '.$sinGancho.'" checked/>Gancho de Ropa
';

}else{

$_SESSION['ganchoR'] = 0;

echo '
<input type="checkbox" name="vapor" value="1" onclick="ejecutarGancho(this.value); '.$_SESSION['prendaCGancho'].'"/>Gancho de Ropa
';

}


 ?>