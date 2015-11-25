<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php 
    include_once 'functions.php';

    alterarNota($_POST['id_atividade'], $_POST['id_aluno'], $_POST['nota']);
?>
</html>