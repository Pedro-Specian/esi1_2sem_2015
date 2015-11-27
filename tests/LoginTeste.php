<?php

class LoginTeste extends PHPUnit_Framework_TestCase{
    public function testCamposVazios(){
        $login = efetuaLogin("","","Login",1);
        $this->assertEquals(0, $login);
    }
    public function testSenhaCorreta(){
        $login = efetuaLogin("teste","teste","Login",1);
        $this->assertEquals(1, $login);
    }
    public function testLoginVazio(){
        $login = efetuaLogin("","teste","Login",1);
        $this->assertEquals(0, $login);
    }
    public function testSenhaVazia(){
        $login = efetuaLogin("teste","","Login",1);
        $this->assertEquals(0, $login);
    }
    public function testSenhaIncorreta(){
        $login = efetuaLogin("teste","aaaa","Login",1);
        $this->assertEquals(0, $login);
    }
}
?>