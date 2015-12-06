 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript">
		function eliAjax(str){

			var eliAjaxUsr;
			if (window.XMLHttpRequest) {
				eliAjaxUsr = new XMLHttpRequest();
			}else{
				eliAjaxUsr = new ActiveXObject("Microsoft.XMLHTTP");
			}
			eliAjaxUsr.onreadystatechange=function(){
				if (eliAjaxUsr.readyState==4 && eliAjaxUsr.status==200) {
					document.getElementById("midiv").innerHTML = eliAjaxUsr.responseText;
				}
			}
			eliAjaxUsr.open("GET", "eliUsr.php?txtEliUsr="+ str, true);
			eliAjaxUsr.send();
		}
	</script>


</head>
<body>
		<?php 

			$con = new SQLite3("../data/tienda.db") or die("Problemas para conectar");
			$cs = $con -> query("SELECT * FROM catUsuarios");
			while ($res = $cs -> fetchArray()) {
				$resId = $res['catUsrIDUsr'];
				$resUsr = $res['catUsrNomUsr'];
				$resPer = $res['catUsrPerUsr'];

				if ($resPer == 1) {
					$resPer = "Administrador";
				}else{
					$resPer = "Usuario";
				}

				echo '
			<tr>
			<td>'.$resId.'</td>
			<td>'.$resUsr.'</td>
			<td>'.$resPer.'</td>
			<td><button type="button" id="txtEliUsr" onclick="eliAjax('.'hackuna'.')">Eliminar</button></td>
			</tr>
				';

			}
			$con -> close();

		 ?>
	<div id="midiv"></div>
</body>
</html>