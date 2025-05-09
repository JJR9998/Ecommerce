<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias_blog', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->timestamps();
        });

        Schema::create('articulos', function (Blueprint $table){
            $table->id();
            $table->string('titulo');
            $table->text('contenido');
            $table->string('imagen_url')->nullable();
            $table->string('autor');
            $table->foreignId('id_categoria')->constrained('categorias_blog')->onDelete('cascade');
            $table->date('fecha_publicacion');
            $table->timestamps();
        });


        Schema::create('comentarios', function(Blueprint $table){
            $table->id();
            $table->text('contenido');
            $table->string('nombre_usuario');
            $table->string('email');
            $table->foreignId('id_articulo')->constrained('articulos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
        Schema::dropIfExists('categorias_blog');
        Schema::dropIfExists('comentarios');
    }
};
