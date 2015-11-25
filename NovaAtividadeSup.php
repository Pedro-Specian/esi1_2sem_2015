<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php 
    include_once 'functions.php';
    cadastrarNovaAtividade($_POST['nome'], $_POST['tipo'], $_POST['descricao'], $_POST['data'], $_POST['id_turma']);
?>
</html>