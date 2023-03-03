<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\qualifications;

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
    // User Admin
    public function AdminHome()
    {
        $studentCount = Student::count();
        $activeStudentCount = Student::where('status',1)->count();
        $students= Student::where('status',1)->take(10)->get();
        foreach ($students as $key => $student1) {
            $students[$key]=json_decode($student1['data']);

            $courses=qualifications::where('id',$students[$key]->qualification)->where('status',1)->get();
            $students[$key]->qualification_name=$courses[0]->name;

        }
        $courses=qualifications::where('status',1)->count();
        return view('useradmin.index',compact('studentCount','activeStudentCount','courses','students'));
    }
    // User Encoder
    public function EncoderHome()
    {
       //here
        return view('userencoder.index');
    }
    // User Registrar
    public function RegistrarHome()
    {
         //here
        return view('userregistrar.index');
    }
}
