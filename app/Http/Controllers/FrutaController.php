<?php
namespace App\Http\Controllers;

use App\Models\Fruta;
use Illuminate\Http\Request;

class FrutaController extends Controller
{
    public function index()
    {
        return Fruta::with('categoria')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'color' => 'required|string',
            'fecha_cosecha' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $fecha_cosecha = $request->fecha_cosecha;
        $fecha_caducidad = date('Y-m-d', strtotime($fecha_cosecha . ' +7 days'));

        $fruta = Fruta::create([
            'nombre' => $request->nombre,
            'color' => $request->color,
            'fecha_cosecha' => $fecha_cosecha,
            'fecha_caducidad' => $fecha_caducidad,
            'categoria_id' => $request->categoria_id,
        ]);

        return response()->json($fruta, 201);
    }

    public function show($id)
    {
        $fruta = Fruta::with('categoria')->findOrFail($id);
        return $fruta;
    }

    public function update(Request $request, $id)
    {
        $fruta = Fruta::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|required|string',
            'color' => 'sometimes|required|string',
            'fecha_cosecha' => 'sometimes|required|date',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
        ]);

        if ($request->has('fecha_cosecha')) {
            $fecha_caducidad = date('Y-m-d', strtotime($request->fecha_cosecha . ' +7 days'));
            $fruta->fecha_caducidad = $fecha_caducidad;
            $fruta->fecha_cosecha = $request->fecha_cosecha;
        }

        if ($request->has('nombre')) {
            $fruta->nombre = $request->nombre;
        }

        if ($request->has('color')) {
            $fruta->color = $request->color;
        }

        if ($request->has('categoria_id')) {
            $fruta->categoria_id = $request->categoria_id;
        }

        $fruta->save();

        return response()->json($fruta);
    }

    public function destroy($id)
    {
        $fruta = Fruta::findOrFail($id);
        $fruta->delete();

        return response()->json(null, 204);
    }
}
