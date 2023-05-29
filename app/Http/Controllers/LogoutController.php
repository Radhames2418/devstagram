<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{

    /**
     * @return RedirectResponse
     */
    public function store (): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
