<?php 

session_start();

$importe = $_POST['importe'];
$acuenta = $_POST['acuenta'];

$_SESSION['importe'] = $importe;
$_SESSION['acuenta'] = $acuenta;

$x = $_SESSION['x'];


if (isset($acuenta) && !empty($acuenta)) {
	$calcula = $importe-$acuenta;
	$restante = $x -$acuenta;
}else{
	
	if ($importe < $x) {
		$restante = $x - $importe;
		$calcula = 0;
	}else{
		$calcula = $importe-$x;
		$restante = 0;
	}
}

echo "Cambio: $" . $calcula . "<br>";
echo "Restante: $".$restante. "<br>";
echo '<input type="text" name="txtCambio" value="'.$calcula.'" hidden/>';
echo '<input type="text" name="txtRestan" value="'.$restante.'" hidden/>';


?>