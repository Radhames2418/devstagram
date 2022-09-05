<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->remember);

        //Validacion de los campos
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        //Retorna un mensaje si el usuario no escribio sus credenciales correcta
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Credenciales Incorrecta');
        }

        return redirect()->route('posts.index');
    }

    public function logout(){
        return redirect()->route('login');
    }
}
