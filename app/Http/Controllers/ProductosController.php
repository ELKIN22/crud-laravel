<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $productos = Producto::with('categoria')->get();
        return view('Producto.index', compact('productos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categorias = Categoria::all();
        return view('Producto.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:255|min:5',
            'precio' => 'required|numeric',
            'id_categoria' => 'required|exists:categorias,id'
        ],[
            'nombre.required' => 'El nombre del producto es requerido.',
            'nombre.max' => 'El nombre no puede se mayor a :max',
            'nombre.min' => 'El nombe no puede ser menor a :min',
            'precio.required' => 'El precio es requerido.',
            'precio.numeric' => 'El precio debe ser un numero.',
            'id_categoria.required' => 'La categoría es requerida',
            'id_categoria.exists' => 'La categoría seleccionada no es válida.',
        ]);

        Producto::create(
            array_merge($request->all(), ['activo' => 1])
        );

        return redirect()->route('productos.index')->with('Creación', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
