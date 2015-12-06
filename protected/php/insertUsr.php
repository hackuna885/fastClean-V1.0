<?php 

if (isset($_POST['txtNomUsr']) && !empty($_POST['txtNomUsr']) &&
	isset($_POST['txtPwUsr']) && !empty($_POST['txtPwUsr']) ) {

$IdUsr = $_POST['txtIdUsr'];
$Nombre = $_POST['txtNombre'];
$ApePat = $_POST['txtApePat'];
$ApeMat = $_POST['txtApeMat'];
$Direcc = $_POST['txtDirecc'];
$NumTelCasa = $_POST['txtNumTelCasa'];
$NumTelCel = $_POST['txtNumTelCel'];
$NomUsr = $_POST['txtNomUsr'];
$PwUsr = $_POST['txtPwUsr'];
$pwEncript = md5($PwUsr);
$TipUsr = $_POST['optTipUsr'];

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$cs = $con -> query("INSERT INTO catUsuarios (catUsrIDUsr, catUsrNombre, catUsrAPaterno, catUsrAMaterno, catUsrDirecc, catUsrTelCasa, catUsrTelCelu, catUsrNomUsr, catUsrPwUsr, catUsrPerUsr) VALUES('$IdUsr', '$Nombre','$ApePat','$ApeMat','$Direcc','$NumTelCasa','$NumTelCel','$NomUsr','$pwEncript','$TipUsr')");
$con -> close();

}


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Datos Insertados</title>
</head>
<body>
	<div class="cDerecho0">
 	<h2>Cuentas</h2>
 	<div class="tabScroll">
	<table>
	

		<?php 

			$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
			$cs = $con -> query("SELECT * FROM catUsuarios");
			while ($res = $cs -> fetchArray()) {
				$resId = $res['catUsrIDUsr'];
				$resUsr = $res['catUsrNomUsr'];
				$resPer = $res['catUsrPerUsr'];
				$resId2 = "'".$resId."'";

				if ($resPer == 1) {
					$resPer = "Administrador";
				}else{
					$resPer = "Usuario";
				}

				echo '
			<tr>
			<td class="p2x">'.$resId.'</td>
			<td class="p2x">'.$resUsr.'</td>
			<td class="p1x">'.$resPer.'</td>
			<td><button type="button" class="eliminar" onclick="eliminarAjax('.$resId2.')">Eliminar</button></td>
			</tr>
				';

			}
			$con -> close();

		 ?>
	</table>
	</div>
	</div>

</body>
</html>