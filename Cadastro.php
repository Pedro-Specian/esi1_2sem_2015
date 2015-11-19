<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
	<head>
		<title>NewSchool System</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script language="javascript" type="text/javascript" src="assets/js/jquery.js"></script>
	</head>
	<body>
		<?php include("header.php"); ?>
		<section class="corpo">
			<div class="container">
				<p class="titulo">Cadastro</p>
				<div class="form">
					<form method="POST" action="CadastroSup.php" class="formulario">
						<label>Login</label>
						<br>
						<input type="text" name="login" id="login">
						<br>
						<label>Tipo de Usuário</label>
						<br>
						<input type="radio" name="usertype" value="responsavel">Responsável
						<br>
						<input type="radio" name="usertype" value="professor">Professor
						<br>
						<label>Senha</label>
						<br>
						<input type="password" name="senha" id="senha">
						<br>
						<input type="submit" value="Cadastrar" id="cadastrar" class="submit" name="cadastrar">
					</form>
				</div>
				<br>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>