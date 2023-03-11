<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function check()
    {
        if (auth()->check()) {
            if (Auth::user()->role == "gérant") return view('gerant.home');
            if (Auth::user()->role == "vendeur") return view('vendeur.home');
            if (Auth::user()->role == "caissier") return view('caissier.home');
        }

        return view('home');
    }
}
