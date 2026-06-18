<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->get();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:productos,codigo',
            'nombre' => 'required|string|max:150',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'categoria' => 'required|string|max:100',
        ]);

        Producto::create($request->only([
            'codigo',
            'nombre',
            'precio',
            'cantidad',
            'categoria',
        ]));

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:productos,codigo,' . $producto->id,
            'nombre' => 'required|string|max:150',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'categoria' => 'required|string|max:100',
        ]);

        $producto->update($request->only([
            'codigo',
            'nombre',
            'precio',
            'cantidad',
            'categoria',
        ]));

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}
