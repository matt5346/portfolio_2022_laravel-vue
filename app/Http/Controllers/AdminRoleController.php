<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->user()->hasRole('admin')) {
            return view('main');
        }

        if (request()->user()->hasRole('user')) {
            return view('main');
        }
    }
}
