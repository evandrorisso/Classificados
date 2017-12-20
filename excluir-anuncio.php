<?php 
session_start();
require 'verifica-sessao.php';
require "classes/anuncios.class.php";
require "config.php";
$a = new Anuncios();
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);
	$usuario = $_SESSION['cLogin'];
	$a->excluirAnuncio($id,$usuario);
	header("Location: meus-anuncios.php");
}


 ?>