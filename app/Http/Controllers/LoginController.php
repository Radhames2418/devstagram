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
        //Validacion
        $this->validate($request, [
            'email' => 'required|max:30',
            'password' => 'required|min:6'
        ]);

        dd($request);
    }
}
