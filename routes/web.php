<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Renderizar la pagina principal
Route::get('/', function () {
    return view('principal');
});

//Renderizar la pagina de registro y envio del formulario
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

//Renderizar el Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

//Cerrar sesion de la pagina
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


//Renderizar el muro de creacion
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

//Foto - posts
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

//Formulario - posts
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

//Mostar un post en especifico
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Eliminar una publicacion
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//Comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

//Imagen
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

