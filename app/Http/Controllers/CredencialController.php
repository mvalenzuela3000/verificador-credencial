<?php

namespace App\Http\Controllers;

use App\Models\VCredencial;
use Illuminate\Http\Request;

class CredencialController extends Controller
{
    public function verificar($codigo){
        $persona = VCredencial::where('codigo', $codigo)->first();

        if (!$persona) {
            return response()->view('credenciales.no-valida', [
                'mensaje' => 'Credencial no válida o no registrada.'
            ], 404);
        }

        if ($persona->estado==2) {
            return response()->view('credenciales.no-valida', [
                'mensaje' => 'La persona ya no se encuentra activa en la institución.'
            ], 403);
        }

        return view('credenciales.verificacion', compact('persona'));
    }
}
