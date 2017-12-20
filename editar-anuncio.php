<?php require 'pages/header.php'; ?>
<?php require 'verifica-sessao.php'; ?>
<?php 
	require 'classes/anuncios.class.php';
	$a = new Anuncios();
	
	if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
		$titulo = addslashes($_POST['titulo']);
		$descricao = addslashes($_POST['descricao']);
		$categoria1 = addslashes($_POST['categoria']);
		$valor = addslashes($_POST['valor']);
		$estado = addslashes($_POST['estado']);
		$usuario = $_SESSION['cLogin'];
		$id=addslashes($_GET['id']);
		if (isset($_FILES['fotos'])) {
			$fotos= $_FILES['fotos'];
		}else{
			$fotos = array();
		};
		
		$a->editarAnuncio($usuario,$titulo,$descricao,$categoria1,$valor,$estado,$fotos,$id);

		?>
		<div class="alert alert-success">
			Produto Editado com Sucesso!
		</div>
		<?php
	}
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$usuario = $_SESSION['cLogin'];
		$id=addslashes($_GET['id']);
		$dados = $a->getAnuncio($id,$usuario);
	} else{
		?>
			<script type="text/javascript" >window.location.href="meus-anuncios.php";</script>
		<?php 
	}
	

?>
	<div class="container">
		<h1>Meus Anuncios - Editar Anuncio</h1>
	
	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="categoria">Categoria</label>
			<select name="categoria" id="categoria" class="form-control">
				<option>Escolha A Categoria</option>
				<?php 
					require 'classes/categoria.class.php';
					$c= new Categorias();
					$categorias = $c->getCategorias();
					foreach ($categorias as $categoria):
				?>
					<option value="<?php echo $categoria['id'] ?>" <?php echo($dados['id_categoria']==$categoria['id'])?'selected="selected"':'';?>><?php echo $categoria['nome'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="Titulo">Titulo</label>
			<input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $dados['titulo']; ?>">
		</div>
		<div class="form-group">
			<label for="valor">Valor</label>
			<input type="text" class="form-control" name="valor" id="valor" value="<?php echo str_replace(".", ",",$dados['valor']); ?>">
		</div>
		<div class="form-group">
			<label for="descricao">Descrição</label>
			<textarea name="descricao" id="descricao" class="form-control" cols="30" rows="10"><?php echo $dados['descricao'];?></textarea>
		</div>
		<div class="form-group">
			<label for="estado">Estado de Conservação:</label>
			<select name="estado" id="estado" class="form-control">
				<option>Informe o Estado do Produto</option>
				<option value="0" <?php echo($dados['estado']=='0')?'selected="selected"':'';?>>RUIM</option>
				<option value="1" <?php echo($dados['estado']=='1')?'selected="selected"':'';?>>BOM</option>
				<option value="2" <?php echo($dados['estado']=='2')?'selected="selected"':'';?>>OTIMO</option>
			</select>
		</div>
		<div class="form-group">
			<label for="foto">Fotos do Anúncio:</label>
			<input type="file" name="fotos[]" multiple>
			</br></br>
			<div class="panel panel-default">
				<div class="panel-heading">Fotos do Anúncio</div>
				<div class="panel-body">
					<?php foreach ($dados['fotos'] as $foto): ?>
						<div class="foto_item">
							<img src="assets/imagens/anuncios/<?php echo $foto['url'] ?>" alt="" border="0" class="img-thumbnail">
							<a href="excluir-foto.php?id=<?php echo $foto['id'] ?>" class="btn btn-default">Excluir Imagem</a>
						</div>
					<?php endforeach; ?>	
				</div>
			</div>
		</div>

		<input type="submit" class="btn btn-default" value="Salvar">
	</form>

	</div>
<?php require 'pages/footer.php'; ?>