<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::all(); // Obtener todos los productos
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        return Producto::create($request->all());
    }

    public function show($id)
    {
        return Producto::findOrFail($id); // Mostrar un producto específico
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return $producto;
    }

    public function destroy($id)
    {
        Producto::findOrFail($id)->delete();
        return response(null, 204); // Eliminar un producto
    }
}
