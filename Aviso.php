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
			            <p class="titulo">Avisos</p>
			            <br>
			            <?php
			            	$tipodeusuario="pais";
			            	if($_SESSION['tipo']==1){
			            		$tipodeusuario="professores";
			            	}
			            	$connect = mysqli_connect('localhost','root','','esi1');
        					$db = mysqli_select_db($connect,'esi1');
			            	$query_select = "SELECT * FROM avisos WHERE escopo='".$tipodeusuario."' OR escopo='todos';";
					        $select = mysqli_query($connect,$query_select);
					        while ($row = mysqli_fetch_row($select)) {
			            ?>
		            		<div class="aviso">
		            			<?php
		            				$query_nome_remetente = "SELECT nome FROM usuarios WHERE ID=".$row[1].";";
					        		$select_remetente = mysqli_query($connect,$query_nome_remetente);
					        		if (!$select_remetente) {
		    							printf("Error: %s\n", mysqli_error($connect));
		    							exit();
									}
					        		$fetch_array = mysqli_fetch_array($select_remetente);
        							$remetente = $fetch_array['nome'];
		            			?>
		            			<p class="subtitulo">Remetente: <?php echo $remetente;?></p>
		            			<p>Data: <?php echo $row[3];?></p>
		            			<p class="corpo-do-aviso">
		            				<?php echo $row[4];?>
		            			</p>
		            		</div>
	            		<?php 
	            			}
			            if($_SESSION['tipo']==1){ ?>
			            	<p class="titulo">Enviar um aviso</p>
			            	<form class="form-aviso" action="AvisoSup.php" method="POST">
			            		<label for="destinatario">Enviar para</label>
			            		<br>
			            		<input type="radio" name="destinatario" value="todos">Todos
								<input type="radio" name="destinatario" value="pais">Somente aos pais
								<input type="radio" name="destinatario" value="professores">Somente aos professores
								<br>
								<label for="titulo">Título</label>
								<br>
								<input type="text" name="titulo" class="campo"/>
								<br>
								<label for="mensagem">Corpo da Mensagem</label>
								<br>
								<textarea name="mensagem" rows="5"></textarea>
								<br>
								<input type="hidden" name="id_professor" value="<?php echo $_SESSION['id'];?>">
								<input type="submit" name="submit" class="submit" value="Enviar" />
			            	</form>
			            <?php }
			        }else{
			        	include ('logout.php');
			    	} ?>
				<br>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>