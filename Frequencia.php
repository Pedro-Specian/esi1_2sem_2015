<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
	<head>
		<title>NewSchool System</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script language="javascript" type="text/javascript" src="assets/js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="assets/js/calendario.js"></script>
		<script language="javascript" type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src='assets/js/lib/jquery.min.js'></script>
		<script src='assets/js/lib/moment.min.js'></script>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  	<link rel="stylesheet" href="/resources/demos/style.css">

	  	<script language="javascript" type="text/javascript" src="assets/js/fullcalendar/fullcalendar.js"></script>
	  	<script language="javascript" type="text/javascript" src="assets/js/fullcalendar/lang-all.js"></script>
		<link rel="stylesheet" href="assets/js/fullcalendar/fullcalendar.css">
		<script language="javascript" type="text/javascript" src="assets/js/main.js"></script>
	  	<script>
		  $(function() {
		    $( ".datepicker" ).datepicker();
		    $('.calendar').fullCalendar({
        		lang: 'pt-br',
        		height: 480
    		});
		  });
		</script>
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
			            		Nessa página você pode ver e cadastrar as frequências dos alunos de cada turma em que você dá aula.
			            		<?php
			            		$connect = mysqli_connect('localhost','root','','esi1');
				        		$db = mysqli_select_db($connect,'esi1');
							    $query_select_turmas = "SELECT * FROM turmas WHERE ID_Professor=".$_SESSION['id'].";";
								$select_turmas = mysqli_query($connect,$query_select_turmas);
								$cont=0;
								while ($row_turmas = mysqli_fetch_row($select_turmas)) {
				            		?>
				            		<p class="subtitulo"><?php echo $row_turmas[4]; ?></p>
				            		<!--<div class="calendar-professor" id="<?php //echo $row_turmas[0] ?>"></div>-->
				 					<form class="formulario" action="FrequenciaSup.php" method="POST">
				 					Data:
				 					<input type="text" name="data" class="datepicker" value="<?php echo date('Y-m-d'); ?>">
				 					<br>
				 					<?php
				 					$query_select_matriculas = "SELECT * FROM matricula WHERE ID_Turma=".$row_turmas[0].";";
									$select_matriculas = mysqli_query($connect,$query_select_matriculas);
									if(mysqli_num_rows($select_matriculas) > 0){
										echo "Selecione os alunos que compareceram à aula do dia selecionado:<br>";
									}
									$numAlunos=0;
									while ($row_matriculas = mysqli_fetch_row($select_matriculas)) {
										$numAlunos++;
										$query_select_alunos = "SELECT * FROM alunos WHERE ID_Aluno=".$row_matriculas[1].";";
										$select_alunos = mysqli_query($connect,$query_select_alunos);
										while ($row_alunos = mysqli_fetch_row($select_alunos)) {
						 					echo '<input type="checkbox" name="alunos[]" value="'.$row_alunos[0].'"';
						 					$frequencia=0;
						 					$query_frequencia = "SELECT * FROM frequencia WHERE ID_Aluno=".$row_alunos[0]." AND ID_Turma=".$row_turmas[0].";";
											$select_frequencia = mysqli_query($connect,$query_frequencia);
											while($r = mysqli_fetch_row($select_frequencia)){
												if($r[3]!=0){
													$frequencia++;
												}
											}
						 					echo ">".$row_alunos[3]." ".$row_alunos[4]." (Frequência: ".$frequencia." dias, ou ".(($frequencia/200)*100)."%)</input>";
						            		echo "<br>";
						            		$cont++;
						            	}
				            		}
				            		echo '<input name="alunos[]" value="NO" checked style="display:none" type="checkbox">';
				            		if($cont>0){
				            			echo "<input type='submit' value='Confirmar Presenças' class='submit' name='confirmar-presencas'>";
				            		}
				            		echo "<input type='hidden' name='turma' value='".$row_turmas[0]."'>";
				            		echo "<input type='hidden' name='numAlunos' value='".$numAlunos."'>";
				            		$numAlunos=0;
						            echo "</form><br>";
						            $cont=0;
			            		}
			            		?>
			            	<?php }else{ ?>
			            		Nessa página você pode ver a frequência do seu filho:
			            		<br>
			            		<?php
			            		$connect = mysqli_connect('localhost','root','','esi1');
				        		$db = mysqli_select_db($connect,'esi1');
							    $query_select_filhos = "SELECT * FROM alunos WHERE ID_Pai='".$_SESSION['id']."';";
								$select_filhos = mysqli_query($connect,$query_select_filhos);
								while ($row_filhos = mysqli_fetch_row($select_filhos)) {
									echo "<p class='subtitulo'>".$row_filhos[3]." ".$row_filhos[4]."</p>";
									$query_matriculas = "SELECT * FROM matricula WHERE ID_Aluno=".$row_filhos[0].";";
									$select_matriculas = mysqli_query($connect,$query_matriculas);									
									while ($row_matr = mysqli_fetch_row($select_matriculas)) {
										$presencas;
										$query_turmas = "SELECT * FROM turmas WHERE ID_Turma='".$row_matr[0]."';";
										$select_turmas = mysqli_query($connect,$query_turmas);
										while ($row_turma = mysqli_fetch_row($select_turmas)) {
											echo "<br>";
											echo $row_turma[4];
											echo "<br>";
											$query_select_materia = "SELECT nome FROM materia WHERE ID_Materia=".$row_turma[2].";";
											$select_materia = mysqli_query($connect,$query_select_materia);
											while ($row_materia = mysqli_fetch_row($select_materia)){
												echo "Matéria: ".$row_materia[0];
											}
											echo "<br>";
											$query_select_freq = "SELECT data, presente FROM frequencia WHERE ID_Turma=".$row_turma[0]." AND ID_Aluno=".$row_filhos[0].";";
											$select_freq = mysqli_query($connect,$query_select_freq);
											while($row_freq = mysqli_fetch_row($select_freq)){
												//var_dump($row_freq);
												$presencas[$row_freq[0]]=$row_freq[1];
											}
										}
										reset($presencas);
										$somaPresencas=0;
										for($i=0;$i<count($presencas);$i++){
											$somaPresencas+=$presencas[key($presencas)];
											next($presencas);
										}
										reset($presencas);
										echo "Presenças: ".$somaPresencas." de 200 (".(($somaPresencas/200)*100)."% de presença)";
										//echo '<div class="calendar"></div>';
										
										/*for($i=0;$i<count($presencas);$i++){
											if(document.getElementByClassName('fc-day').getAttribute('data-date')==key($presencas)){
												if($presencas[key($presencas)]==0){
													echo "<script type='text/javascript'>$('td').data().addClass('presente');});</script>";
												}else{

												}
											}
											next($presencas);
										}*/
									}
								}
			            		?>
			            		
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