<?php
class CadastroSupTeste extends PHPUnit_Framework_TestCase
{
    public function testCPFValido(){
        $cadastro = efetuaLogin("12345678911","senha","professor");
        $this->assertEquals(1, $cadastro);
    }
    public function testCPFInvalido(){
        $cadastro = efetuaLogin("189","senha","professor");
        $this->assertEquals(1, $cadastro);
    }
    public function testCPFVazio(){
        $cadastro = efetuaLogin("","senha","professor");
        $this->assertEquals(0, $cadastro);
    }
    public function testTipo1(){
        $login = efetuaLogin("12345678911","senha","professor");
        $this->assertEquals(1, $cadastro);
    }
    public function testTipo2(){
        $login = efetuaLogin("12345678911","senha","responsavel");
        $this->assertEquals(1, $cadastro);
    }
    public function testTipoVazio(){
        $login = efetuaLogin("12345678911","senha","");
        $this->assertEquals(0, $cadastro);
    }
    public function testSenhaValida(){
        $login = efetuaLogin("12345678911","senha","professor");
        $this->assertEquals(0, $cadastro);
    }
    public function testSenhaVazia(){
        $login = efetuaLogin("12345678911","","professor");
        $this->assertEquals(0, $cadastro);
    }
}
?>