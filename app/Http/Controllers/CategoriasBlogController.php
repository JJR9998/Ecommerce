<?php

namespace App\Http\Controllers;

use App\Models\CategoriasBlog;
use Illuminate\Http\Request;

class CategoriasBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog_categorias = CategoriasBlog::all();
        return view('blog_categorias.index', compact('blog_categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog_categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        CategoriasBlog::create($request->all());

        return redirect()->route('categorias_blog.index')->with('success', 'Categoria creada exitosamente');

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
    public function edit(CategoriasBlog $categorias_blog)
    {
        return view('blog_categorias.edit', compact('categorias_blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriasBlog $categorias_blog)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string'
        ]);

        $categorias_blog->update($request->all());

        return redirect()->route('categorias_blog.index')->with('success', 'Categoria actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriasBlog $categorias_blog)
    {
        $categorias_blog->delete();

        return redirect()->route('categorias_blog.index')->with('succes', 'Categoria eliminada correctamente');
    }
}