<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Follower;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

/**
 * Register
 */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


/**
 * Login
 */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


/**
 * Post
 */
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{user:username}/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');

Route::delete('/posts/{post}',  [PostController::class, 'destroy'])->name('posts.destroy');


/**
 * Comment
 */
Route::post('/posts/{user:username}/post/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

/**
 * Imagen
 */
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');


/*
 * Like
 */
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');



/*
 * Perfil
 */
Route::get('/{user:username}/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/{user:username}/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

/**
 * Follower
 */

Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');
