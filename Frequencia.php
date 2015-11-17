<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
	<head>
		<title>NewSchool System</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script language="javascript" type="text/javascript" src="assets/js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="assets/js/calendario.js"></script>
		<script language="javascript" type="text/javascript" src="assets/js/main.js"></script>
		<script language="javascript" type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel='stylesheet' href='assets/js/fullcalendar/fullcalendar.css' />
		<script src='assets/js/lib/jquery.min.js'></script>
		<script src='assets/js/lib/moment.min.js'></script>
		<script src='assets/js/fullcalendar/fullcalendar.js'></script>
		<script src='assets/js/fullcalendar/lang-all.js'></script>
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
			            <p class="titulo">Frequencia</p>
			            <br>
			            <?php 
			            	if($_SESSION['tipo']==1){ ?>
			            		Nessa página você pode ver e cadastrar as frequências de cada aluno
			            		<div class="calendar-professor"></div>
			            		Selecione os alunos que compareceram à aula do dia selecionado:
			 					<br>
			            		<form class="formulario">
			            			<input type="checkbox" name="aluno" value="aluno-1">Aluno 1
			            			<br>
			            			<input type="checkbox" name="aluno" value="aluno-1">Aluno 2
			            			<br>
			            			<input type="checkbox" name="aluno" value="aluno-1">Aluno 3
			            			<br>
			            			<input type="checkbox" name="aluno" value="aluno-1">Aluno 4
			            			<br>
			            			<input type="checkbox" name="aluno" value="aluno-1">Aluno 5
			            			<br>
			            			<input type="checkbox" name="aluno" value="aluno-1">Aluno 6
			            			<br>
			            			<input type="checkbox" name="aluno" value="aluno-1">Aluno 7
			            			<br>
			            			<input type="submit" value="Confirmar Presenças" id="cadastrar" class="submit" name="confirmar-presencas">
			            		</form>
			            	<?php }else{ ?>
			            		Nessa página você pode ver a frequência do seu filho:
			            		<br>
		            			<div class="calendar-responsavel"></div>
			            			<!--<div>
			            				<script type="text/javascript">
			            					//document.write(gerarCalendario(2011));
										</script>
			            			</div>-->
			            	<?php
			          	}			        
			        }else{
			        	include ('logout.php');
			    	} ?>
				<br>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>