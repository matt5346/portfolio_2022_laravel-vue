<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdminRedirectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->user()->hasRole('user')) {
            return redirect('/admin/dashboard');
        }

        if ($request->user()->hasRole('admin')) {
            return redirect('/admin/dashboard');
        }
    }
}
