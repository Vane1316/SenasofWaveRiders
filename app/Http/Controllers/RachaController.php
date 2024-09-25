<?php

namespace App\Http\Controllers;

use App\Models\Racha;
use App\Models\PuntosCategoria;
use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RachaController extends Controller
{
    public function resetearPuntos()
    {
        // Obtener todas las rachas que ya finalizaron
        $rachasFinalizadas = Racha::where('fecha_fin', '<', Carbon::now())->get();

        foreach ($rachasFinalizadas as $racha) {
            // Eliminar los registros de puntos anteriores relacionados con la racha
            PuntosCategoria::where('racha_id', $racha->id)->delete();

            // Generar nuevos registros para esta racha con los puntos de la categoría
            $categorias = Categoria::all();
            foreach ($categorias as $categoria) {
                PuntosCategoria::create([
                    'categoria_id' => $categoria->id,
                    'racha_id' => $racha->id,
                    'puntos' => $categoria->puntos, // Asignar los puntos predeterminados de la categoría
                ]);
            }
        }

        return response()->json(['message' => 'Puntos reseteados exitosamente.']);
    }
}
