<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriasBlog extends Model
{
    protected $table = 'categorias_blog';

    protected $fillable = [
        'nombre', 
        'descripcion'
    ];

    public function articulos()
    {
        return $this->hasMany(Articulos::class);
    }
}