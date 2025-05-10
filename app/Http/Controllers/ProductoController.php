<?php

namespace App\Http\Controllers;

use App\Mail\AlertStock;
use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Mail;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Producto::query();

        if ($request->has('categoria_id') && $request->categoria_id != '') {
            $query->where('categoria_id', $request->categoria_id);
        }

        $productos = $query->get();
        $categorias = Categoria::all();

        return view('productos.index', compact('productos', 'categorias'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $nameImagen = null;
            if ($request->hasFile('imagen_url')) {
                $archive = $request->file('imagen_url');
                $nameImagen = $archive->store('productos', 'public'); // Guarda en storage/app/public/productos
            }

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
            'imagen_url' => $nameImagen,
        ]);

        if($producto->stock < 5) {
            Mail::to('juanjoseruizp04@gmail.com')->send(new AlertStock($producto));
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        'categoria_id' => 'required|exists:categorias,id',
        'imagen_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $producto = Producto::findOrFail($id);

    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;
    $producto->categoria_id = $request->categoria_id;

    if ($request->hasFile('imagen_url')) {
        $archivo = $request->file('imagen_url');
        $producto->imagen_url = $archivo->store('productos', 'public');
    }

    $producto->save();

    if ($producto->stock < 5) {
        Mail::to('juanjoseruizp04@gmail.com')->send(new AlertStock($producto));
    }

    return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}