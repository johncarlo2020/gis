<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\qualifications;
use App\Models\scholarship;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students=Student::where('status', 1)->get();
        $data=[];
        foreach ($students as $key => $student1) {
            $student=json_decode($student1['data']);
            $data[$student1->id]['id']=$student1->id;
            $data[$student1->id]['t2mis']                                          =           $student->t2mis ?? '';
            $data[$student1->id]['vouchers_number']                                =           $student->vouchers_number ?? '';
            $data[$student1->id]['training_status']                                =           $student->training_status ?? '';
            $data[$student1->id]['training_date_started']                          =           $student->training_date_started ?? '';
            $data[$student1->id]['training_date_end']                              =           $student->training_date_end ?? '';
            $data[$student1->id]['trainor_name']                                   =           $student->trainor_name ?? '';
            $data[$student1->id]['name_of_assessor']                               =           $student->name_of_assessor ?? '';
            $data[$student1->id]['training_date_assessed']                         =           $student->training_date_assessed ?? '';
            $data[$student1->id]['assessment_result']                              =           $student->assessment_result ?? '';
            $data[$student1->id]['assessment_venue']                               =           $student->assessment_venue ?? '';
            $data[$student1->id]['first_name']                                     =           $student->first_name ?? '';
            $data[$student1->id]['middle_name']                                    =           $student->middle_name ?? '';
            $data[$student1->id]['last_name']                                      =           $student->last_name ?? '';
            $data[$student1->id]['extension']                                      =           $student->extension ?? '';
            $data[$student1->id]['permanent_address_region']                       =           $student->permanent_address_region ?? '';
            $data[$student1->id]['permanent_address_province']                     =           $student->permanent_address_province ?? '';
            $data[$student1->id]['permanent_address_city']                         =           $student->permanent_address_city ?? '';
            $data[$student1->id]['permanent_address_barangay']                     =           $student->permanent_address_barangay ?? '';
            $data[$student1->id]['permanent_address_street']                       =           $student->permanent_address_street ?? '';
            $data[$student1->id]['contact_number']                                 =           $student->contact_number ?? '';
            $data[$student1->id]['contact_number_2']                               =           $student->contact_number_2 ?? '';
            $data[$student1->id]['email']                                          =           $student->email ?? '';
            $data[$student1->id]['gender']                                         =           $student->gender ?? '';
            $data[$student1->id]['civil_status']                                   =           $student->civil_status ?? '';
            $data[$student1->id]['educational_attainment']                         =           $student->educational_attainment ?? '';
            $data[$student1->id]['religion']                                       =           $student->religion ?? '';
            $data[$student1->id]['complete_address']                               =           $student->complete_address ?? '';
            $data[$student1->id]['nationality']                                    =           $student->nationality ?? '';
            $data[$student1->id]['employment_status']                              =           $student->employment_status ?? '';
            $data[$student1->id]['date_of_employment']                             =           $student->date_of_employment ?? '';
            $data[$student1->id]['name_of_employer']                               =           $student->name_of_employer ?? '';
            $data[$student1->id]['employment_address']                             =           $student->employment_address ?? '';
            $data[$student1->id]['salary']                                         =           $student->salary ?? '';
            $data[$student1->id]['date_of_birth']                                  =           $student->date_of_birth ?? '';
            $data[$student1->id]['parent_first_name']                              =           $student->parent_first_name ?? '';
            $data[$student1->id]['parent_last_name']                               =           $student->parent_last_name ?? '';
            $data[$student1->id]['parent_middle_name']                             =           $student->parent_middle_name ?? '';
            $data[$student1->id]['parent_extension']                               =           $student->parent_extension ?? '';
            $data[$student1->id]['parent_relation']                                =           $student->parent_relation ?? '';
            $data[$student1->id]['parent_dob']                                     =           $student->parent_dob ?? '';
            $data[$student1->id]['parent_address']                                 =           $student->parent_address ?? '';
            $data[$student1->id]['parent_email']                                   =           $student->parent_email ?? '';
            $data[$student1->id]['parent_contact']                                 =           $student->parent_contact ?? '';
            $data[$student1->id]['benefitiary_first_name']                         =           $student->benefitiary_first_name ?? '';
            $data[$student1->id]['benefitiary_last_name']                          =           $student->benefitiary_last_name ?? '';
            $data[$student1->id]['benefitiary_middle_name']                        =           $student->benefitiary_middle_name ?? '';
            $data[$student1->id]['benefitiary_extension']                          =           $student->benefitiary_extension ?? '';
            $data[$student1->id]['benefitiary_relation']                           =           $student->benefitiary_relation ?? '';
            $data[$student1->id]['benefitiary_dob']                                =           $student->benefitiary_dob ?? '';
            $data[$student1->id]['benefitiary_address']                            =           $student->benefitiary_address ?? '';
            $data[$student1->id]['benefitiary_email']                              =           $student->benefitiary_email ?? '';
            $data[$student1->id]['benefitiary_contact']                            =           $student->benefitiary_contact ?? '';
            $data[$student1->id]['disability']                                     =           $student->disability ?? '';
            $data[$student1->id]['disability_others']                              =           $student->disability_others ?? '';
            $data[$student1->id]['disability_cause']                               =           $student->disability_cause ?? '';
            $data[$student1->id]['qualification_type']                             =           $student->qualification_type ?? '';
            $data[$student1->id]['qualification']                                  =           $student->qualification ?? '';
            $data[$student1->id]['qualification_name']                             =            qualifications::where('id',$student->qualification)->get() ?? '';
            $data[$student1->id]['qualification_school_year']                      =           $student->qualification_school_year ?? '';
            $data[$student1->id]['qualification_semester']                         =           $student->qualification_semester ?? '';
            $data[$student1->id]['qualification_batch']                            =           $student->qualification_batch ?? '';
            $data[$student1->id]['qualification_training_day_duration']            =           $student->qualification_training_day_duration ?? '';
            $data[$student1->id]['qualification_training_hours_duration']          =           $student->qualification_training_hours_duration ?? '';
            $data[$student1->id]['scholarship']                                    =           $student->scholarship ?? '';
    
        }
       


        return view('student/show',compact('data'));


    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inputs = ['status' => 0];
        $student=Student::create($inputs);

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

        $data['t2mis']                                          =           $student->t2mis ?? '';
        $data['vouchers_number']                                =           $student->vouchers_number ?? '';
        $data['training_status']                                =           $student->training_status ?? '';
        $data['training_date_started']                          =           $student->training_date_started ?? '';
        $data['training_date_end']                              =           $student->training_date_end ?? '';
        $data['trainor_name']                                   =           $student->trainor_name ?? '';
        $data['name_of_assessor']                               =           $student->name_of_assessor ?? '';
        $data['training_date_assessed']                         =           $student->training_date_assessed ?? '';
        $data['assessment_result']                              =           $student->assessment_result ?? '';
        $data['assessment_venue']                               =           $student->assessment_venue ?? '';
        $data['first_name']                                     =           $student->first_name ?? '';
        $data['middle_name']                                    =           $student->middle_name ?? '';
        $data['last_name']                                      =           $student->last_name ?? '';
        $data['extension']                                      =           $student->extension ?? '';
        $data['permanent_address_region']                       =           $student->permanent_address_region ?? '';
        $data['permanent_address_province']                     =           $student->permanent_address_province ?? '';
        $data['permanent_address_city']                         =           $student->permanent_address_city ?? '';
        $data['permanent_address_barangay']                     =           $student->permanent_address_barangay ?? '';
        $data['permanent_address_street']                       =           $student->permanent_address_street ?? '';
        $data['contact_number']                                 =           $student->contact_number ?? '';
        $data['contact_number_2']                               =           $student->contact_number_2 ?? '';
        $data['email']                                          =           $student->email ?? '';
        $data['gender']                                         =           $student->gender ?? '';
        $data['civil_status']                                   =           $student->civil_status ?? '';
        $data['educational_attainment']                         =           $student->educational_attainment ?? '';
        $data['religion']                                       =           $student->religion ?? '';
        $data['complete_address']                               =           $student->complete_address ?? '';
        $data['nationality']                                    =           $student->nationality ?? '';
        $data['employment_status']                              =           $student->employment_status ?? '';
        $data['date_of_employment']                             =           $student->date_of_employment ?? '';
        $data['name_of_employer']                               =           $student->name_of_employer ?? '';
        $data['employment_address']                             =           $student->employment_address ?? '';
        $data['salary']                                         =           $student->salary ?? '';
        $data['date_of_birth']                                  =           $student->date_of_birth ?? '';
        $data['parent_first_name']                              =           $student->parent_first_name ?? '';
        $data['parent_last_name']                               =           $student->parent_last_name ?? '';
        $data['parent_middle_name']                             =           $student->parent_middle_name ?? '';
        $data['parent_extension']                               =           $student->parent_extension ?? '';
        $data['parent_relation']                                =           $student->parent_relation ?? '';
        $data['parent_dob']                                     =           $student->parent_dob ?? '';
        $data['parent_address']                                 =           $student->parent_address ?? '';
        $data['parent_email']                                   =           $student->parent_email ?? '';
        $data['parent_contact']                                 =           $student->parent_contact ?? '';
        $data['benefitiary_first_name']                         =           $student->benefitiary_first_name ?? '';
        $data['benefitiary_last_name']                          =           $student->benefitiary_last_name ?? '';
        $data['benefitiary_middle_name']                        =           $student->benefitiary_middle_name ?? '';
        $data['benefitiary_extension']                          =           $student->benefitiary_extension ?? '';
        $data['benefitiary_relation']                           =           $student->benefitiary_relation ?? '';
        $data['benefitiary_dob']                                =           $student->benefitiary_dob ?? '';
        $data['benefitiary_address']                            =           $student->benefitiary_address ?? '';
        $data['benefitiary_email']                              =           $student->benefitiary_email ?? '';
        $data['benefitiary_contact']                            =           $student->benefitiary_contact ?? '';
        $data['disability']                                     =           $student->disability ?? '';
        $data['disability_others']                              =           $student->disability_others ?? '';
        $data['disability_cause']                               =           $student->disability_cause ?? '';
        $data['qualification_type']                             =           $student->qualification_type ?? '';
        $data['qualification']                                  =           $student->qualification ?? '';
        $data['qualification_school_year']                      =           $student->qualification_school_year ?? '';
        $data['qualification_semester']                         =           $student->qualification_semester ?? '';
        $data['qualification_batch']                            =           $student->qualification_batch ?? '';
        $data['qualification_training_day_duration']            =           $student->qualification_training_day_duration ?? '';
        $data['qualification_training_hours_duration']          =           $student->qualification_training_hours_duration ?? '';
        $data['scholarship']                                    =           $student->scholarship ?? '';




        if($data['qualification_type'] == ''){
            $qualifications=qualifications::where('status',1)->get();
        }else{
            $qualifications=qualifications::where('status',1)->where('qualification_type_id',$student->qualification_type)->get();
        }

        $scholarships=scholarship::where('status',1)->get();
   

        return view('student/add', compact('students','data','qualifications','scholarships'));
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
        $data['t2mis']                                              =       $request->t2mis ?? '';
        $data['vouchers_number']                                    =       $request->vouchers_number ?? '';
        $data['training_status']                                    =       $request->training_status ?? '';
        $data['training_date_started']                              =       $request->training_date_started ?? '';
        $data['training_date_end']                                  =       $request->training_date_end ?? '';
        $data['trainor_name']                                       =       $request->trainor_name ?? '';
        $data['name_of_assessor']                                   =       $request->name_of_assessor ?? '';
        $data['training_date_assessed']                             =       $request->training_date_assessed ?? '';
        $data['assessment_result']                                  =       $request->assessment_result ?? '';
        $data['assessment_venue']                                   =       $request->assessment_venue ?? '';
        $data['first_name']                                         =       $request->first_name ?? '';
        $data['last_name']                                          =       $request->last_name ?? '';
        $data['middle_name']                                        =       $request->middle_name ?? '';
        $data['extension']                                          =       $request->extension ?? '';
        $data['permanent_address_region']                           =       $request->permanent_address_region ?? '';
        $data['permanent_address_province']                         =       $request->permanent_address_province ?? '';
        $data['permanent_address_city']                             =       $request->permanent_address_city ?? '';
        $data['permanent_address_barangay']                         =       $request->permanent_address_barangay ?? '';
        $data['permanent_address_street']                           =       $request->permanent_address_street ?? '';
        $data['contact_number']                                     =       $request->contact_number ?? '';
        $data['contact_number_2']                                   =       $request->contact_number_2 ?? '';
        $data['email']                                              =       $request->email ?? '';
        $data['gender']                                             =       $request->gender ?? '';
        $data['civil_status']                                       =       $request->civil_status ?? '';
        $data['educational_attainment']                             =       $request->educational_attainment ?? '';
        $data['religion']                                           =       $request->religion ?? '';
        $data['complete_address']                                   =       $request->complete_address ?? '';
        $data['nationality']                                        =       $request->nationality ?? '';
        $data['employment_status']                                  =       $request->employment_status ?? '';
        $data['date_of_employment']                                 =       $request->date_of_employment ?? '';
        $data['name_of_employer']                                   =       $request->name_of_employer ?? '';
        $data['employment_address']                                 =       $request->employment_address ?? '';
        $data['salary']                                             =       $request->salary ?? '';
        $data['parent_first_name']                                  =       $request->parent_first_name ?? '';
        $data['parent_last_name']                                   =       $request->parent_last_name ?? '';
        $data['parent_middle_name']                                 =       $request->parent_middle_name ?? '';
        $data['parent_extension']                                   =       $request->parent_extension ?? '';
        $data['parent_relation']                                    =       $request->parent_relation ?? '';
        $data['parent_dob']                                         =       $request->parent_dob ?? '';
        $data['parent_address']                                     =       $request->parent_address ?? '';
        $data['parent_email']                                       =       $request->parent_email ?? '';
        $data['parent_contact']                                     =       $request->parent_contact ?? '';
        $data['benefitiary_first_name']                             =       $request->benefitiary_first_name ?? '';
        $data['benefitiary_last_name']                              =       $request->benefitiary_last_name ?? '';
        $data['benefitiary_middle_name']                            =       $request->benefitiary_middle_name ?? '';
        $data['benefitiary_extension']                              =       $request->benefitiary_extension ?? '';
        $data['benefitiary_relation']                               =       $request->benefitiary_relation ?? '';
        $data['benefitiary_dob']                                    =       $request->benefitiary_dob ?? '';
        $data['benefitiary_address']                                =       $request->benefitiary_address ?? '';
        $data['benefitiary_email']                                  =       $request->benefitiary_email ?? '';
        $data['benefitiary_contact']                                =       $request->benefitiary_contact ?? '';
        $data['disability']                                         =       $request->disability ?? '';
        $data['disability_others']                                  =       $request->disability_others ?? '';
        $data['disability_cause']                                   =       $request->disability_cause ?? '';
        $data['qualification_type']                                 =       $request->qualification_type ?? '';
        $data['qualification_school_year']                          =       $request->qualification_school_year ?? '';
        $data['qualification_semester']                             =       $request->qualification_semester ?? '';
        $data['qualification_batch']                                =       $request->qualification_batch ?? '';
        $data['qualification_training_day_duration']                =       $request->qualification_training_day_duration ?? '';
        $data['qualification_training_hours_duration']              =       $request->qualification_training_hours_duration ?? '';
        $data['qualification']                                      =       $request->qualification ?? '';
        $data['scholarship']                                        =       $request->scholarship ?? '';

        $input=[
            'data'=> $data,
            'status' => 1
        ];
       
        Student::where('id',$id)->update($input);

        return redirect()->route('admin.student.show');

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
