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
			            <p class="titulo">Notas</p>
			            <br>   
			            <?php 
			            	if($_SESSION['tipo']==1){
			            		echo "Nessa página você poderá cadastrar as notas dos alunos";
			            		$connect = mysqli_connect('localhost','root','','esi1');
				        		$db = mysqli_select_db($connect,'esi1');
							    $query_select_turmas = "SELECT * FROM turmas WHERE ID_Professor='".$_SESSION['id']."';";
								$select_turmas = mysqli_query($connect,$query_select_turmas);
								while ($row_turma = mysqli_fetch_row($select_turmas)) {
									echo "<p class='subtitulo'>".$row_turma[4]."</p>";
									$query_select_serie = "SELECT nome FROM serie WHERE ID_Serie=".$row_turma[3].";";
									$select_serie = mysqli_query($connect,$query_select_serie);
									while ($row_serie = mysqli_fetch_row($select_serie)){
										echo "Série: ".$row_serie[0];
									}
									echo "<br>";
									$query_select_materia = "SELECT nome FROM materia WHERE ID_Materia=".$row_turma[2].";";
									$select_materia = mysqli_query($connect,$query_select_materia);
									while ($row_materia = mysqli_fetch_row($select_materia)){
										echo "Matéria: ".$row_materia[0];
									}
									echo "<br>";
									echo "<table class='tabela-notas'>";
									$query_select_matriculas = "SELECT * FROM matricula WHERE ID_Turma=".$row_turma[0].";";
									$select_matriculas = mysqli_query($connect,$query_select_matriculas);
									while ($row_matriculas = mysqli_fetch_row($select_matriculas)) {
										$query_select_alunos = "SELECT * FROM alunos WHERE ID_Aluno=".$row_matriculas[1].";";
										$select_alunos = mysqli_query($connect,$query_select_alunos);
										while ($row_alunos = mysqli_fetch_row($select_alunos)) {
											echo "<tr>";
											echo "<td>";
											echo $row_alunos[3]." ".$row_alunos[4];
											echo "</td>";
											echo "</tr>";
										}
									}
									echo "</table>";
								}
			            	}else{
			            		echo "Nessa página você poderá ver as notas do seu filho";
			            	}
			            ?>         
			        <?php
			        }else{
			        	include ('logout.php');
			    	} ?>
				<br>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>