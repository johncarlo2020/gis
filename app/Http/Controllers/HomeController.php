<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    // User Admin
    public function AdminHome()
    {
        return view('useradmin.index');
    }
    // User Encoder
    public function EncoderHome()
    {
        return view('userencoder.index');
    }
    // User Registrar
    public function RegistrarHome()
    {
        return view('userregistrar.index');
    }
}
