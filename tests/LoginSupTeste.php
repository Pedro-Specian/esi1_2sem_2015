<?php

include "LoginSup.php";

class LoginSupTeste extends PHPUnit_Framework_TestCase{
    public function testCamposVazios(){
        $login = efetuaLogin("","","Login");
        $this->assertEquals(false, $login);
    }
    public function testSenhaCorreta(){
        $login = efetuaLogin("teste","teste","Login");
        $this->assertEquals(true, $login);
    }
    public function testLoginVazio(){
        $login = efetuaLogin("","teste","Login");
        $this->assertEquals(true, $login);
    }
    public function testSenhaVazia(){
        $login = efetuaLogin("teste","","Login");
        $this->assertEquals(true, $login);
    }
    public function testSenhaIncorreta(){
        $login = efetuaLogin("teste","aaaa","Login");
        $this->assertEquals(true, $login);
    }
}
?>