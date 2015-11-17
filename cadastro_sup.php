<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php 
    $login = $_POST['login'];
    $senha = MD5($_POST['senha']);
    $tipo = 0;
    if(isset($_POST['usertype'])){
        if($_POST['usertype']=='professor'){
            $tipo = 1;
        }
    }
    $connect = mysqli_connect('localhost','root','','usuarios');
    $db = mysqli_select_db($connect,'nome_do_banco_de_dados');
    $query_select = "SELECT login FROM usuarios WHERE login = '$login'";
    $select = mysqli_query($connect,$query_select);
    $array = mysqli_fetch_array($select);
    $logarray = $array['login'];
 
    if($login == "" || $login == null || $_POST['senha']==""|| $_POST['senha']== null){
        echo"<script language='javascript' type='text/javascript'>alert('Os campos devem ser preenchidos');window.location.href='Cadastro.php';</script>";
        }else{
            if($logarray == $login){ 
                echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='Cadastro.php';</script>";
                die(); 
            }else{
                $query = "INSERT INTO usuarios (login,senha,professor) VALUES ('$login','$senha','$tipo')";
                $insert = mysqli_query($connect,$query);                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='Login.php'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='Cadastro.php'</script>";
                }
            }
        }
?>
</html>