<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KryptoController extends Controller
{

    public function index(Request $request)
    {
        return view('demos/krypto');
    }
}
