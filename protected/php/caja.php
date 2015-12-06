<?php 

include("contAcceso.php");

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

$_SESSION['montoExpress'] = 1;

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

	<?php include("../../include/style.inc"); ?>
	
	<script type="text/javascript">
		function ejecutarAjax(str){

			var conexion;
			if (window.XMLHttpRequest) {
				conexion = new XMLHttpRequest();
			}else{
				conexion = new ActiveXObject("Microsoft.XMLHTTP");
			}
			conexion.onreadystatechange=function(){
				if (conexion.readyState==4 && conexion.status==200) {
					document.getElementById("midiv").innerHTML = conexion.responseText;
				}
			}
			conexion.open("GET", "notas.php?btn="+ str, true);
			conexion.send();
		}
	</script>
		<script>
		function ajaxObserva(str){

		var cambioObser;
		if (window.XMLHttpRequest) {
			cambioObser = new XMLHttpRequest();
		}else{
			cambioObser = new ActiveXObject("Microsoft.XMLHTTP");
		}
		cambioObser.onreadystatechange= function(){
			if (cambioObser.readyState==4 && cambioObser.status==200) {
			}
		}
		cambioObser.open("GET","accion.php?variable="+ str, true);
		cambioObser.send();

	}
	</script>
		<script>
	function ejecutarExpress(str){
		var express;
		if (window.XMLHttpRequest) {
			express = new XMLHttpRequest();
		}else{
			express = new ActiveXObject("Microsoft.XMLHTTP");
		}

		express.onreadystatechange=function(){
			if (express.readyState==4 && express.status==200) {
				document.getElementById("areaExpress").innerHTML = express.responseText;
			}
		}
		express.open("GET","express.php?varExpress=" + str, true);
		express.send();

	}
	</script>
	<title>Caja</title>
</head>
<body>
	<div class="main_wrapper">
	<div class="cUno">

	<?php include("../../include/menu.inc"); ?>

	<div class="reticula">
		<button class="btnCuadro" id="btn1" type="button" onclick="ejecutarAjax('Abrigo 3/4')"><p>Abrigo 3/4</p></button>
		<button class="btnCuadro" id="btn1" type="button" onclick="ejecutarAjax('Abrigo Ch')"><p>Abrigo Ch</p></button>
		<button class="btnCuadro" id="btn1" type="button" onclick="ejecutarAjax('Abrigo L')"><p>Abrigo L</p></button>
		<button class="btnCuadro" id="btn2" type="button" onclick="ejecutarAjax('Almidón')"><p>Almidón</p></button>
		<button class="btnCuadro" id="btn3" type="button" onclick="ejecutarAjax('Blusa')"><p>Blusa</p></button>
		<button class="btnCuadro" id="btn4" type="button" onclick="ejecutarAjax('Camisa')"><p>Camisa</p></button>
		<button class="btnCuadro" id="btn5" type="button" onclick="ejecutarAjax('Capa')"><p>Capa</p></button>
		<button class="btnCuadro" id="btn6" type="button" onclick="ejecutarAjax('Chaleco')"><p>Chaleco</p></button>
		<button class="btnCuadro" id="btn7" type="button" onclick="ejecutarAjax('Chamarra Piel')"><p id="txtL">Chamarra Piel</p></button>
		<button class="btnCuadro" id="btn8" type="button" onclick="ejecutarAjax('Chamarra Pluma')"><p id="txtL">Chamarra Pluma</p></button>
		<button class="btnCuadro" id="btn9" type="button" onclick="ejecutarAjax('Colcha I')"><p>Colcha I</p></button>
		<button class="btnCuadro" id="btn9" type="button" onclick="ejecutarAjax('Colcha K')"><p>Colcha K</p></button>
		<button class="btnCuadro" id="btn9" type="button" onclick="ejecutarAjax('Colcha M')"><p>Colcha M</p></button>
		<br>
		<button class="btnCuadro" id="btn9" type="button" onclick="ejecutarAjax('Colcha Q')"><p>Colcha Q</p></button>
		<button class="btnCuadro" id="btn10" type="button" onclick="ejecutarAjax('Corbata')"><p>Corbata</p></button>
		<button class="btnCuadro" id="btn11" type="button" onclick="ejecutarAjax('Cortina')"><p>Cortina</p></button>
		<button class="btnCuadro" id="btn12" type="button" onclick="ejecutarAjax('Edredón I')"><p>Edredón I</p></button>
		<button class="btnCuadro" id="btn12" type="button" onclick="ejecutarAjax('Edredón K')"><p>Edredón K</p></button>
		<button class="btnCuadro" id="btn12" type="button" onclick="ejecutarAjax('Edredón M')"><p>Edredón M</p></button>
		<button class="btnCuadro" id="btn12" type="button" onclick="ejecutarAjax('Edredón Q')"><p>Edredón Q</p></button>
		<button class="btnCuadro" id="btn13" type="button" onclick="ejecutarAjax('Falda')"><p>Falda</p></button>
		<button class="btnCuadro" id="btn14" type="button" onclick="ejecutarAjax('Gabardina 3/4')"><p>Gabardina 3/4</p></button>
		<button class="btnCuadro" id="btn14" type="button" onclick="ejecutarAjax('Gabardina Ch')"><p>Gabardina Ch</p></button>
		<button class="btnCuadro" id="btn14" type="button" onclick="ejecutarAjax('Gabardina L')"><p>Gabardina L</p></button>
		<button class="btnCuadro" id="btn31" type="button" onclick="ejecutarAjax('Gancho')"><p>Gancho</p></button>
		<button class="btnCuadro" id="btn17" type="button" onclick="ejecutarAjax('Mantel')"><p>Mantel</p></button>
		<br>
		
		<button class="btnCuadro" id="btn18" type="button" onclick="ejecutarAjax('Otros')"><p>Otros</p></button>
		<button class="btnCuadro" id="btn18" type="button" onclick="ejecutarAjax('Otros.')"><p>Otros 1</p></button>
		<button class="btnCuadro" id="btn18" type="button" onclick="ejecutarAjax('Otros..')"><p>Otros 2</p></button>
		<button class="btnCuadro" id="btn19" type="button" onclick="ejecutarAjax('Pantalón')"><p>Pantalón</p></button>
		<button class="btnCuadro" id="btn20" type="button" onclick="ejecutarAjax('Planchado Norm')"><p>Planchado N</p></button>
		<button class="btnCuadro" id="btn21" type="button" onclick="ejecutarAjax('Planchado Vapor')"><p>Planchado V</p></button>
		<button class="btnCuadro" id="btn22" type="button" onclick="ejecutarAjax('Sacos')"><p>Sacos</p></button>
		<button class="btnCuadro" id="btn23" type="button" onclick="ejecutarAjax('Sweater')"><p>Sweater</p></button>
		<button class="btnCuadro" id="btn24" type="button" onclick="ejecutarAjax('Trajes 2 Pzas')"><p>Trajes 2 Pzas</p></button>
		<button class="btnCuadro" id="btn24" type="button" onclick="ejecutarAjax('Trajes 3 Pzas')"><p>Trajes 3 Pzas</p></button>
		<button class="btnCuadro" id="btn25" type="button" onclick="ejecutarAjax('Vestido Corto')"><p>Vestido C</p></button>
		<button class="btnCuadro" id="btn26" type="button" onclick="ejecutarAjax('Vestido Largo')"><p>Vestido L</p></button>
		<button class="btnCuadro" id="btn15" type="button" onclick="ejecutarAjax('Kilogramo')"><p>1 Kilogramo</p></button>
	</div>
	<div class="cDerecho">
		<h2>Prendas</h2>

		<div class="cPrendas" id="midiv">

			<?php 
$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$cs3 = $con -> query("SELECT * FROM prendasTMP");

$cs4 = $con -> query("SELECT SUM(importe) FROM prendasTMP");
$res4 = $cs4 -> fetchArray();

echo '
<table>';

while ($res3 = $cs3 -> fetchArray()) {

	$obser = "'".$res3[0]."' + this.value";

	echo '

		<tr>
			<td class="p1">'.$res3[1].'</td>
			<td class="p4"><input type="text" class="miniText" name="txtObs"  onkeyup="ajaxObserva('.$obser.')" value="'.$res3['observa'].'" /></td>
			<td class="p2">$'.$res3[2].'</td>
			<td class="p3"><button class="eliminar" type="button" value="'.$res3[0].'" onclick="ejecutarAjax(this.value)">Eliminar</button></td>
		</tr>

	';
}
$con -> close();

echo '
		<div class="cTotal">
		Total: '.$res4[0].'
		</div>
</table>';

			 ?>

		</div>
		
		<div class="cBtnImpre">
			<form action="ticket.php" method="post">
				<input class="btnAct" id="ticket" type="submit" name="btn1" value="TICKET"/>
				<br>
				<input class="btnAct" id="cancel" type="submit" name="btn1" value="CANCELAR"/>
		</div>
	</div>
	</div>
	<div class="cDos">
		<input type="text" class="inReg" name="txtNom" placeholder="Nombre..." autofocus/>
		<div id="areaExpress" class="areaExpress">
		<input type="checkbox" name="express" value="1" onclick="ejecutarExpress(this.value)"/>Express
		</div>
		<br>
		<input type="text" class="inLar" name="txtDir" placeholder="Dirección..."/>
		<input type="tel" class="inCor" name="txtTel" placeholder="Teléfono..." maxlength="13" />
		<input type="date" class="inCor" name="txtFec" placeholder="Fecha..." min="<?php echo date("Y-m-d"); ?>" max="2018-12-31" value="<?php echo date("Y-m-d"); ?>"/>
		</form>
	</div>
	</div>
</body>
</html>