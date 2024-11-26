<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return Proveedor::all(); // Obtener todos los proveedores
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nit' => 'required|string|max:20',
            'correo' => 'nullable|string|email|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        return Proveedor::create($request->all());
    }

    public function show($id)
    {
        return Proveedor::findOrFail($id); // Mostrar un proveedor específico
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());
        return $proveedor;
    }

    public function destroy($id)
    {
        Proveedor::findOrFail($id)->delete();
        return response(null, 204); // Eliminar un proveedor
    }
}
