<?php
class CadastroSupTeste extends PHPUnit_Framework_TestCase
{
    public function testCPFValido(){
        $cadastro = efetuaCadastro("12345678911","senha","professor");
        $this->assertEquals(1, $cadastro);
    }
    public function testCPFInvalido(){
        $cadastro = efetuaCadastro("189","senha","professor");
        $this->assertEquals(1, $cadastro);
    }
    public function testCPFVazio(){
        $cadastro = efetuaCadastro("","senha","professor");
        $this->assertEquals(0, $cadastro);
    }
    public function testTipo1(){
        $cadastro = efetuaCadastro("12345678911","senha","professor");
        $this->assertEquals(1, $cadastro);
    }
    public function testTipo2(){
        $cadastro = efetuaCadastro("12345678911","senha","responsavel");
        $this->assertEquals(1, $cadastro);
    }
    public function testTipoVazio(){
        $cadastro = efetuaCadastro("12345678911","senha","");
        $this->assertEquals(0, $cadastro);
    }
    public function testSenhaValida(){
        $cadastro = efetuaCadastro("12345678911","senha","professor");
        $this->assertEquals(0, $cadastro);
    }
    public function testSenhaVazia(){
        $cadastro = efetuaLogin("12345678911","","professor");
        $this->assertEquals(0, $cadastro);
    }
}
?>