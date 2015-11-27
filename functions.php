<?php
    function efetuaLogin($par_login,$par_senha,$par_submit, $testando){
        $usuario = $par_login;
        $entrar = $par_submit;
        $senha = md5($par_senha);
        $connect = mysqli_connect('localhost','root','','esi1');
        $db = mysqli_select_db($connect,'esi1');
        if (isset($entrar)) {
            $verifica = mysqli_query($connect,"SELECT * FROM usuarios WHERE login = '".$usuario."' AND senha = '".$senha."'") or die("erro ao selecionar");
            if (mysqli_num_rows($verifica)<=0){
                echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='Login.php';</script>";
                //die();
                return 0;
            }else{    
                if($testando==0){
                    session_start();
                    while ($row = mysqli_fetch_row($verifica)) {
                        $_SESSION['id'] = $row[0];
                        $_SESSION['tipo'] = $row[4];
                    }
                    $_SESSION['usuario'] = $usuario;
                    //$_SESSION['id'] = mysqli_fetch_row($verifica)[0];
                    //$_SESSION['tipo'] = mysqli_fetch_row($verifica)[3];
                    //echo $_SESSION['usuario'];
                    //echo $_SESSION['tipo'];
                    //echo $_SESSION['id'];
                    header("Location:index.php");
                    return 1;
                }else{
                    return 1;
                }
                            
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
        $connect = mysqli_connect('localhost','root','','esi1');
        $db = mysqli_select_db($connect,'esi1');
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
                $query = "INSERT INTO usuarios (login,senha,professor) VALUES ('".$login."','".$senha."',".$tipo.");";
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
    function enviaMensagem($par_destinatario, $par_titulo, $par_mensagem, $par_id){
        $dest=$par_destinatario;
        $titulo=$par_titulo;
        $mensagem=$par_mensagem;
        $idprofessor=$par_id;
        $connect = mysqli_connect('localhost','root','','esi1');
        $db = mysqli_select_db($connect,'esi1');
        if($titulo == "" || $titulo == null || $mensagem=="" || $mensagem== null || $dest=="" || $dest== null || $idprofessor=="" || $idprofessor==null){
            echo"<script language='javascript' type='text/javascript'>alert('Os campos devem ser preenchidos');window.location.href='Aviso.php';</script>";
            return 0;
        }else{
            $date = date('Y-m-d H:i:s');
            $query = "INSERT INTO avisos (ID_Professor,titulo,data,texto,escopo) VALUES (".$idprofessor.",'".$titulo."','".$date."','".$mensagem."','".$dest."');";
            $insert = mysqli_query($connect,$query);                 
            if($insert){
                echo"<script language='javascript' type='text/javascript'>window.location.href='Aviso.php';</script>";
                return 1;
            }else{
                echo"<script language='javascript' type='text/javascript'>alert('Não foi possível enviar a mensagem.');window.location.href='Aviso.php'</script>";
                return 0;
            }
        }
    }
    function cadastrarAlunoEmSerie($par_idserie, $par_idaluno){
        $id_serie = $par_idserie;
        $id_aluno = $par_idaluno;
        //$connect = mysqli_connect('newschool.cxfs3swb2lnk.us-west-2.rds.amazonaws.com:1433','EngSoft','Soft1234','newschool');
        $connect = mysqli_connect('localhost','root','','esi1');
        $db = mysqli_select_db($connect,'esi1');
        $query = "UPDATE alunos SET ID_Serie=".$id_serie." WHERE ID_Aluno=".$id_aluno.";";
        $update = mysqli_query($connect,$query);
        //echo mysqli_error($connect);                 
        if($update){
            echo"<script language='javascript' type='text/javascript'>alert('O aluno foi cadastrado com sucesso!');window.location.href='Turmas.php'</script>";
            return 1;
        }else{            
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse aluno.');window.location.href='Turmas.php'</script>";
            return 0;
        }
    }
    function cadastrarAlunoEmTurma($par_idturma, $par_idaluno){
        $id_turma = $par_idturma;
        $id_aluno = $par_idaluno;
        //$connect = mysqli_connect('newschool.cxfs3swb2lnk.us-west-2.rds.amazonaws.com:1433','EngSoft','Soft1234','newschool');
        $connect = mysqli_connect('localhost','root','','esi1');
        $db = mysqli_select_db($connect,'esi1');
        $query = "INSERT INTO matricula (ID_Turma, ID_Aluno) VALUES (".$id_turma.", ".$id_aluno.");";
        $insert = mysqli_query($connect,$query);
        //echo mysqli_error($connect);                 
        if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('O aluno foi cadastrado com sucesso!');window.location.href='Turmas.php'</script>";
            return 1;
        }else{            
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse aluno.');window.location.href='Turmas.php'</script>";
            return 0;
        }
    }
    function cadastrarNovaTurma($par_id, $par_nome, $par_serie, $par_materia){
        $id_professor = $par_id;
        $nome = $par_nome;
        $id_serie = $par_serie;
        $id_materia = $par_materia;
        //$connect = mysqli_connect('newschool.cxfs3swb2lnk.us-west-2.rds.amazonaws.com:1433','EngSoft','Soft1234','newschool');
        $connect = mysqli_connect('localhost','root','','esi1');
        $db = mysqli_select_db($connect,'esi1');
        $query = "INSERT INTO turmas (ID_Professor, ID_Materia, ID_Serie, nome) VALUES (".$id_professor.", ".$id_materia.", ".$id_serie.", '".$nome."');";
        $insert = mysqli_query($connect,$query);
        //echo mysqli_error($connect);                 
        if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('Turma cadastrada com sucesso!');window.location.href='Turmas.php'</script>";
            return 1;
        }else{            
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa turma.');window.location.href='Turmas.php'</script>";
            return 0;
        }
    }
    function cadastrarNovaAtividade($nom, $tip, $desc, $dat, $id_turma){
        $nome=$nom;
        $tipo=$tip;
        $descricao=$desc;
        $data=date_create($dat);
        $id=$id_turma;
        if($nom == "" || $nom == null || $nom == " " || $data==""|| $data== null || $data == " "){
            echo"<script language='javascript' type='text/javascript'>alert('Os campos nome e data devem ser preenchidos');window.location.href='Atividades.php';</script>";
        }else{
        //$connect = mysqli_connect('newschool.cxfs3swb2lnk.us-west-2.rds.amazonaws.com:1433','EngSoft','Soft1234','newschool');
            $connect = mysqli_connect('localhost','root','','esi1');
            $db = mysqli_select_db($connect,'esi1');
            //$data->format('Y-m-d');
            $query = "INSERT INTO atividades (ID_Turma, ID_Tipo, nome, descricao, data) VALUES (".$id.", ".$tipo.", '".$nome."', '".$descricao."', '".date_format($data, 'Y-m-d')."');";
            $insert = mysqli_query($connect,$query);
            echo mysqli_error($connect);                 
            if($insert){
                echo"<script language='javascript' type='text/javascript'>alert('Atividade cadastrada com sucesso!');window.location.href='Atividades.php'</script>";
                return 1;
            }else{            
                echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa atividade.');window.location.href='Atividades.php'</script>";
                return 0;
            }
        }
    }
    function alterarNota($id_at,$id_al,$not){
        $id_atividade = $id_at;
        $id_aluno = $id_al;
        $nota = $not;
        //$connect = mysqli_connect('newschool.cxfs3swb2lnk.us-west-2.rds.amazonaws.com:1433','EngSoft','Soft1234','newschool');
        $connect = mysqli_connect('localhost','root','','esi1');
        $db = mysqli_select_db($connect,'esi1');
        $query_select = "SELECT * FROM notas WHERE ID_Atividade = ".$id_atividade." AND ID_Aluno=".$id_aluno.";";
        $select = mysqli_query($connect,$query_select);
        $array = mysqli_fetch_array($select);
        if(isset($array)){ 
            $query = "UPDATE notas SET ID_Atividade=".$id_atividade.", ID_Aluno=".$id_aluno.", Valor=".$nota." WHERE ID_Atividade=".$id_atividade." AND ID_Aluno=".$id_aluno.";";
            $update = mysqli_query($connect,$query);                 
            if($update){
                echo"<script language='javascript' type='text/javascript'>alert('Nota alterada com sucesso!');window.location.href='Notas.php'</script>";
                return 1;
            }else{
                echo"<script language='javascript' type='text/javascript'>alert('Não foi possível alterar essa nota.');window.location.href='Notas.php'</script>";
                return 0;
            }
            die(); 
            return 0;
        }else{
            $query = "INSERT INTO notas (ID_Atividade,ID_Aluno,Valor) VALUES (".$id_atividade.",".$id_aluno.",".$nota.");";
            $insert = mysqli_query($connect,$query);                 
            if($insert){
                echo"<script language='javascript' type='text/javascript'>alert('Nota inserida com sucesso!');window.location.href='Notas.php'</script>";
                return 1;
            }else{
                echo"<script language='javascript' type='text/javascript'>alert('Não foi possível inserir essa nota');window.location.href='Notas.php'</script>";
                return 0;
            }
        }
    }
    function cadastrarFrequencia($alun, $turm, $dat, $parNumAlunos){
        if($dat==""){
            return 0;
        }
        $alunos = $alun;
        $id_turma = $turm;
        //$data = date_format($dat,'Y-m-d');
        $data = date("Y-m-d", strtotime($dat));
        $numAlunos=$parNumAlunos;
        var_dump($alunos);
        //$connect = mysqli_connect('newschool.cxfs3swb2lnk.us-west-2.rds.amazonaws.com:1433','EngSoft','Soft1234','newschool');
        $connect = mysqli_connect('localhost','root','','esi1');
        $db = mysqli_select_db($connect,'esi1');
        //pega os alunos
        $query_select_matriculas = "SELECT * FROM matricula WHERE ID_Turma=".$id_turma.";";
        $select_matriculas = mysqli_query($connect,$query_select_matriculas);
        $cont=0;
        while ($row_matriculas = mysqli_fetch_row($select_matriculas)) {
            $query_select_alunos = "SELECT * FROM alunos WHERE ID_Aluno=".$row_matriculas[1].";";
            $select_alunos = mysqli_query($connect,$query_select_alunos);

            while($row_alunos = mysqli_fetch_row($select_alunos)){
                $alunosID[$row_alunos[0]]=0;
                $cont++;
            }
        }
        foreach($alunos as $aluno){
            if($aluno!="NO"){
                $alunosID[$aluno]=1;
            }
        }
        reset($alunosID);
        //var_dump($alunosID);
        //var_dump($alunos);
        //reset($alunosID);
        //cadastra as frequencias
        $query_select = "SELECT * FROM frequencia WHERE ID_Turma = ".$id_turma." AND data='".$data."';";
        $select = mysqli_query($connect,$query_select);
        if(mysqli_num_rows($select)>0){
            //atualiza
            
            for($i=0;$i<count($alunosID); $i++){                
                //var_dump($i);
                //echo "->";
                //var_dump(key($alunosID));
                if($alunosID[key($alunosID)]==1){
                    $val=1;
                }else{
                    $val=0;
                }
                $query = "UPDATE frequencia SET presente=".$val." WHERE ID_Aluno=".key($alunosID)." AND ID_Turma=".$id_turma." AND data='".$data."';";
                $update = mysqli_query($connect,$query);
                if(!$update){
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível alterar as frequências.');window.location.href='Frequencia.php'</script>";
                    return 0;
                }
                next($alunosID);
            }
            echo"<script language='javascript' type='text/javascript'>alert('Frequências alteradas com sucesso!');window.location.href='Frequencia.php'</script>";
            return 1;
        }else{
            //insere

            for($i=0;$i<count($alunosID); $i++){
                //var_dump(key($alunosID));
                
                if($alunosID[key($alunosID)]==1){
                    $val=1;
                }else{
                    $val=0;
                }
                $query = "INSERT INTO frequencia (ID_Aluno, ID_Turma, presente, data) VALUES (".key($alunosID).", ".$id_turma.", ".$val.", '".$data."');";
                $insert = mysqli_query($connect,$query);

                if(!$insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível inserir as frequências.');window.location.href='Frequencia.php'</script>";
                    return 0;
                }
                next($alunosID);
            }
            echo"<script language='javascript' type='text/javascript'>alert('Frequências inseridas com sucesso!');window.location.href='Frequencia.php'</script>";
            return 1;
        }
    }
?>