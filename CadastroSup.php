<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="utf-8" /> 
<?php 
    function efetuaCadastro($par_login,$par_senha,$par_tipo){
        $login = $par_login;
        $senha = MD5($par_senha);
        $tipo = 0;
        if(isset($par_tipo) && $par_tipo=='professor'){
                $tipo = 1;
        }
        $connect = mysqli_connect('newschool.cxfs3swb2lnk.us-west-2.rds.amazonaws.com:1433','EngSoft','Soft1234','newschool');
        $db = mysqli_select_db($connect,'nome_do_banco_de_dados');
        $query_select = "SELECT login FROM usuarios WHERE login = '$login'";
        $select = mysqli_query($connect,$query_select);
        $array = mysqli_fetch_array($select);
        $logarray = $array['login'];
     
        if($login == "" || $login == null || $par_senha==""|| $par_senha== null){
            echo"<script language='javascript' type='text/javascript'>alert('Os campos devem ser preenchidos');window.location.href='Cadastro.php';</script>";
        }else{
            if($logarray == $login){ 
                echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='Cadastro.php';</script>";
                die(); 
                return false;
            }else{
                $query = "INSERT INTO usuarios (login,senha,professor) VALUES ('$login','$senha','$tipo')";
                $insert = mysqli_query($connect,$query);                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='Login.php'</script>";
                    return true;
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='Cadastro.php'</script>";
                    return false;
                }
            }
        }
    }
    efetuaCadastro($_POST['login'], $_POST['senha'], $_POST['usertype']);
?>
</html>