<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Nombre de la tabla en la BD

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen_url',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}