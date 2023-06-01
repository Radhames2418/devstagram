<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(User $user)
    {
        $this->authorize('update', [$user, auth()->user()]);
        return view('perfil.index');
    }

    public function store(Request $request, User $user)
    {
        // Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validacion
        $this->validate($request, [
            'username' => [
                'required',
                'unique:users,username,'.auth()->user()->id,
                'min:3',
                'max:20',
                'not_in:editar-perfil'
            ]
        ]);

        if ($request->imagen)
        {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);

            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('uploads') . '/' . $nombreImagen;

            $imagenServidor->save($imagenPath);
        }


    }
}
