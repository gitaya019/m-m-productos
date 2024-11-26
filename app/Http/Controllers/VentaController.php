<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return Venta::with(['clientes', 'productos'])->get(); // Obtener todas las ventas con relaciones
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'clientes_id' => 'required|exists:clientes,id',
            'productos_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer',
        ]);

        return Venta::create($request->all());
    }

    public function show($id)
    {
        return Venta::with(['clientes', 'productos'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $venta->update($request->all());
        return $venta;
    }

    public function destroy($id)
    {
        Venta::findOrFail($id)->delete();
        return response(null, 204);
    }
}
