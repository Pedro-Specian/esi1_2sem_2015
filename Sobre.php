<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
	<head>
		<title>NewSchool System - Sobre</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script language="javascript" type="text/javascript" src="assets/js/jquery.js"></script>
	</head>
	<body>
		<?php include("header.php"); ?>
		<section class="corpo">
			<div class="container">
				<p class="titulo">Sobre a NewSchool System</p>
				O NewSchool System é um projeto da disciplina ACH 2006 - Engenharia de Sistema I, lecionada pelo professor Marcos Lordello Chaim.
				<br>
				Os integrantes do grupo responsável pelo desenvolvimento do sistema são:
				<ul>
					<li>Thiago de Aguiar Gomes - 5715160</li>
					<li>Pedro Toupitzen - 8082640</li>
					<li>Rodrigo De P. Gomes - 6431197</li>
				</ul>
				<br>
				Essa versão mais atual do sistema. O que já foi feito:
				<ul>
					<li>Criamos um banco de dados para o sistema;</li>
					<li>Começamos a montar a interface gráfica do sistema;</li>
					<li>Criamos um sistema de login, cujo conteúdo difere entre usuários que são pais de alunos (responsáveis) e professores;</li>
					<li>Criamos os sistemas de avisos e notas</li>
					<li>Tornamos o sistema responsivo;</li>
					<li>Entre outras coisas citadas na apresentação do dia 15/10/2015</li>
				</ul>
				<br>
				O que falta fazer:
				<ul>
					<li>Não conseguimos conectar o sistema com o banco de dados citado na lista acima. Em função disso, estamos usando um banco local.</li>
				</ul>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>