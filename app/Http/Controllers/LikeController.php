<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * @param Request $request
     * @param Post $post
     * @return RedirectResponsez
     */
    public function store(Request $request, Post $post): RedirectResponse
    {
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();

    }

    /**
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Request $request, Post $post): RedirectResponse
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
