<?php
class cadastro_supTeste extends PHPUnit_Framework_TestCase
{
    public function testCPFValido(){
        $cadastro = efetuaLogin("12345678911","senha","professor");
        $this->assertEquals(true, $cadastro);
    }
    public function testCPFInvalido(){
        $cadastro = efetuaLogin("189","senha","professor");
        $this->assertEquals(true, $cadastro);
    }
    public function testCPFVazio(){
        $cadastro = efetuaLogin("","senha","professor");
        $this->assertEquals(false, $cadastro);
    }
    public function testTipo1(){
        $cadastro = efetuaLogin("12345678911","senha","professor");
        $this->assertEquals(true, $cadastro);
    }
    public function testTipo2(){
        $cadastro = efetuaLogin("12345678911","senha","responsavel");
        $this->assertEquals(true, $cadastro);
    }
    public function testTipoVazio(){
        $cadastro = efetuaLogin("12345678911","senha","");
        $this->assertEquals(false, $cadastro);
    }
    public function testSenhaValida(){
        $cadastro = efetuaLogin("12345678911","senha","professor");
        $this->assertEquals(false, $cadastro);
    }
    public function testSenhaVazia(){
        $cadastro = efetuaLogin("12345678911","","professor");
        $this->assertEquals(false, $cadastro);
    }
}
?>