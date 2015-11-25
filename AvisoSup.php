<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php 
    include_once 'functions.php';

    enviaMensagem($_POST['destinatario'], $_POST['titulo'], $_POST['mensagem'], $_POST['id_professor']);
?>
</html>