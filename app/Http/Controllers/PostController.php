<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * @param User $user
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(User $user): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('dashboard', [
            'user' =>  $user,
            'number_pagination' => 20
        ]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validacion
        $this->validate($request, [
            'titulo'      => 'required|max:255',
            'descripcion' => 'required',
            'imagen'      => 'required',
        ]);

         $request->user()->posts()->create([
            'titulo'      =>  $request->titulo,
            'descripcion' =>  $request->descripcion,
            'imagen'      =>  $request->imagen,
            'user_id'     =>  auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    /**
     * @param User $user
     * @param Post $post
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(User $user, Post $post): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('posts.show', [
            'post'         => $post,
            'user'         => $user
        ]);
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('delete', $post);
        $post->delete();

        // Eliminar la imagen
        $imagenPath = public_path('uploads') . '/' . $post->imagen;

        if (File::exists($imagenPath)) {
            unlink($imagenPath);
        }


        return redirect()->route('posts.index', auth()->user()->username);
    }
}
