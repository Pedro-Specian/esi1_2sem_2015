<?php

class NotaTeste extends PHPUnit_Framework_TestCase{
    public function testCadastrarNotaNormal(){
        $nota = alterarNota(1,1,5.8);
        $this->assertEquals(1, $nota);
    }
     public function testCadastrarNotaInvalida(){
        $nota = alterarNota(1,1,"teste");
        $this->assertEquals(0, $nota);
        $nota = alterarNota(1,1,23.0);
        $this->assertEquals(0, $nota);
        $nota = alterarNota(1,1,-2.8);
        $this->assertEquals(0, $nota);
    }
}
?>