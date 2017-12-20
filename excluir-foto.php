<?php 
session_start();
require 'verifica-sessao.php';
require "classes/anuncios.class.php";
require "config.php";
$a = new Anuncios();
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);
	$usuario = $_SESSION['cLogin'];
	
	$id_anuncio = $a->excluirfoto($id,$usuario);
	
	if (isset($id_anuncio)) {
		header("Location: editar-anuncio.php?id=".$id_anuncio);
	} else {
		header("Location: meus-anuncios.php");
	}
	
}


 ?>