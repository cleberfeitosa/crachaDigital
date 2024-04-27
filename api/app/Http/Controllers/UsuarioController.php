<?php

namespace App\Http\Controllers;

use App\Modules\Usuarios\Core\Entities\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function redefinirPassword(Request $request)
    {
        $usuarioId = $request->user()->id;

        $usuario = Usuario::find($usuarioId);

        $newPassword = $request->input('password');
        $newPasswordHash = Hash::make($newPassword);

        $usuario->password = $newPasswordHash;

        $usuario->save();

        return response()->json([], 204);
    }
}
