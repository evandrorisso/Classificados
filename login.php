<?php require 'pages/header.php'; ?>
<div class="container">
	<h1>Cadastre-se</h1>
	<?php 
		require 'classes/usuarios.class.php';
		$u = new Usuarios();
		if (isset($_POST['email']) && !empty($_POST['email'])){
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);
			if (!empty($email) && !empty($senha)){
				if ($u->login($email,$senha)){
						?>
							<script type="text/javascript">window.location.href="./";</script>
						<?php
					} else {
						?>
						<div class="alert alert-danger">
							E-mail ou Senha estão errados! <a href="login.php" class="alert-link" >Faça o login agora</a>
						</div>
						<?php
					}
				
			} else{
				?>
				<div class="alert alert-warning">
					Preencha todos os campos!
				</div>
				<?php 
			}

		}

	 ?>
	<form method="POST">
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control">
		</div>
		<input type="submit" value="Efetuar Login" class="btn btn-default">
	</form>
</div>
<?php require 'pages/footer.php'; ?>