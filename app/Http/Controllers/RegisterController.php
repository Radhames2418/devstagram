<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('auth.register');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
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
