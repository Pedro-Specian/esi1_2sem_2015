<?php

class FrequenciaTeste extends PHPUnit_Framework_TestCase{
    public function testCadastroNormal(){
        $array=array('1','2','NO');
        $data=date("Y-m-d", strtotime("21-09-2015"));
        $freq = cadastrarFrequencia($array, 1, $data, 2);
        $this->assertEquals(1, $freq);
    }
    public function testDataVazia(){
        $array=array('1','2','NO');
        $data="";
        $freq = cadastrarFrequencia($array, 1, $data, 2);
        $this->assertEquals(0, $freq);
    }
    public function testTurmaSemAlunos(){
        $array=array('NO');
        $data="";
        $freq = cadastrarFrequencia($array, 1, $data, 2);
        $this->assertEquals(0, $freq);
    }
    public function testTurmaVazia(){
        $array="";
        $data="";
        $freq = cadastrarFrequencia($array, 1, $data, 2);
        $this->assertEquals(0, $freq);
    }
    public function testNumAlunosIncorreto(){
        $array=array('1','2','NO');
        $data="";
        $freq = cadastrarFrequencia($array, 1, $data, 6);
        $this->assertEquals(null, $freq);
    }
    
}
?>