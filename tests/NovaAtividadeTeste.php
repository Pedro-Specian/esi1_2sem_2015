<?php

class NovaAtividadeTeste extends PHPUnit_Framework_TestCase{
    public function testCadastrarAtividadeNormal(){
        $data=date("Y-m-d", strtotime("21-09-2015"));
        $cadAtiv = cadastrarNovaAtividade("atividade teste", 1, "atividade inserida para fazer testes", $data, 1);
        $this->assertEquals(1, $cadAtiv);
    }
    public function testAtividadeSemNome(){
        $data=date("Y-m-d", strtotime("21-09-2015"));
        $cadAtiv = cadastrarNovaAtividade("", 1, "atividade inserida para fazer testes", $data, 1);
        $this->assertEquals(0, $cadAtiv);
    }
    public function testTipoInvalido(){
        $data=date("Y-m-d", strtotime("21-09-2015"));
        $cadAtiv = cadastrarNovaAtividade("atividade teste", 100, "atividade inserida para fazer testes", $data, 1);
        $this->assertEquals(0, $cadAtiv);
    }
    public function testMateriaInvalida(){
        $data=date("Y-m-d", strtotime("21-09-2015"));
        $cadAtiv = cadastrarNovaAtividade("atividade teste", 1, "atividade inserida para fazer testes", $data, 82);
        $this->assertEquals(0, $cadAtiv);
    }
    public function testDataVazia(){
        $data="";
        $cadAtiv = cadastrarNovaAtividade("atividade teste", 1, "atividade inserida para fazer testes", $data, 1);
        $this->assertEquals(0, $cadAtiv);
    }
    public function testFormatarData(){
        $data=date("m-d-y", strtotime("21-09-2015"));
        $cadAtiv = cadastrarNovaAtividade("atividade teste", 100, "atividade inserida para fazer testes", $data, 1);
        $this->assertEquals(1, $cadAtiv);
    }
}
?>