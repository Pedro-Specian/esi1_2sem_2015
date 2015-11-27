<?php

class NovaTurmaTeste extends PHPUnit_Framework_TestCase{
    public function testCadastroTurmaNormal(){
        $novaTurm = cadastrarNovaTurma(4, "turma teste", 1, 1);
        $this->assertEquals(1, $novaTurm);
    }
    public function testNomeVazio(){
        $novaTurm = cadastrarNovaTurma(4, "", 1, 1);
        $this->assertEquals(0, $novaTurm);
    }
    public function testSerieInvalida(){
        $novaTurm = cadastrarNovaTurma(4, "turma teste", 16, 1);
        $this->assertEquals(0, $novaTurm);
    }
    public function testMateriaInvalida(){
        $novaTurm = cadastrarNovaTurma(4, "turma teste", 1, 80);
        $this->assertEquals(0, $novaTurm);
    }
}
?>