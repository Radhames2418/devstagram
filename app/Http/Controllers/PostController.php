<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
