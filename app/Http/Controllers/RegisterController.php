<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        // Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validacion
        $this->validate($request, [
            'name'     => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email'    => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        /**
         * Metodo para crear un registro
         */
        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Autenticar usuarios
        auth()->attempt(['email' => $request->email, 'password' => $request->password]);

        //Redireccionar al usuario
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
