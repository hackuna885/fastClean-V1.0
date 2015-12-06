<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$var1 = $_GET['variable'];
$var2 = substr($var1, 5);
$var3 = substr($var1, 0, 5);

$con = new SQLite3("../data/tienda.db") or die("problemas para conectar");
$cs = $con -> query("UPDATE prendasTMP SET observa = '$var2' WHERE id = '$var3'");
$con -> close();
 

 ?>