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
			            <div class="aviso">
	            			<p class="subtitulo">Remetente: Fulano da Silva</p>
	            			<p class="corpo-do-aviso">
	            				Texto sobre o aviso
	            			</p>
	            		</div>
	            		<div class="aviso">
	            			<p class="subtitulo">Remetente: Fulano da Silva</p>
	            			<p class="corpo-do-aviso">
	            				Texto sobre o aviso
	            			</p>
	            		</div>
	            		<div class="aviso">
	            			<p class="subtitulo">Remetente: Fulano da Silva</p>
	            			<p class="corpo-do-aviso">
	            				Texto sobre o aviso
	            			</p>
	            		</div>
	            		<div class="aviso">
	            			<p class="subtitulo">Remetente: Fulano da Silva</p>
	            			<p class="corpo-do-aviso">
	            				Texto sobre o aviso
	            			</p>
	            		</div>
	            		<div class="aviso">
	            			<p class="subtitulo">Remetente: Fulano da Silva</p>
	            			<p class="corpo-do-aviso">
	            				Texto sobre o aviso
	            			</p>
	            		</div>
			            <?php //if($_SESSION['tipo']==1){ ?>
			     				
			            <?php //}else{ ?>
			            		
			            <?php //} ?>            
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