<?php 

include("contAcceso.php");

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
$cs = $con -> query("SELECT COUNT(catUsrIDUsr), MAX(catUsrIDUsr) FROM catUsuarios");
$res = $cs -> fetchArray();
$count = $res[0];
$max = $res[1];
$con -> close();

if ($count == 0) {
	$idUsr = "A0001";
}else{
	$idUsr = "A".substr((substr($max, 1) + 10001), 1);
}

 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>Usuario</title>
 	<script type="text/javascript">
 	function insertarDatos(){

 		var conexion;
 		if (window.XMLHttpRequest) {
 			conexion = new XMLHttpRequest();
 		}else{
 			conexion = new ActiveXObject("Microsoft.XMLHTTP");
 		}

 		var url = "insertUsr.php";
 		var IdUsr = document.getElementById("txtIdUsr").value;
		var Nombre = document.getElementById("txtNombre").value;
		var ApePat = document.getElementById("txtApePat").value;
		var ApeMat = document.getElementById("txtApeMat").value;
		var Direcc = document.getElementById("txtDirecc").value;
		var NumTelCasa = document.getElementById("txtNumTelCasa").value;
		var NumTelCel = document.getElementById("txtNumTelCel").value;
		var NomUsr = document.getElementById("txtNomUsr").value;
		var PwUsr = document.getElementById("txtPwUsr").value;
		var TipUsr = document.getElementById("optTipUsr").value;
		var valores = "txtIdUsr="+IdUsr+"&txtNombre="+Nombre+"&txtApePat="+ApePat+"&txtApeMat="+ApeMat+"&txtDirecc="+Direcc+"&txtNumTelCasa="+NumTelCasa+"&txtNumTelCel="+NumTelCel+"&txtNomUsr="+NomUsr+"&txtPwUsr="+PwUsr+"&optTipUsr="+TipUsr;

		conexion.open("POST",url,true);
		conexion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 		conexion.onreadystatechange=function(){
 			if (conexion.readyState==4 && conexion.status==200) {
 				document.getElementById("midiv").innerHTML = conexion.responseText;
 			}
 		}
 		conexion.send(valores);
 		if (txtNomUsr.value   == '') { alert ('Falta Nombre de Usuario!');  
		txtNomUsr.focus(); return false; } 
		if (txtPwUsr.value   == '') { alert ('Falta Password!');  
		txtPwUsr.focus(); return false; } 
 		var Nombre = document.getElementById("txtNombre").value="";
 		var ApePat = document.getElementById("txtApePat").value="";
 		var ApeMat = document.getElementById("txtApeMat").value="";
 		var Direcc = document.getElementById("txtDirecc").value="";
 		var NumTelCasa = document.getElementById("txtNumTelCasa").value="";
 		var NumTelCel = document.getElementById("txtNumTelCel").value="";
 		var NomUsr = document.getElementById("txtNomUsr").value="";
 		var PwUsr = document.getElementById("txtPwUsr").value="";
 		var TipUsr = document.getElementById("optTipUsr").value="2";
 		alert('Datos Guardados!');
 		ajaxget();
 	}
 	</script>
 	<script type="text/javascript">

	function ajaxget(){

		var ejeAjax;
		if (window.XMLHttpRequest) {
			ejeAjax = new XMLHttpRequest();
		}else{
			ejeAjax = new ActiveXObject("Microsoft.XMLHTTP");
		}
		ejeAjax.onreadystatechange= function(){
			if (ejeAjax.readyState=4 && ejeAjax.status==200) {
				document.getElementById("refresh").innerHTML=ejeAjax.responseText;
			}
		}
		ejeAjax.open("GET","refreUsr.php", true);
		ejeAjax.send();

	}


	</script>

 	<script type="text/javascript">
 	function buscarAjax(){

 		var busAjax;
 		if (window.XMLHttpRequest) {
 			busAjax = new XMLHttpRequest();
 		}else{
 			busAjax = new ActiveXObject("Microsoft.XMLHTTP");
 		}

 		var url = "buscarUsr.php";
 		var Busc = document.getElementById("txtBusc").value;
		var valores = "txtBusc="+Busc;

		busAjax.open("POST",url,true);
		busAjax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 		busAjax.onreadystatechange=function(){
 			if (busAjax.readyState==4 && busAjax.status==200) {
 				document.getElementById("midiv2").innerHTML = busAjax.responseText;
 			}
 		}
 		busAjax.send(valores);
 		var Busc = document.getElementById("txtBusc").value="";
 	}
 	</script>

	<script type="text/javascript">
		function eliminarAjax(str){

			var eliAjax;
			if (window.XMLHttpRequest) {
				eliAjax = new XMLHttpRequest();
			}else{
				eliAjax = new ActiveXObject("Microsoft.XMLHTTP");
			}
			eliAjax.onreadystatechange=function(){
				if (eliAjax.readyState==4 && eliAjax.status==200) {
					document.getElementById("midiv").innerHTML = eliAjax.responseText;
				}
			}
			eliAjax.open("GET", "eliUsr.php?idUsr="+ str, true);
			eliAjax.send();
			alert('Usuario Eliminado!');
			ajaxget();
		}
	</script>
	<?php include("../../include/style.inc"); ?>
 	<link rel="stylesheet" href="../../css/pTicket.css">
 	<link rel="stylesheet" href="../../css/usrStyle.css">
 </head>
 <body>
 <div class="main_wrapper">
	<div class="cUno">
	<?php include("../../include/menu.inc"); ?>
	<div class="pTicket1">
	<div class="c1Centro1">
		<br>
		<div class="tituloEnt">
			<h1>Usuarios</h1>
		</div>
		<br>
		<div class="cIzqUno">
		<br>
 		<h2>Buscar Usuario:</h2>
 		<br>
 		<input type="text" class="inRegC" name="txtBusc" id="txtBusc" placeholder="Buscar id.." maxlength="5"/>
 		<br>
 		<br>
 		<button type="button" class="btnAct" id="ticket" onclick="buscarAjax()">Buscar</button>
 		<br>
 		<br>
 		</div>
 	<div class="cDerUno" id="midiv">
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
 	</div>
 	</div>
 	</div>

 	<div class="pTicket2" id="midiv2">
 		<div class="c1Centro2">
 			<div class="cIzqUno">
 				
		 		<h3>Datos Personales:</h3>
		 		<br>
		 		<div id="refresh" class="inRefresh">
		 		<input type="text" class="inRegC" name="txtIdUsr" id="txtIdUsr" placeholder="Id de Usuario.." value="<?php echo $idUsr; ?>" disabled/>
		 		</div>
		 		<input type="text" class="inRegC" name="txtNombre" id="txtNombre" placeholder="Nombre.." />
		 		<br>
		 		<input type="text" class="inRegC" name="txtApePat" id="txtApePat" placeholder="Apellido Paterno.."/>
		 		<br>
		 		<input type="text" class="inRegC" name="txtApeMat" id="txtApeMat" placeholder="Apellido Materno.."/>
		 		<br>
		 		<input type="text" class="inRegC" name="txtDirecc" id="txtDirecc" placeholder="Dirección.."/>
		 		<br>
		 		<input type="tel" class="inRegC" name="txtNumTelCasa" id="txtNumTelCasa" placeholder="Teléfono Casa.." maxlength="8"/>
		 		<br>
		 		<input type="tel" class="inRegC" name="txtNumTelCel" id="txtNumTelCel" placeholder="Teléfono Móvil.." maxlength="13"/>
		 		<br>
		 		<br>
 			</div>
 			<div class="cDerUno">
 				
 				<h3>Datos de la Cuenta:</h3>
		 		<br>
		 		<input type="text" class="inRegC" name="txtNomUsr" id="txtNomUsr" placeholder="Nombre de Usuario.." autofocus/>
		 		<br>
		 		<input type="password" class="inRegC" name="txtPwUsr" id="txtPwUsr" placeholder="Password.." min="3" />
		 		<br>
		 		<br>
		 		<h3>Permisos de:</h3>
		 		<br>
		 		<select name="optTipUsr" id="optTipUsr" class="inRegC">
		 			<option value="1">Administrador</option>
		 			<option value="2" selected>Usuario</option>
		 		</select>
		 		<br>
		 		<br>
		 		<input type="submit" class="btnAct" id="ticket" value="Guardar" onclick="insertarDatos()"/>

 			</div>
 		</div>
 	</div>


 	</div>
 	</div>
 </body>
 </html>