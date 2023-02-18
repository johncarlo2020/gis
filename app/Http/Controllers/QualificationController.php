<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qualifications;
use Auth;


class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $qualifications = qualifications::select('qualifications.*','qualification_types.name AS type')
        ->join('qualification_types','qualifications.qualification_type_id','=','qualification_types.id')
        ->get();
        return view('qualification/show',compact('qualifications'));
        
    }

    public function view(Request $request)
    {
        $data = $qualifications = qualifications::select('qualifications.*','qualification_types.name AS type')
        ->join('qualification_types','qualifications.qualification_type_id','=','qualification_types.id')
        ->get();
    return response()->json($data);

    }

    public function name_validate_edit(Request $request)
    {
        $data = qualifications::
                where('name', '=', $request['data'])
                ->where('id', '!=',$request['id'])
                ->count();
        return response()->json($data);
    }

    public function name_validate(Request $request)
    {
        $data = qualifications::where('name', '=', $request['data'])
                ->count();
        return response()->json($data);
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
        $validate_name = qualifications::where('name', '=', $request['data']['name'])
        ->count();

        if ($validate_name == 0 ) {
        qualifications::insert(
            [
                'name'          => $request['data']['name'],
                'qualification_type_id'=>$request['data']['type'],
                'status'        => $request['data']['status'],
                'createdBy_id'=> Auth::user()->id  ,
                'updatedBy_id'=> Auth::user()->id 
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
    public function show(request $request)
    {
        $qualifications=qualifications::where('qualification_type_id', $request->id)->get();

        return($qualifications);
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
        
        qualifications::where('id' , '=' , $request['data']['id'])
        ->update(
         [
             'qualification_type_id' => $request['data']['type'],
             'name'                 => $request['data']['name'],
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
    public function destroy(request $request)
    {
        qualifications::where('id', $request['id'])
        ->update(['status' => $request['status']]);

    return response()->json($request['id']);
    }
}
