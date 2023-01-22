<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ->where('status', '=', 1)
        $users = DB::table('users')
                ->get([
                    'id',
                    'username',
                    'fname',
                    'mname',
                    'lname',
                    'email',
                    'role',
                    'status',
                    'created_at',
                    'updated_at',
            ]);
        return view('useradmin/user' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reload(Request $request)
    {
        
        $count = DB::table('users')->count();
        $users = DB::table('users')->get([
            'id',
            'username',
            'fname',
            'mname',
            'lname',
            'email',
            'role',
            'status',
            'created_at',
            'updated_at',
    ]);;

        $users = json_decode($users, true);
        // $count = json_decode($count, true);

        $results = array_map(function($users){

            if ($users['role'] == 1) {
                $role = "Admin";
            }else if ($users['role'] == 2) {
                $role = "Registrar";
            }else if ($users['role'] == 3) {
                $role = "Encoder";
            }

            if ($users['status'] == 1) {
               $status = '<span span data-user_id="' . $users['id'] . '" data-name="' . $users['fname'] . ' " "'  . $users['mname'] . ' " "'  . $users['lname'] . '" class="btn btn-sm btn-danger" id="user_delete"> <i class="fa-solid fa-trash-can"></i></span>';
            }else{
               $status = '<span span data-user_id="' . $users['id'] . '" data-name="' . $users['fname'] . ' " "'  . $users['mname'] . ' " "'  . $users['lname'] . '" class="btn btn-sm btn-success" id="user_recover"> <i class="fa-solid fa-hammer"></i></span>';
            }

                return  [
                         $users['id'],
                         $users['username'],
                         $users['fname'] . " " . $users['mname'] . " " . $users['lname'],
                         $users['email'],
                         '<center>' . $role . '</center>',
                         '<center>' . $users['created_at'] . '</center>',
                         '<center>' . $users['updated_at'] . '</center>',
                        //  $users['status'],
                        '<center><span data-user_id="'. $users['id'] .'" class="btn btn-sm btn-primary" id="user_view"><i class="fa-solid fa-eye"></i></span>&nbsp;<span data-user_id="' . $users['id'] . '" class="btn btn-sm btn-info" id="user_edit"> <i class="fa-solid fa-pen"></i></span>&nbsp;' . $status . '</center>',
                ];
            },$users);
            // $results = $results->toArray();
            $data = [
                "data"            => $results,
                "draw"            => $request['draw'],
                "recordsTotal"    => $count,
                "recordsFiltered" => $count,
            ];

        // dd($users);
        return response()->json($data);

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
                'updated_at'=> date("Y-m-d H:i:s")  , 
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
    public function edit(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString(); // Produces something like "2019-03-11 12:25:00"

        
        $validate_name = DB::table('users')
                ->where([
                    ['username', '=', $request['data']['username']],
                    ['id', '!=', $request['data']['id']],
                ])
                ->count();
        $validate_email = DB::table('users')
                ->where([
                    ['username', '=', $request['data']['username']],
                    ['id', '!=', $request['data']['id']],
                ])
                ->count();
                    // dd($validate_email);
        if ($validate_name == 0 AND $validate_email == 0) {

           DB::table('users')
           ->where('id' , '=' , $request['data']['id'])
           ->update(
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
                'updated_at'=> date("Y-m-d H:i:s")  , 
                'password'  => Hash::make('password'),
            ]);
            return response()->json('success');
        }else{
            return response()->json('failed');
        }
            // return response()->json($current_date_time);

        

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
                ->get([
                    'id',
                    'username',
                    'fname',
                    DB::raw('IFNULL( mname, "") as mname'),
                    'lname',
                    'email',
                    'address',
                    'mobile_no',
                    'role',
                    'status',
                    'created_at',
                    'updated_at',
            ]);;

        return response()->json($data);
    }
    // username checker
    public function username_validate(Request $request){

        $data = DB::table('users')
                ->where('username', '=', $request['data'])
                ->count();

        return response()->json($data);
    }
    public function username_validate_edit(Request $request){

        $data = DB::table('users')
                ->where('username', '=', $request['data'])
                ->where('id', '!=', Auth::user()->id)
                ->count();

        return response()->json($data);
    }


}
