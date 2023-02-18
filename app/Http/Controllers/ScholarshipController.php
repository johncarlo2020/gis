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
        $validate_name = DB::table('scholarships')
                ->where('name', '=', $request['data']['name'])
                ->count();

        if ($validate_name == 0 ) {
           DB::table('scholarships')->insert(
            [
                'name'          => $request['data']['name'],
                'description'   => $request['data']['description'],
                'status'        => $request['data']['status'],
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
    public function view(Request $request)
    {
        $data = DB::table('scholarships')
                ->where('id', '=', $request['id'])
                ->get([
                    'id',
                    'name',
                    'description',
            ]);
    return response()->json($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

            DB::table('scholarships')
            ->where('id' , '=' , $request['data']['id'])
            ->update(
             [
                 'name'                 => $request['data']['name'],
                 'description'          => $request['data']['description'],
                 'updated_at'           => date("Y-m-d H:i:s") ,
                 'updatedBy_id'         => Auth::user()->id,
             ]);
             return response()->json('success');

        // return response()->json($request);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    DB::table('scholarships')
        ->where('id', $request['id'])
        ->update(['status' => $request['status']]);

    return response()->json($request['id']);
    }

    public function name_validate_edit(Request $request)
    {
        $data = DB::table('scholarships')
                ->where('name', '=', $request['data'])
                ->where('id', '!=',$request['id'])
                ->count();
        return response()->json($data);
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
        $scholarships = DB::table('scholarships')
        ->offset($request['start'])
        ->limit($request['length'])
        ->get([
            
            'id',
            'name',
            'description',
            'status',
    ]);

        $scholarships = json_decode($scholarships, true);

        $results = array_map(function($scholarships){

            if ($scholarships['status'] == 1) {
               $role = '<center><span class="badge badge-info">Active</span></center>';
            }else{
               $role = '<center><span class="badge badge-danger">Inactive</span></center>';
            }

            if ($scholarships['status'] == 1) {
                $status = '<span data-scholarship_id="' . $scholarships['id'] . '" data-name="' . $scholarships['name'] . '" class="btn btn-sm btn-danger" id="scholarship_delete"> <i class="fa-solid fa-trash-can"></i></span>';
             }else{
                $status = '<span data-scholarship_id="' . $scholarships['id'] . '" data-name="' . $scholarships['name'] . '" class="btn btn-sm btn-success" id="scholarship_recover"> <i class="fa-solid fa-hammer"></i></span>';
             }
 
                return  [
                         $scholarships['id'],
                         $scholarships['name'],
                         $scholarships['description'],
                         $role,
                        '<center><span data-name="' . $scholarships['name'] . '"  data-scholarship_id="'.$scholarships['id'].'" class="btn btn-sm btn-primary" id="scholarship_view"><i class="fa-solid fa-eye"></i></span>&nbsp;<span data-scholarship_id="'.$scholarships['id'].'" class="btn btn-sm btn-info" id="scholarship_edit"> <i class="fa-solid fa-pen"></i></span>&nbsp;' . $status . '</center>',
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
