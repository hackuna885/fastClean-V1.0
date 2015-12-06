<?php 

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

$kilos = $_POST['txtKgRopa'];
$kilosX = $kilos ." Kg(s)";

if (isset($kilos) && !empty($kilos)) {
	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$cs = $con -> query("SELECT * FROM catPrendas WHERE prenda = 'Kilogramo'");
	$rs = $cs -> fetchArray();
	$con -> close();

	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$cs2 = $con -> query("SELECT COUNT(id), MAX(id) FROM prendasTMP");
	$res2 = $cs2 -> fetchArray();
		$count = $res2[0];
		$max = $res2[1];
	$con -> close();

	$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
	$csFolio = $con -> query("SELECT COUNT(numFolio), MAX(numFolio),fUsado FROM catFolio");
	$resFolio = $csFolio -> fetchArray();
		$countF = $resFolio[0];
		$maxF = $resFolio[1];
		$fUsado = $resFolio[2];
	$con -> close();

	$monto = ($kilos * $rs['importe']) * $_SESSION['montoExpress'];

	if ($count == 0) {
		if ($countF == 0) {
			$idIns = "P0001";
			$numFolio = "A00001";
			$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
			$insertF = $con -> query("INSERT INTO catFolio (numFolio,fUsado,fStatus,fEntregado) VALUES('$numFolio',0,0,0)");
			$insert = $con -> query("INSERT INTO prendasTMP VALUES('$idIns','$kilosX','$monto','$numFolio','')");
			$con -> close();
			echo "<script> window.location='caja.php'; </script>";
		}else{
			if ($fUsado == 0) {
				$idIns = "P0001";
				$numFolio = $maxF;
				$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
				$insert = $con -> query("INSERT INTO prendasTMP VALUES('$idIns','$kilosX','$monto','$numFolio','')");
				$con -> close();
				echo "<script> window.location='caja.php'; </script>";
			}else{
				$idIns = "P0001";
				$numFolio = "A".substr((substr($maxF, 1) + 100001), 1);
				$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
				$insertF = $con -> query("INSERT INTO catFolio (numFolio,fUsado,fStatus,fEntregado) VALUES('$numFolio',0,0,0)");
				$insert = $con -> query("INSERT INTO prendasTMP VALUES('$idIns','$kilosX','$monto','$numFolio','')");
				$con -> close();
				echo "<script> window.location='caja.php'; </script>";
			}
		
		}
	}else{

		$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
		$idIns = "P".substr((substr($max, 1) + 10001), 1);
		$insert = $con -> query("INSERT INTO prendasTMP VALUES('$idIns','$kilosX','$monto','$maxF','')");
		$con -> close();
		echo "<script> window.location='caja.php'; </script>";
	}

}else{
	echo "<script> alert('Faltan Kg!'); </script>";
	echo "<script> window.location='lavado.php'; </script>";
}



 ?>