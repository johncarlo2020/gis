<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholarships = DB::table('scholarships')
                ->get([
                    'id',
                    'name',
                    'description',
                    'status',
            ]);
        return view('scholarship/show', compact('scholarships'));
        
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
        // dd('test');

        // validation
        $validate_name = DB::table('scholarships')
                ->where('name', '=', $request['data']['name'])
                ->count();

        if ($validate_name == 0 ) {
           DB::table('scholarships')->insert(
            [
                'name'          => $request['data']['name'],
                'description'   => $request['data']['description'],
                'status'        => 1,
                'createdBy_id'=> Auth::user()->id  ,
                'updatedBy_id'=> Auth::user()->id  ,
                'created_at'=> date("Y-m-d H:i:s")  ,
                'updated_at'=> date("Y-m-d H:i:s")  ,
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
        //
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
    public function destroy($id)
    {
        //
    }
    public function name_validate(Request $request)
    {
        $data = DB::table('scholarships')
                ->where('name', '=', $request['data'])
                ->count();

        return response()->json($data);
    }
    public function reload(Request $request)
    {

        $count = DB::table('scholarships')->count();
        $scholarships = DB::table('scholarships')->get([
            'id',
            'name',
            'description',
            'status',
    ]);

        $scholarships = json_decode($scholarships, true);

        $results = array_map(function($scholarships){

            // if ($scholarships['status'] == 1) {
            //    $status = '<span span data-user_id="' . $users['id'] . '" data-name="' . $users['fname'] . ' " "'  . $users['mname'] . ' " "'  . $users['lname'] . '" class="btn btn-sm btn-danger" id="user_delete"> <i class="fa-solid fa-trash-can"></i></span>';
            // }else{
            //    $status = '<span span data-user_id="' . $users['id'] . '" data-name="' . $users['fname'] . ' " "'  . $users['mname'] . ' " "'  . $users['lname'] . '" class="btn btn-sm btn-success" id="user_recover"> <i class="fa-solid fa-hammer"></i></span>';
            // }

                return  [
                         $scholarships['id'],
                         $scholarships['name'],
                         $scholarships['description'],
                         $scholarships['status'],
                        '<center><span data-user_id="" class="btn btn-sm btn-primary" id="user_view"><i class="fa-solid fa-eye"></i></span>&nbsp;<span data-user_id="" class="btn btn-sm btn-info" id="user_edit"> <i class="fa-solid fa-pen"></i></span>&nbsp;</center>',
                ];
            },$scholarships);
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
}
