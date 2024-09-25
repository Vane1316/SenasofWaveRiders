<?php

namespace App\Http\Controllers;

use App\Models\Racha;
use App\Models\PuntosCategoria;
use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RachaController extends Controller
{
    /**
     * Resetea los puntos de las rachas finalizadas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetearPuntos()
    {
        // Obtiene las rachas que han finalizado
        $rachasFinalizadas = Racha::where('fecha_fin', '<', Carbon::now())->get();

        if ($rachasFinalizadas->isEmpty()) {
            return response()->json(['message' => 'No hay rachas finalizadas para resetear.'], 204);
        }

        foreach ($rachasFinalizadas as $racha) {

            PuntosCategoria::where('racha_id', $racha->id)->delete();
            $categorias = Categoria::all();
            $nuevosPuntos = [];

            foreach ($categorias as $categoria) {
                $nuevosPuntos[] = [
                    'categoria_id' => $categoria->id,
                    'racha_id' => $racha->id,
                    'puntos' => $categoria->puntos,
                ];
            }
            PuntosCategoria::insert($nuevosPuntos);
        }

        return response()->json(['message' => 'Puntos reseteados exitosamente.']);
    }
}