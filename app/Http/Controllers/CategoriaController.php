<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success','Categoría creada correctamente.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success','Categoría actualizada correctamente.');
    }

    public function destroy(Categoria $categoria)
    {
        // Prevent deletion if has products
        if ($categoria->productos()->count() > 0) {
            return redirect()->route('categorias.index')->with('error','No puedes eliminar esta categoría porque tiene productos asociados.');
        }

        $categoria->delete();
        return redirect()->route('categorias.index')->with('success','Categoría eliminada correctamente.');
    }
}
