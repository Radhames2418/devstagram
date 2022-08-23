<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.registrer');
    }

    public function store(Request $request)
    {
        // dd($request);

        //Validacion
        $this->validate($request, [
            'name'=> 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        $resultado = User::created($request->all());

        dd($resultado);
    }

}
