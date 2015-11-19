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
                echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='Login.php';</script>";
                die();
            }else{           
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tipo'] = mysqli_fetch_row($verifica)[3];
                /*echo $_SESSION['usuario'];
                echo $_SESSION['tipo'];*/
                header("Location:index.php");                
            }
        }
    }
    efetuaLogin($_POST['usuario'], $_POST['senha'], $_POST['submit']);
?>