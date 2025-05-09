<?php

use App\Http\Controllers\ArticulosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriasBlogController;
use App\Http\Controllers\ComentariosController;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\CategoriasBlog;

Route::get('/', function () {
    $totalProductos = Producto::count();
    $totalCategorias = Categoria::count();
    $productosBajoStock = Producto::where('stock', '<', 5)->count();

    return view('welcome', compact('totalProductos', 'totalCategorias', 'productosBajoStock'));
});

Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class)->except(['show']);
Route::resource('categorias_blog', CategoriasBlogController::class);
Route::resource('articulos_blog', ArticulosController::class);
Route::view('/viewBlog', 'viewBlog')->name('view-blog');
Route::resource('articulos_blog.comentarios', ComentariosController::class);
Auth::routes();