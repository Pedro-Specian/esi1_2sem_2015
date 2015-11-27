<?php

class CadastroTeste extends PHPUnit_Framework_TestCase{
    public function testCPFValido(){
        $login=rand(0 , 99999999999);
        $tipo="responsavel";
        $senha="senha";
        $cadastro=efetuaCadastro($login,$senha,$tipo);
        $this->assertEquals(1, $cadastro);
    }
    public function testCPFInvalido(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $login=$randomString;
        $tipo="responsavel";
        $senha="senha";
        $cadastro=efetuaCadastro($login,$senha,$tipo);
        $this->assertEquals(0, $cadastro);
    }
    public function testCPFVazio(){
        $login="";
        $tipo="responsavel";
        $senha="senha";
        $cadastro=efetuaCadastro($login,$senha,$tipo);
        $this->assertEquals(0, $cadastro);
    }
    public function testTipo1(){
        $login=rand(0 , 99999999999);
        $tipo="responsavel";
        $senha="senha";
        $cadastro=efetuaCadastro($login,$senha,$tipo);
        $this->assertEquals(1, $cadastro);
    }
    public function testTipo2(){
        $login=rand(0 , 99999999999);
        $tipo="professor";
        $senha="senha";
        $cadastro=efetuaCadastro($login,$senha,$tipo);
        $this->assertEquals(1, $cadastro);
    }
    public function testTipoVazio(){
        $login=rand(0 , 99999999999);
        $tipo="";
        $senha="senha";
        $cadastro=efetuaCadastro($login,$senha,$tipo);
        $this->assertEquals(0, $cadastro);
    }
    public function testSenhaVazia(){
        $login=rand(0 , 99999999999);
        $tipo="responsavel";
        $senha="";
        $cadastro=efetuaCadastro($login,$senha,$tipo);
        $this->assertEquals(0, $cadastro);
    }
}
?>