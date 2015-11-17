<section class="cabecalho">
	<div class="container">
		<span class="titulo"><a href="index.php">NewSchool System</a></span>
		<span class="floatRight logout">
			<?php
					if(isset($_SESSION['usuario'])){
						$login_session= $_SESSION['usuario'];
					}				    
			        if(isset($login_session)){
			        	?> 
			            <?php echo $login_session ?> | <a href='logout.php'>Sair</a>
			        <?php }	?>
		</span>
	</div>
</section>