<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    // Get Name
    public function getName(){
        $user = Auth::user();
        $name = $user->fname . ' ' . $user->lname;

        return  $name;
    }
    // User Admin
    public function AdminHome()
    {
        $name = $this->getName();
        return view('useradmin.index', compact('name'));
    }
    // User Encoder
    public function EncoderHome()
    {
       //here
       $name = $this->getName();
        return view('userencoder.index',compact('name'));
    }
    // User Registrar
    public function RegistrarHome()
    {
         //here
         $name = $this->getName();
        return view('userregistrar.index',compact('name'));
    }
}
