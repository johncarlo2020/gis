<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student/show');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student=Student::create();

        return redirect()->route('admin.student.edit', ['id' => $student->id]);
        // return view('student/add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $students=Student::where('id',$id)->get();
        $student=json_decode($students[0]['data']);

        $data['t2mis']                              =           $student->t2mis ?? '';
        $data['vouchers_number']                    =           $student->vouchers_number ?? '';
        $data['training_status']                    =           $student->training_status ?? '';
        $data['training_date_started']              =           $student->training_date_started ?? '';
        $data['training_date_end']                  =           $student->training_date_end ?? '';
        $data['trainor_name']                       =           $student->trainor_name ?? '';
        $data['name_of_assessor']                   =           $student->name_of_assessor ?? '';
        $data['training_date_assessed']             =           $student->training_date_assessed ?? '';
        $data['assessment_result']                  =           $student->assessment_result ?? '';
        $data['assessment_venue']                   =           $student->assessment_venue ?? '';
        $data['first_name']                         =           $student->first_name ?? '';
        $data['middle_name']                        =           $student->middle_name ?? '';
        $data['last_name']                          =           $student->last_name ?? '';
        $data['extension']                          =           $student->extension ?? '';
        $data['permanent_address_region']           =           $student->permanent_address_region ?? '';
        $data['permanent_address_province']         =           $student->permanent_address_province ?? '';
        $data['permanent_address_city']             =           $student->permanent_address_city ?? '';
        $data['permanent_address_barangay']         =           $student->permanent_address_barangay ?? '';
        $data['permanent_address_street']           =           $student->permanent_address_street ?? '';
        $data['contact_number']                     =           $student->contact_number ?? '';
        $data['contact_number_2']                   =           $student->contact_number_2 ?? '';
        $data['email']                              =           $student->email ?? '';
        $data['gender']                              =           $student->gender ?? '';
        


       








        return view('student/add', compact('students','data'));
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
        $data['t2mis']                                  =       $request->t2mis;
        $data['vouchers_number']                        =       $request->vouchers_number;
        $data['training_status']                        =       $request->training_status;
        $data['training_date_started']                  =       $request->training_date_started;
        $data['training_date_end']                      =       $request->training_date_end;
        $data['trainor_name']                           =       $request->trainor_name;
        $data['name_of_assessor']                       =       $request->name_of_assessor;
        $data['training_date_assessed']                 =       $request->training_date_assessed;
        $data['assessment_result']                      =       $request->assessment_result;
        $data['assessment_venue']                       =       $request->assessment_venue;
        $data['first_name']                             =       $request->first_name;
        $data['last_name']                              =       $request->last_name;
        $data['middle_name']                            =       $request->middle_name;
        $data['extension']                              =       $request->extension;
        $data['permanent_address_region']               =       $request->permanent_address_region;
        $data['permanent_address_province']             =       $request->permanent_address_province;
        $data['permanent_address_city']                 =       $request->permanent_address_city;
        $data['permanent_address_barangay']             =       $request->permanent_address_barangay;
        $data['permanent_address_street']               =       $request->permanent_address_street;
        $data['contact_number']                         =       $request->contact_number ?? '';
        $data['contact_number_2']                       =       $request->contact_number_2 ?? '';
        $data['email']                                  =       $request->email ?? '';
        $data['gender']                                 =       $request->gender ?? '';





        $input=[
            'data'=> $data
        ];
       


        Student::where('id',$id)->update($input);

        return redirect()->route('admin.student.edit', ['id' => $id]);

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
}
