<?php 
/**
* 
*/
class Categorias
{
	
	public function getCategorias(){
		global $pdo;
		$array = array();
		$sql = $pdo->query("SELECT * FROM categorias ORDER BY nome");
		
		if ($sql->rowCount()>0) {
			$array = $sql->fetchALL();
		}
		return $array;
	}

	public function getNomeCategoria($id){
		global $pdo;
		$sql = $pdo->prepare("SELECT nome FROM categorias where id=:id");
		$sql->bindValue(":id",$id);
		$sql->execute();
		if ($sql->rowCount()>0) {
			$array = $sql->fetch();
		}
		return $array['nome'];	
	}
}


 ?>