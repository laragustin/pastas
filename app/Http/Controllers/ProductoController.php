<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $productos = Producto::all();
    return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $datos = $request->only(['nombre', 'descripcion', 'precio']);

    if ($request->hasFile('imagen')) {
        $path = $request->file('imagen')->store('productos', 'public');
        $datos['imagen'] = $path; // Se guarda el path relativo, ejemplo: "productos/pasta1.jpg"
    }

    Producto::create($datos);

    return redirect()->route('productos.index')->with('success', 'Producto creado con éxito');
}

    /**
     * Display the specified resource.
     */
    public function show( Producto $producto)
    {
        return view('productos.show', compact('producto'));//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Producto $producto)
    {
        return view('productos.edit', compact('producto'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
{
    $request->validate([
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $datos = $request->only(['nombre', 'descripcion', 'precio']);

    if ($request->hasFile('imagen')) {
        $datos['imagen'] = $request->file('imagen')->store('productos', 'public');
    }

    $producto->update($datos);

    return redirect()->route('productos.index')->with('success', 'Producto actualizado');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado');//
    }
}
