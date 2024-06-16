<?php

namespace App\Modules\Discentes\Adapters\Jobs;

use App\Modules\Discentes\Application\UseCases\EncerrarLiberacaoDiscenteUseCase;
use App\Modules\Discentes\Core\Entities\LiberacaoDiscente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EncerrarLiberacaoDiscenteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected LiberacaoDiscente $liberacaoDiscente;

    /**
     * Create a new job instance.
     */
    public function __construct(
        LiberacaoDiscente $liberacaoDiscente,

    ) {
        $this->liberacaoDiscente = $liberacaoDiscente;
    }

    /**
     * Execute the job.
     */
    public function handle(EncerrarLiberacaoDiscenteUseCase $encerrarLiberacaoDiscenteUseCase): void
    {
        $encerrarLiberacaoDiscenteUseCase->run($this->liberacaoDiscente->id);
    }
}
