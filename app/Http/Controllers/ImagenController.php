<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image;


class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        // Obtene la imagen subida
        $imagen = $request->file('file');

        // Generamos un id unico para la imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //Se insatancia la clase de interventions image, para usar sus propiedades
        $imagenServidor = Image::make($imagen);

        /**
         * fit, es un metodo de la clase interventions para cortar la imagen y poder guardarla
         * de manera que todas sean iguales/
         */
        $imagenServidor->fit(1000, 1000);

        // Generamos una nueva carpeta, para mover la imagen.
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        // Movemos la imagen que esta en el servidor hacia la carpeta creada
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
