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
									echo "<tr>";
									echo "<td>Aluno</td>";
									$query_select_tip = "SELECT * FROM tipo_atividades;";
									$select_tip = mysqli_query($connect,$query_select_tip);
									$cont=1;									
									while($r=mysqli_fetch_row($select_tip)){
										$tipo[$cont]=$r[1];
										$cont++;
									}
									$query_select_ativ = "SELECT * FROM atividades WHERE ID_Turma=".$row_turma[0]." ORDER BY ID_Atividade;";
									$select_ativ = mysqli_query($connect,$query_select_ativ);								
									while($row_ativ=mysqli_fetch_row($select_ativ)){
										$nomeTipo=$tipo[($row_ativ[5])];
										echo "<td>".$row_ativ[2]." (".$nomeTipo.")</td>";
									}
									echo "<td>Média Final</td>";
									echo "</tr>";
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
											$query_select_ativ = "SELECT * FROM atividades WHERE ID_Turma=".$row_turma[0]." ORDER BY ID_Atividade;";
											$select_ativ = mysqli_query($connect,$query_select_ativ);
											//echo mysqli_error($connect);								
											while($row_ativ=mysqli_fetch_row($select_ativ)){
												$query_nota = "SELECT Valor FROM notas WHERE ID_Atividade=".$row_ativ[1]." AND ID_Aluno=".$row_alunos[0].";";
												$select_nota = mysqli_query($connect,$query_nota);
												$nota = mysqli_fetch_array($select_nota);
												echo "<td>";
												echo "<form action='AlteraNotaSup.php' method='POST'>";
												echo "<input class='campo-nota' name='nota' type='number' min='0' max='10' value='".($nota[0]+0.0)."' step='0.1'/>";
												echo "<input type='hidden' name='id_atividade' value='".$row_ativ[1]."'>";
												echo "<input type='hidden' name='id_aluno' value='".$row_alunos[0]."'>";
												echo "<input type='submit' name='submit' class='submit' value='Mudar' />";
												echo "</form>";
												echo "</td>";
											}
											echo "<td>";
											$mediaFinal=0;
											$pesoProvas=4;
											$pesoTrabalhos=1;
											$cont_provas=0;
											$cont_trabalhos=0;
											$array_provas=array();
											$array_trabalhos=array();				
											$query_med = "SELECT * FROM notas WHERE ID_Aluno=".$row_alunos[0].";";
											$select_med = mysqli_query($connect,$query_med);										
											while($row_med=mysqli_fetch_row($select_med)){
												$query_a = "SELECT * FROM atividades WHERE ID_Atividade=".$row_med[2].";";
												$select_a = mysqli_query($connect,$query_a);
												$n = mysqli_fetch_array($select_a);
												//var_dump($n);
												if($n[5]==1){
													$array_provas[$cont_provas]=$row_med[3];
													$cont_provas++;
												}else{
													$array_trabalhos[$cont_trabalhos]=$row_med[3];
													$cont_trabalhos++;
												}
											}
											$valorProvas=0;
											for($i=0;$i<$cont_provas;$i++){
												$valorProvas+=$array_provas[$i];
											}
											$valorTrabalhos=0;
											for($i=0;$i<$cont_trabalhos;$i++){
												$valorTrabalhos+=$array_trabalhos[$i];
											}
											$mediaProvas=$valorProvas/10;
											$mediaTrabalhos=$valorTrabalhos/10;
											$mediaFinal=($pesoProvas*$mediaProvas)+($pesoTrabalhos*$mediaTrabalhos);
											//$mediaFinal=$valorProvas+$valorTrabalhos;
											echo $mediaFinal;
											echo "</td>";
											echo "</tr>";
										}
									}
									echo "</table>";
								}
			            	}else{
			            		echo "Nessa página você poderá ver as notas do seu filho";
			            		$connect = mysqli_connect('localhost','root','','esi1');
				        		$db = mysqli_select_db($connect,'esi1');
							    $query_select_filhos = "SELECT * FROM alunos WHERE ID_Pai='".$_SESSION['id']."';";
								$select_filhos = mysqli_query($connect,$query_select_filhos);
								while ($row_filhos = mysqli_fetch_row($select_filhos)) {
									echo "<p class='subtitulo'>".$row_filhos[3]." ".$row_filhos[4]."</p>";
									$query_matriculas = "SELECT * FROM matricula WHERE ID_Aluno=".$row_filhos[0].";";
									$select_matriculas = mysqli_query($connect,$query_matriculas);
									while ($row_matr = mysqli_fetch_row($select_matriculas)) {
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
											echo "<table class='tabela-notas'>";
											echo "<tr>";
											$query_select_tip = "SELECT * FROM tipo_atividades;";
											$select_tip = mysqli_query($connect,$query_select_tip);
											$cont=1;									
											while($r=mysqli_fetch_row($select_tip)){
												$tipo[$cont]=$r[1];
												$cont++;
											}
											$query_select_ativ = "SELECT * FROM atividades WHERE ID_Turma=".$row_turma[0]." ORDER BY ID_Atividade;";
											$select_ativ = mysqli_query($connect,$query_select_ativ);								
											while($row_ativ=mysqli_fetch_row($select_ativ)){
												$nomeTipo=$tipo[($row_ativ[5])];
												echo "<td>".$row_ativ[2]." (".$nomeTipo.")</td>";
											}
											echo "<td>Média Final</td>";
											echo "</tr>";
											echo "<tr>";
											$query_select_ativ = "SELECT * FROM atividades WHERE ID_Turma=".$row_turma[0]." ORDER BY ID_Atividade;";
											$select_ativ = mysqli_query($connect,$query_select_ativ);
											//echo mysqli_error($connect);								
											while($row_ativ=mysqli_fetch_row($select_ativ)){
												$query_nota = "SELECT Valor FROM notas WHERE ID_Atividade=".$row_ativ[1]." AND ID_Aluno=".$row_filhos[0].";";
												$select_nota = mysqli_query($connect,$query_nota);
												$nota = mysqli_fetch_array($select_nota);
												echo "<td>";
												echo ($nota[0]+0.0);
												echo "</td>";
											}
											echo "<td>";
											$mediaFinal=0;
											$pesoProvas=4;
											$pesoTrabalhos=1;
											$cont_provas=0;
											$cont_trabalhos=0;
											$array_provas=array();
											$array_trabalhos=array();				
											$query_med = "SELECT * FROM notas WHERE ID_Aluno=".$row_filhos[0].";";
											$select_med = mysqli_query($connect,$query_med);										
											while($row_med=mysqli_fetch_row($select_med)){
												$query_a = "SELECT * FROM atividades WHERE ID_Atividade=".$row_med[2].";";
												$select_a = mysqli_query($connect,$query_a);
												$n = mysqli_fetch_array($select_a);
												//var_dump($n);
												if($n[5]==1){
													$array_provas[$cont_provas]=$row_med[3];
													$cont_provas++;
												}else{
													$array_trabalhos[$cont_trabalhos]=$row_med[3];
													$cont_trabalhos++;
												}
											}
											$valorProvas=0;
											for($i=0;$i<$cont_provas;$i++){
												$valorProvas+=$array_provas[$i];
											}
											$valorTrabalhos=0;
											for($i=0;$i<$cont_trabalhos;$i++){
												$valorTrabalhos+=$array_trabalhos[$i];
											}
											$mediaProvas=$valorProvas/10;
											$mediaTrabalhos=$valorTrabalhos/10;
											$mediaFinal=($pesoProvas*$mediaProvas)+($pesoTrabalhos*$mediaTrabalhos);
											//$mediaFinal=$valorProvas+$valorTrabalhos;
											echo $mediaFinal;
											echo "</td>";
											echo "</tr>";
											echo "</table>";
										}
									}
								}
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