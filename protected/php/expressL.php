<?php 

session_start();

$varExpress = $_GET['varExpress'];

if ($varExpress == 1) {


$sinExpress = "alert('Normal!'); calculaRopa()";
$conExperss = "alert('Express!'); calculaRopa()";
$_SESSION['modoExp'] = $conExperss;	

$_SESSION['montoExpress'] = 2;

echo '
<input type="checkbox" name="express" value="0" onclick="ejecutarExpress(this.value); '.$sinExpress.'" checked/>Express
';

}else{

$_SESSION['montoExpress'] = 1;

echo '
<input type="checkbox" name="express" value="1" onclick="ejecutarExpress(this.value); '.$_SESSION['modoExp'].'"/>Express
';

}


 ?>