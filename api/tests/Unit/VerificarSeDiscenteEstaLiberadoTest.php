<?php

namespace Tests\Unit;

use App\Modules\Discentes\Core\Entities\LiberacaoDiscente;
use App\Modules\Discentes\Core\Enums\SituacaoLiberacaoEnum;
use PHPUnit\Framework\TestCase;

class VerificarSeDiscenteEstaLiberadoTest extends TestCase
{

    public function test_liberacao_discente_nao_esta_ativa(): void
    {

        $liberacaoDiscente = new LiberacaoDiscente();
        $liberacaoDiscente->situacao = SituacaoLiberacaoEnum::ENCERRADA;

        $estaAtiva = $liberacaoDiscente->estaAtiva();

        $this->assertEquals(false, $estaAtiva, "Liberação está ativa");
    }

    public function test_liberacao_discente_esta_ativa(): void
    {

        $liberacaoDiscente = new LiberacaoDiscente();
        $liberacaoDiscente->situacao = SituacaoLiberacaoEnum::ATIVA->value;

        $estaAtiva = $liberacaoDiscente->estaAtiva();

        $this->assertEquals(true, $estaAtiva, "Liberação está ativa");
    }
}
