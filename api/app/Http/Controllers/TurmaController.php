<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtros = $request->query();
        $builder = DB::table('turmas');
        if (key_exists('nome', $filtros)) {

            $builder->orWhere(
                'nome',
                'LIKE',
                '%' . $filtros['nome'] . '%'
            );
        }
        if (key_exists('curso', $filtros)) {

            $builder->orWhere(
                'curso',
                'LIKE',
                '%' . $filtros['curso'] . '%'
            );
        }
        if (key_exists('periodo', $filtros)) {

            $builder->orWhere(
                'periodo',
                'LIKE',
                '%' . $filtros['periodo'] . '%'
            );
        }

        $turmas = $builder->get();

        return response()->json([
            'quantidadeReistros' => count($turmas),
            'data' => $turmas
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turma $turma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        //
    }
}
