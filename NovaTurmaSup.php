<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php 
    include_once 'functions.php';

    cadastrarNovaTurma($_POST['id_professor'], $_POST['nome'], $_POST['serie'], $_POST['materia']);
?>
</html>