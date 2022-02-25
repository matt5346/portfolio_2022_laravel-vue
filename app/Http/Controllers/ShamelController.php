<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShamelController extends Controller
{

    public function index(Request $request)
    {
        return view('demos/shamel');
    }
}
