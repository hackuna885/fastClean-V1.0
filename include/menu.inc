<?php 

if ($_SESSION['permisos'] == 1) {
	$perUsrActive = '
					<a href="caja.php">Caja</a>
					<a href="entrega.php">Entrega</a>
					<a href="lavado.php">Lavado</a>
					<a href="planchado.php">Planchado</a>
					<a href="catalogos.php">Catálogos</a>
					<a href="reportes.php">Reportes</a>
					<a href="cancelar.php">Cancelar</a>
					<a href="usuarios.php">Usuarios</a>
					<a href="destruir.php">Cerrar</a>
	';
}else{
	$perUsrActive = '
					<a href="caja.php">Caja</a>
					<a href="entrega.php">Entrega</a>
					<a href="lavado.php">Lavado</a>
					<a href="planchado.php">Planchado</a>
					<a href="#">Catálogos</a>
					<a href="#">Reportes</a>
					<a href="#">Cancelar</a>
					<a href="#">Usuarios</a>
					<a href="destruir.php">Cerrar</a>
	';
}

 ?>


<div class="cHeader">
		<header>
			<div class="cLogo">
				<img class="imglogo" src="../../img/logo.png" alt="">
			</div>
			<div class="cMenu">
			<hgroup>
				<nav>
					<?php echo $perUsrActive; ?>
				</nav>
			</hgroup>
			</div>
		</header>
</div>