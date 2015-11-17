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
				<p class="titulo">Login</p>
				<div class="form">
					<form name="login" class="formulario" method="POST" action="login_sup.php">
						<label for="usuario">CPF/RM:</label>
						<br>
						<input type="text" name="usuario" class="campo"/>
						<br>
						<label for="senha">Senha:</label>
						<br>
						<input type="password" name="senha" class="campo"/>
						<br>
						<input type="submit" name="submit" class="submit" value="Login" />
					</form>
				</div>
				<br>
				<a href="Cadastro.php">Criar uma Conta</a>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>