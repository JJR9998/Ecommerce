<?php

namespace App\Http\Controllers;

use App\Mail\ComentariosMail;
use App\Models\Articulos;
use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ComentariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $articulo = Articulos::findOrFail($id);
        return view('comentarios.create', compact('articulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_articulo)
    {
        $request->validate([
            'contenido' => 'required|string',
            'nombre_usuario' => 'required|string',
            'email' => 'required|email',
        ]);

        $comentario = Comentarios::create([
            'contenido' => $request->contenido,
            'nombre_usuario' => $request->nombre_usuario,
            'email' => $request->email,
            'id_articulo' => $id_articulo,
        ]);

        $articulo = Articulos::findOrFail($id_articulo);

        if($comentario){
            Mail::to('juanjoseruizp04@gmail.com')->send(new ComentariosMail($comentario, $articulo));
        }

        return redirect()->route('articulos_blog.show', $id_articulo)->with('success', 'Comentario agregado exitosamente');
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
    public function edit($articuloId, $comentarioId)
    {
        $comentario = Comentarios::findOrFail($comentarioId);
        $articulo = Articulos::findOrFail($articuloId);

        return view('comentarios.edit', compact('comentario', 'articulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $articuloId, $comentarioId)
    {
        $request->validate([
            'contenido' => 'required|string',
            'nombre_usuario' => 'required|string',
            'email' => 'required|email',
        ]);

        $comentario = Comentarios::findOrFail($comentarioId);

        $comentario->update($request->all());

        return redirect()->route('articulos_blog.show', $articuloId)->with('success', 'Comentario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($articuloId, $comentarioId)
    {
        $comentario = Comentarios::findOrFail($comentarioId);
        $comentario->delete();

        return redirect()->route('articulos_blog.show', $articuloId)->with('success', 'Comentario eliminado');
    }
}