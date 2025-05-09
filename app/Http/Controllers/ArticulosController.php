<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\CategoriasBlog;
use App\Models\Comentarios;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulos::paginate(4);
        return view('articulos_blog.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriasBlog::all();
        return view('articulos_blog.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'contenido' => 'required|string',
            'imagen_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'autor' => 'required|string',
            'id_categoria' => 'required|exists:categorias_blog,id',
        ]);

        $nameImagen = null;
            if ($request->hasFile('imagen_url')) {
                $archive = $request->file('imagen_url');
                $nameImagen = $archive->store('articulos', 'public');
            }

        Articulos::create([
            'titulo' => $validated['titulo'],
            'contenido' => $validated['contenido'],
            'imagen_url' => $nameImagen,
            'autor' => $validated['autor'],
            'id_categoria' => $validated['id_categoria'],
            'fecha_publicacion' => now(),
        ]);

        return redirect()->route('articulos_blog.index')->with('success', 'Articulo creado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $articulo = Articulos::findOrFail($id);
        $comentarios = Comentarios::all();
        return view('articulos_blog.show', compact('articulo','comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $articulo = Articulos::findOrFail($id);
        $categorias = CategoriasBlog::all();
        return view('articulos_blog.edit', compact('articulo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string',
            'contenido' => 'required|string',
            'imagen_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'autor' => 'required|string',
            'id_categoria' => 'required|exists:categorias_blog,id',
        ]);

        $articulo = Articulos::findOrFail($id);

        $articulo->update($request->all());
        return redirect()->route('articulos_blog.index')->with('success', 'Articulo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $articulo = Articulos::findOrFail($id);
        $articulo->delete();

        return redirect()->route('articulos_blog.index')->with('success', 'Articulo eliminado correctamente');
    }
}
