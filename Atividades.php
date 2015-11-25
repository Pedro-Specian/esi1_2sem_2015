<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
	<head>
		<title>NewSchool System</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script language="javascript" type="text/javascript" src="assets/js/jquery.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  	<link rel="stylesheet" href="/resources/demos/style.css">
	  	<script>
		  $(function() {
		    $( ".datepicker" ).datepicker();
		  });
		</script>
	</head>
	<body>
		<?php include("header.php"); ?>
		<section class="corpo">
			<div class="container">
				<p class="titulo">Gerenciar Atividades</p>
				Nessa página você pode gerenciar as atividades das suas turmas.
				<br>
				<?php
				$connect = mysqli_connect('localhost','root','','esi1');
        		$db = mysqli_select_db($connect,'esi1');
			    $query_select = "SELECT * FROM turmas WHERE ID_Professor='".$_SESSION['id']."';";
				$select = mysqli_query($connect,$query_select);
				?>
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
						Atividades
						<br>
						<?php
						echo "<table class='tabela-notas'>";
						echo "<tr><td>Nome</td><td>Tipo</td><td>Descrição</td><td>Data</td></tr>";
						$query_select_atividades = "SELECT * FROM atividades WHERE ID_Turma=".$row[0].";";
						$select_atividades = mysqli_query($connect,$query_select_atividades);
						while ($row_atividades = mysqli_fetch_row($select_atividades)) {
								echo "<tr>";
								echo "<td>";
								echo $row_atividades[2];
								echo "</td>";
								echo "<td>";
								$query_tipoativ = "SELECT * FROM tipo_atividades WHERE ID_Tipo='".$row_atividades[5]."';";
								$select_tipoativ=mysqli_query($connect,$query_tipoativ);
								$tipo_atividade=mysqli_fetch_row($select_tipoativ)[1];
								echo $tipo_atividade;
								echo "</td>";
								echo "<td>";
								echo $row_atividades[3];
								echo "</td>";
								echo "<td>";
								echo $row_atividades[4];
								echo "</td>";
								echo "</tr>";
							}
							echo "</table>";						
						?>
						<br>
						Cadastrar Nova Atividade
						<form name="nova-atividade" action="NovaAtividadeSup.php" method="POST">
							Nome:
							<input type="text" name="nome" class="campo" value=""/>
							<br>
							Tipo:
							<select name="tipo">
								<?php
								$query_tipo = "SELECT * FROM tipo_atividades;";
								$select_tipo = mysqli_query($connect,$query_tipo);
								while($rowtipo = mysqli_fetch_row($select_tipo)){
									echo "<option value='".$rowtipo[0]."'>".$rowtipo[1]."</option>";
								}
								?>
							</select>
							<br>
							Data: 
							<input type="text" name="data" class="datepicker">
							<br>
							<textarea name="descricao" rows="5"></textarea>
							<input type="hidden" name="id_turma" value="<?php echo $row[0];?>">
							<br>
							<input type="submit" name="submit" class="submit" value="Cadastrar" />
						</form>
					</p>
					<?php
				}
				?>				
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>