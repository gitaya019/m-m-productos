<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        return Compra::with(['proveedors', 'productos'])->get(); // Obtener todas las compras con relaciones
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'proveedors_id' => 'required|exists:proveedors,id',
            'productos_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer',
        ]);

        return Compra::create($request->all());
    }

    public function show($id)
    {
        return Compra::with(['proveedors', 'productos'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::findOrFail($id);
        $compra->update($request->all());
        return $compra;
    }

    public function destroy($id)
    {
        Compra::findOrFail($id)->delete();
        return response(null, 204);
    }
}
