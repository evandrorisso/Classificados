<?php 
session_start();
global $pdo;
try {
	$pdo = new PDO("mysql:dbname=Classificados;host=localhost", "root", "");
} catch (PDOException $e) {
	echo "Falhou: ".$e->G=getMessage();
	exit;
}


 ?>