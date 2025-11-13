<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
        ]);

        Vendedor::create($validated);

        return redirect()->route('vendedores.index')->with('success', 'Vendedor creado correctamente.');
    }

    public function edit(Vendedor $vendedor)
    {
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(Request $request, Vendedor $vendedor)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
        ]);

        $vendedor->update($validated);

        return redirect()->route('vendedores.index')->with('success', 'Vendedor actualizado correctamente.');
    }

    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        return redirect()->route('vendedores.index')->with('success', 'Vendedor eliminado correctamente.');
    }
}
