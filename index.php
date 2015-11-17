<?php session_start(); ?>
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
				<?php
					if(isset($_SESSION['usuario'])){
						$login_session= $_SESSION['usuario'];
					}
			        if(isset($login_session)){ ?> 
			            <p class="titulo">Home</p>
			            <br>
			            Clique em um dos botões abaixo para executar uma ação:
			            <br>
			            <div class="textAlignCenter">
				            <div class="botao"><a href="Aviso.php">Avisos</a></div>
				            <div class="botao"><a href="Notas.php">Notas</a></div>
				            <div class="botao"><a href="Frequencia.php">Frequencia</a></div>
			            </div>		            
			        <?php
			        }else{ ?>
			        	<p class="titulo">Bem-Vindo</p> 
			            Bem-Vindo ao Newschool System. 
			            <br>
			            <a href='Login.php'>Faça login</a> para ter acesso ao sistema
			        <?php } ?>
				<br>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>