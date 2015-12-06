<?php 

session_start();

if (isset($_SESSION['username'])) {

}else{
	echo "<script> alert('No puedes ver esta pagina! =/'); </script>";
	echo "<script> window.location='../../index.php'; </script>";
}


 ?>