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
				<p class="titulo">Gerenciar Turmas</p>
				Nessa página você pode gerenciar suas turmas e os alunos delas.
				<br>
				<?php
				$connect = mysqli_connect('localhost','root','','esi1');
        		$db = mysqli_select_db($connect,'esi1');
			    $query_select = "SELECT * FROM turmas WHERE ID_Professor='".$_SESSION['id']."';";
				$select = mysqli_query($connect,$query_select);
				?>
				<p class="subtitulo">Minhas Turmas</p>
				Aqui você pode ver as turmas em que você dá aula, assim como adicionar novas turmas.
				<br>
				<?php
				while ($row = mysqli_fetch_row($select)) {
					$query_materia = "SELECT * FROM materia WHERE ID_Materia='".$row[2]."';";
					$select_materia=mysqli_query($connect,$query_materia);
					$nome_materia=mysqli_fetch_row($select_materia)[1];
					$query_serie = "SELECT * FROM serie WHERE ID_Serie='".$row[3]."';";
					$select_serie=mysqli_query($connect,$query_serie);
					$nome_serie=mysqli_fetch_row($select_serie)[1];
					?>
					<p class="subtitulo"><?php echo $row[4]; ?></p>
					<p class="corpo-do-aviso">
						<?php echo "Série: ".$nome_serie."<br>Matéria: ".$nome_materia; ?>
						<br>
						<br>
						Alunos:
						<br>
						<?php 
						$query_matriculas_turma = "SELECT * FROM matricula WHERE ID_Turma=".$row[0].";";
						$select_matriculas_turma = mysqli_query($connect,$query_matriculas_turma);
						while($rows = mysqli_fetch_row($select_matriculas_turma)){
							$query_alunos_turma = "SELECT * FROM alunos WHERE ID_Aluno=".$rows[1].";";
							$select_alunos_turma = mysqli_query($connect,$query_alunos_turma);
							while ($rowAlunosPorTurma = mysqli_fetch_row($select_alunos_turma)) {
								echo $rowAlunosPorTurma[3]." ".$rowAlunosPorTurma[4]."<br>";
							}
						}
						
						?>
					</p>
					<?php
				}
				?>
				<p class="subtitulo">Cadastrar Nova Turma</p>
				<form name="nova-turma" action="NovaTurmaSup.php" method="POST">
					Nome:
					<input type="text" name="nome" class="campo" value="Nova Turma"/>
					<br>
					Série:
					<select name="serie">
						<?php
						$query_series_nova = "SELECT * FROM serie;";
						$select_series_nova = mysqli_query($connect,$query_series_nova);
						while($rowSerieNova = mysqli_fetch_row($select_series_nova)){
							echo "<option value='".$rowSerieNova[0]."'>".$rowSerieNova[1]."</option>";
						}
						?>
					</select>
					<br>
					Matéria:
					<select name="materia">
						<?php
						$query_materias = "SELECT * FROM materia;";
						$select_materias = mysqli_query($connect,$query_materias);
						while($rowMaterias = mysqli_fetch_row($select_materias)){
							echo "<option value='".$rowMaterias[0]."'>".$rowMaterias[1]."</option>";
						}
						?>
					</select>
					<br>
					<input type="hidden" name="id_professor" value="<?php echo $_SESSION['id'];?>">
					<input type="submit" name="submit" class="submit" value="Cadastrar" />
				</form>
				<p class="subtitulo">Gerenciar Séries</p>
				Aqui você pode adicionar alunos em suas respectivas séries.
				<br>
				<p class="subtitulo">Alunos não matriculados em nenhuma série</p>
				<?php 
				$query_todos_alunos = "SELECT * FROM alunos WHERE ID_Serie=0;";
				$select_todos_alunos = mysqli_query($connect,$query_todos_alunos);
				while ($row = mysqli_fetch_row($select_todos_alunos)) {
					?>
					<p class="subtitulo"><?php echo $row[3]." ".$row[4]; ?></p>
					<p class="corpo-do-aviso">
						<?php
						$query_responsavel_alunos = "SELECT nome FROM usuarios WHERE ID=".$row[1].";";
						$select_responsavel_alunos = mysqli_query($connect,$query_responsavel_alunos);
						?>
						Responsável:<?php echo mysqli_fetch_row($select_responsavel_alunos)[0]; ?>
						<br>
						Data de nascimento:<?php echo $row[5]; ?>
						<br>
						<form class="form-cadastrar-aluno" action="TurmaAlunoSup.php" method="POST">
							Cadastrar em:
							<select name="serie">
							<?php
							$query_todas_series = "SELECT * FROM serie;";
							$select_todas_series = mysqli_query($connect,$query_todas_series);
							while ($rowTurma = mysqli_fetch_row($select_todas_series)) {							
							  echo "<option value='".$rowTurma[0]."'>".$rowTurma[1]."</option>";
							}
							echo "<input type='hidden' name='id_aluno' value='".$row[0]."'>";
							?>
							</select>
							<input type="submit" name="submit" class="submit" value="Cadastrar <?php echo $row[3].' '.$row[4]; ?>" />
						</form>
					</p>
					<?php
				}
				$query_todas_series = "SELECT * FROM serie;";
				$select_todas_series = mysqli_query($connect,$query_todas_series);
				while($row=mysqli_fetch_row($select_todas_series)){
					echo "<p class='subtitulo'>Alunos matriculados na ".$row[1]."</p>";
					$query_alunos_serie = "SELECT * FROM alunos WHERE ID_Serie=".$row[0].";";
					$select_alunos_serie = mysqli_query($connect,$query_alunos_serie);
					while ($rowAluno = mysqli_fetch_row($select_alunos_serie)) {
						?>
						<p class="subtitulo"><?php echo $rowAluno[3]." ".$rowAluno[4]; ?></p>
						<p class="corpo-do-aviso">
							<?php
							$query_responsavel_alunos = "SELECT nome FROM usuarios WHERE ID=".$rowAluno[1].";";
							$select_responsavel_alunos = mysqli_query($connect,$query_responsavel_alunos);
							?>
							Responsável:<?php echo mysqli_fetch_row($select_responsavel_alunos)[0]; ?>
							<br>
							Data de nascimento:<?php echo $rowAluno[5]; ?>
							<br>
							<form class="form-cadastrar-aluno" action="TurmaAlunoSup.php" method="POST">
								Série:
								<select name="serie">
								<?php
								$query_series = "SELECT * FROM serie;";
								$select_series = mysqli_query($connect,$query_series);
								while ($rowSerie = mysqli_fetch_row($select_series)) {
									if($rowSerie[0]==$row[0]){
										echo "<option value='".$rowSerie[0]."' selected='selected'>".$rowSerie[1]."</option>";
									}else{
										echo "<option value='".$rowSerie[0]."'>".$rowSerie[1]."</option>";
									}								  
								}
								echo "<input type='hidden' name='id_aluno' value='".$rowAluno[0]."'>";
								?>
								</select>
								<input type="submit" name="submit" class="submit" value="Alterar série de <?php echo $rowAluno[3].' '.$rowAluno[4]; ?>" />
							</form>
							<form class="form-alterar-turma" action="TurmaCadastrarAlunoEmTurmaSup.php" method="POST">
								Cadastrar Turma:
								<select name="turma">
									<?php
									$query_turmas_por_serie2 = "SELECT * FROM turmas WHERE ID_Serie=".$rowAluno[6]." AND ID_Professor=".$_SESSION['id'].";";
									$select_turmas_por_serie2 = mysqli_query($connect,$query_turmas_por_serie2);
									echo mysqli_error($connect);   
									while ($rowTurmaAluno = mysqli_fetch_row($select_turmas_por_serie2)) {
										echo "<option value='".$rowTurmaAluno[0]."'>".$rowTurmaAluno[4]."</option>";
									}
									echo "<input type='hidden' name='id_aluno' value='".$rowAluno[0]."'>";
									?>
								</select>
								<input type="submit" name="submit" class="submit" value="Alterar turma de <?php echo $rowAluno[3].' '.$rowAluno[4]; ?>" />
							</form>
						</p>
						<?php
					}
				}
				?>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>