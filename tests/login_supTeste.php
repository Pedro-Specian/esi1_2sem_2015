<?php
class login_supTeste extends PHPUnit_Framework_TestCase
{
    public function testCamposVazios(){
        $login = efetuaLogin("","");
        $this->assertEquals(false, $login);
    }
    public function testSenhaCorreta(){
        $login = efetuaLogin("teste","teste");
        $this->assertEquals(true, $login);
    }
    public function testLoginVazio(){
        $login = efetuaLogin("","teste");
        $this->assertEquals(true, $login);
    }
    public function testSenhaVazia(){
        $login = efetuaLogin("teste","");
        $this->assertEquals(true, $login);
    }
    public function testSenhaIncorreta(){
        $login = efetuaLogin("teste","aaaa");
        $this->assertEquals(true, $login);
    }
}
?>