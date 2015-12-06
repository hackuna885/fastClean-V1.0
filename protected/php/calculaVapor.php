<?php 

session_start();

$varVapor = $_GET['varVapor'];

if ($varVapor == 1) {

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$csP = $con -> query("SELECT importe FROM catPrendas WHERE prenda = 'Planchado Norm'");
$rsP = $csP -> fetchArray();
$varPlanNor = $rsP['importe'];
$csV = $con -> query("SELECT importe FROM catPrendas WHERE prenda = 'Planchado Vapor'");
$rsV = $csV -> fetchArray();
$varPlanVpr = $rsV['importe'];
$con -> close();

$pNormal = "alert('Plachado Normal!'); calculaPlancha()";
$pVapor = "alert('Plachado Vapor!'); calculaPlancha()";
$_SESSION['prendaVapor'] = $pVapor;

$_SESSION['pVapor'] = $varPlanVpr - $varPlanNor;

echo '
<input type="checkbox" name="vapor" value="0" onclick="ejecutarVapor(this.value); '.$pNormal.'" checked/>Planchado Vapor
';

}else{

$_SESSION['pVapor'] = 0;

echo '
<input type="checkbox" name="vapor" value="1" onclick="ejecutarVapor(this.value); '.$_SESSION['prendaVapor'].'"/>Planchado Vapor
';

}


 ?>