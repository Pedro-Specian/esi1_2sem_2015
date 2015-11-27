<?php

class AvisoTeste extends PHPUnit_Framework_TestCase{
    public function testMandarAvisoProfessores(){
        $aviso = enviaMensagem("professores", "teste", "mensagem de teste", "4");
        $this->assertEquals(1, $aviso);
    }
    public function testMandarAvisoPais(){
        $aviso = enviaMensagem("pais", "teste", "mensagem de teste", 4);
        $this->assertEquals(1, $aviso);
    }
    public function testMandarAvisoTodos(){
        $aviso = enviaMensagem("todos", "teste", "mensagem de teste", 4);
        $this->assertEquals(1, $aviso);
    }
    public function testMandarAvisoDestinatarioVazio(){
        $aviso = enviaMensagem("", "teste", "mensagem de teste", 4);
        $this->assertEquals(0, $aviso);
    }
    public function testMandarAvisoTituloVazio(){
        $aviso = enviaMensagem("todos", "", "mensagem de teste", 4);
        $this->assertEquals(0, $aviso);
    }
    public function testMandarAvisoMensagemVazia(){
        $aviso = enviaMensagem("todos", "teste", "", 4);
        $this->assertEquals(0, $aviso);
    }
    public function testMandarAvisoRemetenteVazio(){
        $aviso = enviaMensagem("todos", "teste", "mensagem de teste", "");
        $this->assertEquals(0, $aviso);
    }
    public function testMandarAvisoTudoVazio(){
        $aviso = enviaMensagem("", "", "", "");
        $this->assertEquals(0, $aviso);
    }
}
?>