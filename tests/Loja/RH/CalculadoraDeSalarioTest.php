<?php

namespace CDC\Loja\RH;

use PHPUnit_Framework_TestCase as PHPUnit;

class CalculadoraDeSalarioTest extends PHPUnit
{
    public function testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite()
    {
        $desenvolvedor = new Funcionario('André',1500.0, new Cargo('Desenvolvedor', new DezOuVintePorCento()));
        $this->assertEquals(1500*0.9,$desenvolvedor->getSalarioLiquido(),null,0.00001);
    }

    public function testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite()
    {
        $desenvolvedor = new Funcionario('André',4000.0, new Cargo('Desenvolvedor', new DezOuVintePorCento()));
        $this->assertEquals(4000*0.8,$desenvolvedor->getSalarioLiquido(),null,0.00001);
    }

    public function testCalculoSalarioParaDBAsComSalarioAbaixoDoLimite()
    {
        $dba = new Funcionario('André',500.0, new Cargo('DBA', new QuinzeOuVinteECincoPorCento()));
        $this->assertEquals(500*0.85,$dba->getSalarioLiquido(),null,0.00001);
    }

    public function testDeveCalcularSalarioParaDBAsComSalarioAcimaDoLimite()
    {
        $dba = new Funcionario("Mauricio", 4500, new Cargo('Testador', new QuinzeOuVinteECincoPorCento()));
        $this->assertEquals(4500 * 0.75, $dba->getSalarioLiquido(), null, 0.00001);
    }
}