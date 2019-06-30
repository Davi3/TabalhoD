<?php
$servidor = "localhost";
$user = "root";
$pass = "";
$nomeDoBanco = "loja";
try {
	$conexao = new PDO("mysql:dbname=$nomeDoBanco; host=$servidor", $user, $pass);
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao -> exec("SET CHARACTER SET utf8");
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>	
