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
				<p class="titulo">Tópicos de Ajuda</p>
				Nessa página, você encontrará tópicos de ajuda esteja encontrando dificuldades quanto ao uso do sistema.
				<br>
				<div class="topico">
					<p class="titulo-topico">1. Como faço para criar uma conta?</p>
					<br>
					Na home, clique no link "Faça login". Na tela de login, clique em "Criar uma Conta" para criar uma conta para você. 
					</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">2. Na tela de cadastro de usuário, o que significa o campo "Tipo de Usuário"?</p>
					<br>
					O campo "Tipo de Usuário" serve para cadastrar, distintamente, responsáveis de alunos ("Responsável") e professores ("Professor").
					<br>
					Responsáveis podem ver as notas e frequencias dos seus filhos, além de poder ver os avisos enviados pelos professores. 
					<br>
					Professores podem cadastrar alunos nas turmas, bem como postar avisos sobre eles e postar notas e frequencia. 
					Escolha a opção "Professor" apenas se você for um professor registrado na escola.
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">3. Posso definir quem vai ver os avisos que eu posto?</p>
					<br>
					Sim. Na seção 'Avisos', você pode escolher se vai mandar o seu aviso para todos os usuários (tanto professores como responsáveis), 
					apenas professores ou apenas responsáveis. Ao postar um aviso sobre um determinado aluno, apenas o responsável por ele poderá visualizar
					a mensagem.
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">4. Se sou um responsável, posso enviar avisos?</p>
					<br>
					Não. Apenas professores podem postar avisos.
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">5. Quem pode visualizar as mensagens, notas e frequencias do meu filho?</p>
					<br>
					Essas informações são acessíveis somente ao responsável pelo aluno e aos professores que lecionam nas turmas em que o aluno está matriculado.
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">6. Como faço para inserir uma turma?</p>
					<br>
					Texto do tópico
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">7. Como faço para matricular um aluno em uma turma?</p>
					<br>
					Texto do tópico
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">8. Como faço para inserir presenças e faltas nos alunos?</p>
					<br>
					Texto do tópico
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">9. Como faço para cadastrar datas de provas e trabalhos?</p>
					<br>
					Texto do tópico
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">10. Como faço para cadastrar notas nas provas?</p>
					<br>
					Texto do tópico
				</div>
				<br>
				<div class="topico">
					<p class="titulo-topico">11. Como calcular a média final dos alunos?</p>
					<br>
					Texto do tópico
				</div>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>