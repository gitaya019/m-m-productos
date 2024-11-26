<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all(); // Obtener todos los clientes
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'nullable|string|email|max:255'
        ]);

        return Cliente::create($request->all());
    }

    public function show($id)
    {
        return Cliente::findOrFail($id); // Mostrar un cliente específico
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return $cliente;
    }

    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return response(null, 204); // Eliminar un cliente
    }
}
