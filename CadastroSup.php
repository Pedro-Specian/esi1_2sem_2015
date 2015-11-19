<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php 
    include_once 'functions.php';

    efetuaCadastro($_POST['login'], $_POST['senha'], $_POST['usertype']);
?>
</html>