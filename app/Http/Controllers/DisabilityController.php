<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\disability;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Student;



class DisabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reload(Request $request)
    {
        $count = DB::table('disabilities')
            ->where('status', '=', 1)
            ->count();
        $disabilities = DB::table('disabilities')
            ->where('status', '=', 1)
            ->offset($request['start'])
            ->limit($request['length'])
            ->get([
                'id',
                'name',
                'description',
                'status',
            ]);

        $disabilities = json_decode($disabilities, true);

        $results = array_map(function($disabilities){

            if ($disabilities['status'] == 1) {
               $role = '<center><span class="badge badge-info">Active</span></center>';
            }else{
               $role = '<center><span class="badge badge-danger">Inactive</span></center>';
            }

            if ($disabilities['status'] == 1) {
                $status = '<span data-id="' . $disabilities['id'] . '" data-name="' . $disabilities['name'] . '" class="btn btn-sm btn-danger trigger_btn" data-type="status" data-status="delete"> <i class="fa-solid fa-trash-can"></i></span>';
             }else{
                $status = '<span data-id="' . $disabilities['id'] . '" data-name="' . $disabilities['name'] . '" class="btn btn-sm btn-success trigger_btn" data-type="status" data-status="recover"> <i class="fa-solid fa-hammer"></i></span>';
             }
 
                return  [
                         $disabilities['id'],
                         $disabilities['name'],
                         $disabilities['description'],
                         $role,
                        '<center>
                                <span data-id="'.$disabilities['id'].'" class="btn btn-sm btn-primary trigger_btn" data-type="view"><i class="fa-solid fa-eye"></i></span>&nbsp;
                                <span data-id="'.$disabilities['id'].'" class="btn btn-sm btn-info trigger_btn" data-type="edit"> <i class="fa-solid fa-pen "></i></span>&nbsp;' . 
                                $status . 
                        '</center>',
                ];
            },$disabilities);
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
    public function index()
    {
        $disabilities = DB::table('disabilities')
        ->where('status', '=', 1)
        ->get([
            'id',
            'name',
            'description',
            'status',
        ]);
        return view('disability/show' ,compact('disabilities'));
    }
    public function view(Request $request)
    {
        $data = DB::table('disabilities')
                ->where('id', '=', $request['id'])
                ->get([
                    'id',
                    'name',
                    'description',
            ]);
    return response()->json($data);

    }

    public function show()
    {
        $data = disability::where('status', 1)->get();

    return $data;

    }

    public function user(request $request)
    {
        $students=Student::where('id',$request->student_id)->get();
        $student=json_decode($students[0]['data']);

        $data['disability'] = $student->disability ?? '';

    return $data;

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

        $data = DB::table('disabilities')
            ->where('name', '=', $request['data'])
            ->count();

        if ($data == 0 ) {
        DB::table('disabilities')->insert(
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
    public function update(Request $request)
    {
        DB::table('disabilities')
            ->where('id' , '=' , $request['data']['id'])
            ->update(
             [
                 'name'                 => $request['data']['name'],
                 'description'          => $request['data']['description'],
                 'updated_at'           => date("Y-m-d H:i:s") ,
                 'updatedBy_id'         => Auth::user()->id,
             ]);
             return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = DB::table('disabilities')
            ->where('id', '=', $request['id'])
            ->get([
                'status',
        ]);

        if ($data[0]->status == 1) {
            $status = 0;
        }else{
            $status = 1;
        }

        DB::table('disabilities')
            ->where('id', $request['id'])
            ->update(['status' => $status]);

    return response()->json($status);
    }
    
    public function validate_name(Request $request)
    {
        
        if ($request['type'] == 'validate_new') {
            $data = DB::table('disabilities')
            ->where('status', '=', 1)
            ->where('name', '=', $request['data'])
            ->count();
        }
        if ($request['type'] == 'validate_edit') {
            $data = DB::table('disabilities')
            ->where('status', '=', 1)
            ->where('name', '=', $request['data'])
            ->where('id', '!=', $request['data_id'])
            ->count();
        }

        return response()->json($data);
    }
}
