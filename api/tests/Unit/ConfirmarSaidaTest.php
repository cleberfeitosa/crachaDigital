<?php

namespace Tests\Unit;

use App\Modules\Discentes\Core\Entities\LiberacaoDiscente;
use App\Modules\Discentes\Core\Enums\SituacaoLiberacaoEnum;
use PHPUnit\Framework\TestCase;

class ConfirmarSaidaTest extends TestCase
{

    public function test_confirmar_saida_liberacao_discente_nao_esta_ativa(): void
    {
        $this->expectException(\App\Modules\Discentes\Core\Exceptions\LiberacaoDiscenteIsNotAtivaException::class);
        $this->expectExceptionMessage("A liberação de discente não está ativa.");

        $liberacaoDiscente = new LiberacaoDiscente();
        $liberacaoDiscente->situacao = SituacaoLiberacaoEnum::ENCERRADA->value;

        $liberacaoDiscente->confirmarSaida();
    }

    public function test_confirmar_saida_liberacao_discente_nao_ativa(): void
    {

        $liberacaoDiscente = new LiberacaoDiscente();
        $liberacaoDiscente->situacao = SituacaoLiberacaoEnum::ATIVA->value;

        $liberacaoDiscente->confirmarSaida();

        $this->assertEquals(SituacaoLiberacaoEnum::CONCLUIDO->value, $liberacaoDiscente->situacao, "Liberação concluída");
    }
}
