<?php
    function efetuaLogin($par_login,$par_senha,$par_submit){
        $usuario = $par_login;
        $entrar = $par_submit;
        $senha = md5($par_senha);
        $connect = mysqli_connect('localhost','root','','usuarios');
        $db = mysqli_select_db($connect,'usuarios');
        if (isset($entrar)) {
            $verifica = mysqli_query($connect,"SELECT * FROM usuarios WHERE login = '$usuario' AND senha = '$senha'") or die("erro ao selecionar");
            if (mysqli_num_rows($verifica)<=0){
                echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='Login.php';</script>";
                die();
                return 0;
            }else{                           
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tipo'] = mysqli_fetch_row($verifica)[3];
                /*echo $_SESSION['usuario'];
                echo $_SESSION['tipo'];*/
                header("Location:index.php");
                return 1;            
            }
        }
    }
    function efetuaCadastro($par_login,$par_senha,$par_tipo){
        $login = $par_login;
        $senha = MD5($par_senha);
        $tipo = 0;
        if(isset($par_tipo) && $par_tipo=='professor'){
                $tipo = 1;
        }
        //$connect = mysqli_connect('newschool.cxfs3swb2lnk.us-west-2.rds.amazonaws.com:1433','EngSoft','Soft1234','newschool');
        $connect = mysqli_connect('localhost','root','','usuarios');
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
                return 0;
            }else{
                $query = "INSERT INTO usuarios (login,senha,professor) VALUES ('$login','$senha','$tipo')";
                $insert = mysqli_query($connect,$query);                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='Login.php'</script>";
                    return 1;
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='Cadastro.php'</script>";
                    return 0;
                }
            }
        }
    }
?>