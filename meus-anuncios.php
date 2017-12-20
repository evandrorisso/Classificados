<?php require 'pages/header.php'; ?>
<?php require 'verifica-sessao.php'; ?>
	<div class="container">
		<h1>Meus Anúncios</h1>

		<a href="add-anuncio.php" class="btn btn-default">Cadastrar Novo Anuncios</a>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Foto</th>
					<th>Titulo</th>
					<th>Valor</th>
					<th>Ações</th>
				</tr>	
			</thead>
			<tbody>
				<?php
				foreach ($anuncios as $anuncio):
				?>
					<tr>
						<td align="center">
							<?php if (!empty($anuncio['url'])): ?>
								<img src="assets/imagens/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0" alt="">
							<?php else: ?>
								<img src="assets/imagens/default.png" height="50" border="0" alt="">
							<?php endif; ?>
						</td>
						<td><?php echo $anuncio['titulo']; ?></td>
						<td>R$ <?php $anuncio['valor'] = number_format($anuncio['valor'],2);echo  str_replace(".", ",",$anuncio['valor']); ?></td>
						<td>
							<a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-default">EDITAR</a>
							<a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-danger">EXCLUIR</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php require 'pages/footer.php'; ?>