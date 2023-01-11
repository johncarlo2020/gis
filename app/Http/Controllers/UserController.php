<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('useradmin/user' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $validate_name = DB::table('users')
                ->where('username', '=', $request['data']['fname'].$request['data']['lname'])
                ->count();
        $validate_email = DB::table('users')
                ->where('email', '=', $request['data']['email'])
                ->count();

        if ($validate_name == 0 AND $validate_email == 0) {
        //    dd('no duplicate');
           DB::table('users')->insert(
            [
                'username'  => $request['data']['username'],
                'fname'     => $request['data']['fname'],
                'lname'     => $request['data']['lname'],
                'mname'     => $request['data']['mname'],
                'address'   => $request['data']['address'],
                'mobile_no' => $request['data']['contact'],
                'email'     => $request['data']['email'],
                'role'      => $request['data']['role'],
                'email'     => $request['data']['email'], 
                'status'    => 1, 
                'created_at'=> date("Y-m-d H:i:s")  , 
                'password'  => Hash::make('password'),
            ]);
            return response()->json('success');
        }else{
            return response()->json('failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('users')
            ->where('id', $request['id'])
            ->update(['status' => $request['status']]);

        return response()->json($request['id']);
    }

    public function view(Request $request){

        $data = DB::table('users')
                ->where('id', '=', $request['id'])
                ->get();

        return response()->json($data);
    }


}
