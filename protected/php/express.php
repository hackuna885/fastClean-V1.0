<?php 

session_start();

$varExpress = $_GET['varExpress'];

if ($varExpress == 1) {

$_SESSION['montoExpress'] = 2;

echo '
<input type="checkbox" name="express" value="0" onclick="ejecutarExpress(this.value)" checked/>Express
';

}else{

$_SESSION['montoExpress'] = 1;

echo '
<input type="checkbox" name="express" value="1" onclick="ejecutarExpress(this.value)"/>Express
';

}


 ?>