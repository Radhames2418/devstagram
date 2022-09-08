<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;


class PostController extends Controller
{

    //Middleware para auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Mostrar la vista
    public function index(User $user) {

        return view('dashboard', [
            'user' => $user
        ]);
    }

    //Vista para crear
    public function create() {
        return view('posts.create');
    }

    //Publicar una publicacion
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);

    }
}
