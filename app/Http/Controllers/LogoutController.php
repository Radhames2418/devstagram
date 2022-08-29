<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function store(){

        //Cerrar la sesion
        auth()->logout();

        //Redireccionar
        return redirect()->route('login');
    }
}
