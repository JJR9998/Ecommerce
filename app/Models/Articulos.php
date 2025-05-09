<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{

    protected $table = 'articulos'; 

    protected $fillable = [
        'titulo',
        'contenido',
        'imagen_url',
        'autor',
        'id_categoria',
        'fecha_publicacion'
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_articulo');
    }
}