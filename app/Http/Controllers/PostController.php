<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user)
    {
        return view('dashboard', [
            'user' =>  $user,
            'number_pagination' => 20
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validacion
        $this->validate($request, [
            'titulo'      => 'required|max:255',
            'descripcion' => 'required',
            'imagen'      => 'required',
        ]);

         $request->user()->posts()->create([
            'titulo'      =>  $request->titulo,
            'descripcion' =>  $request->descripcion,
            'imagen'      =>  $request->imagen,
            'user_id'     =>  auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post'         => $post,
            'user'         => $user
        ]);
    }
}
