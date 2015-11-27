<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php
    include_once 'functions.php';
    
    efetuaLogin($_POST['usuario'], $_POST['senha'], $_POST['submit'], 0);
?>
</html>