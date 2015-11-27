<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php 
    include_once 'functions.php';
    cadastrarFrequencia($_POST['alunos'], $_POST['turma'], $_POST['data'], $_POST['numAlunos']);
?>
</html>