@extends('layouts.app')

@section('content')
    <div class="loader">
        <div class="spinner"></div>
    </div>
    <style>
        .main-container-steper {
            max-width: 100% !important;
            display: block !important;
            padding: 0 !important;
            margin: 0 !important;
            background: #fff !important;
            min-height: calc(100vh - 59px) !important;
        }

        .content-wrapper {
            margin-left: 354px !important;
        }

        .main-container-steper .card {
            width: 100% !important;
        }

        .sidebar nav {
            display: none;
        }

        .main-sidebar,
        .main-sidebar::before {
            width: 355px !important;
        }

        .progress-bar-container {
            background: transparent !important;
        }

        .sidebar ul li:last-child {
            border-bottom: none !important;
        }

        .left-side {
            padding: 16px;
        }

        .card {
            box-shadow: none !important;
        }

        #myList .selected span {
            position: absolute;
            left: -57px;
        }
    </style>

    <div class="container main-container-steper">

        <div class="">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.student.show') }}">Student List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                </ol>
            </nav>
            <div class="form px-4">
                <div class="left-side">
                    <ul id="myList" class="progress-bar  progress-bar-container">
                        <li class="active selected">Tesda Information <span id="formIndicator" class="selected-indicator"><i
                                    class="fa-solid fa-caret-right"></i></span></li>
                        <li>Learner/ Manpower Profile</li>
                        <li> Personal Information</li>
                        <li>Parent/Guardian</li>
                        <li>Benifitiary</li>
                        <li>Classification</li>
                        <li>Student Disability</li>
                        <li>Course/Qualification</li>
                        <li>Other training</li>
                        <li>Summary</li>

                    </ul>
                </div>
                <div class="right-side">
                    <form method="POST" id="resumeGenForm" name="resumeGenForm"
                        action="{{ route('admin.student.update', [$students[0]->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" id="student_id" value={{ $students[0]->id }}>

                        @method('PUT')
                        @csrf
                        <div class="main active  ">
                            <div class="text">
                                <h6>T2MIS Auto Generated
                                </h6>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Unique Learner Identifier*
                                        </label>
                                        <input type="text" class="form-control" name="t2mis"
                                            id="exampleFormControlInput1" value="{{ $data['t2mis'] }}"
                                            placeholder="Unique Learner Identifier*" require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Vouchers Number</label>
                                        <input type="text" class="form-control" name="vouchers_number"
                                            id="exampleFormControlInput1" value="{{ $data['vouchers_number'] }}"
                                            placeholder="Vouchers Number" require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Training Status</label>
                                        <input type="text" class="form-control" name="training_status"
                                            id="exampleFormControlInput1" value="{{ $data['training_status'] }}"
                                            placeholder="Training Status" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Trainor Name
                                        </label>
                                        <input type="text" class="form-control" name="trainor_name"
                                            id="exampleFormControlInput1" value="{{ $data['trainor_name'] }}"
                                            placeholder="Trainor Name" require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Date Started of
                                            training</label>
                                        <input type="date" class="form-control" name="training_date_started"
                                            id="exampleFormControlInput1" value="{{ $data['training_date_started'] }}" require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Date end of
                                            training</label>
                                        <input type="date" class="form-control" name="training_date_end"
                                            id="exampleFormControlInput1" value="{{ $data['training_date_end'] }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name of Assessor
                                        </label>
                                        <input type="text" class="form-control" name="name_of_assessor"
                                            id="exampleFormControlInput1" value="{{ $data['name_of_assessor'] }}"
                                            placeholder="Assesor Name" require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Assessement date</label>
                                        <input type="date" class="form-control" name="training_date_assessed"
                                            id="exampleFormControlInput1" value="{{ $data['training_date_assessed'] }}" require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Assessment Result</label>
                                        <input type="text" class="form-control" name="assessment_result"
                                            id="exampleFormControlInput1" value="{{ $data['assessment_result'] }}"
                                            placeholder="Assessment Result
                                    ">
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Assessment Venue
                                        </label>
                                        <input type="text" class="form-control" name="assessment_venue"
                                            id="assesment_venue" value="{{ $data['assessment_venue'] }}"
                                            placeholder="Assessment Venue">
                                    </div>
                                </div>
                            </div>

                            <div class="buttons">
                                <button type="button" data-id="1" class="next_button">Next Step</button>

                            </div>
                        </div>
                        <div class="main ">

                            <div class="text">
                                <h6>Learner/ Manpower Profile
                                </h6>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">First name*
                                        </label>
                                        <input type="text" name="first_name" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $data['first_name'] }}"
                                            placeholder="First name" require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Last name*
                                        </label>
                                        <input type="text" name="last_name" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $data['last_name'] }}"
                                            placeholder="Last Name " require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Middle name
                                        </label>
                                        <input type="text" name="middle_name" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $data['middle_name'] }}"
                                            placeholder="Middle name " require>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Extension
                                        </label>
                                        <input type="text" name="extension" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $data['extension'] }}"
                                            placeholder="jr,sr,3rd ">
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h6>Complete Permanent Mailing Address
                                </h6>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Region</label>
                                        <input type="hidden" name="permanent_address_region" class="form-control"
                                            id="permanent_address_region"
                                            value="{{ $data['permanent_address_region'] }}">
                                        <select id="region"></select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Province</label>
                                        <input type="hidden" name="permanent_address_province" class="form-control"
                                            id="permanent_address_province"
                                            value="{{ $data['permanent_address_province'] }}">
                                        <select id="province"></select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">City/Municipality</label>
                                        <input type="hidden" name="permanent_address_city" class="form-control"
                                            id="permanent_address_city" value="{{ $data['permanent_address_city'] }}">
                                        <select id="city"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Barangay</label>
                                        <input type="hidden" name="permanent_address_barangay" class="form-control"
                                            id="permanent_address_barangay"
                                            value="{{ $data['permanent_address_barangay'] }}">
                                        <select id="barangay"></select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Number Street
                                        </label>
                                        <input type="text" name="permanent_address_street" class="form-control"
                                            id="permanent_address_street"
                                            value="{{ $data['permanent_address_street'] }}">

                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Contact number
                                        </label>
                                        <input type="text" name="contact_number" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $data['contact_number'] }}"
                                            placeholder="Contact number" require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Contact number 2
                                        </label>
                                        <input type="text" name="contact_number_2" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $data['contact_number_2'] }}"
                                            placeholder="Contact number 2 ">
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email
                                        </label>
                                        <input type="email" class="form-control" name="email"
                                            id="exampleFormControlInput1" value="{{ $data['email'] }}"
                                            placeholder="email@example.com" require>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Student image</label>
                                        <input class="inputfile form-control " type="file" id="formFile">
                                    </div>
                                </div>

                            </div>

                            <div class="buttons button_space">
                                <button type="button" class="back_button">Back</button>
                                <button type="button" class="next_button">Next Step</button>
                            </div>
                        </div>
                        <div class="main  ">
                            <div class="text">
                                <h6>Personal Information</h6>
                            </div>
                            <div class="row student-input">
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Gender *</label>
                                        <select name="gender" class="form-select" value="{{ $data['gender'] }}" require>
                                            <option {{ $data['gender'] == 'Male' ? 'selected' : '' }} value="Male">Male
                                            </option>
                                            <option {{ $data['gender'] == 'Female' ? 'selected' : '' }} value="Female">
                                                Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Civil Status </label>
                                        <select name="civil_status" class="form-select"
                                            value="{{ $data['civil_status'] }}" require>
                                            <option {{ $data['civil_status'] == 'Single' ? 'selected' : '' }}
                                                value="Single">Single</option>
                                            <option {{ $data['civil_status'] == 'Married' ? 'selected' : '' }}
                                                value="Married">Married</option>
                                            <option {{ $data['civil_status'] == 'Widow/er' ? 'selected' : '' }}
                                                value="Widow/er">Widow/er</option>
                                            <option {{ $data['civil_status'] == 'Separated/Annulled' ? 'selected' : '' }}
                                                value="Separated/Annulled">Separated/Annulled</option>
                                            <option {{ $data['civil_status'] == 'Solo Parent' ? 'selected' : '' }}
                                                value="Solo Parent">Solo Parent</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Educational Attainment Before the
                                            Training (Trainee)</label>
                                        <select name="educational_attainment" class="form-select" require>
                                            <option
                                                {{ $data['educational_attainment'] == 'No Grade Completed' ? 'selected' : '' }}
                                                value="No Grade Completed">No Grade Completed</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'Elementary Graduate' ? 'selected' : '' }}
                                                value="Elementary Graduate">Elementary Graduate</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'Elementary Graduate' ? 'selected' : '' }}
                                                value="Elementary Graduate">Elementary Graduate</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'Pre-School(Nursery/Kinder/Prep)' ? 'selected' : '' }}
                                                value="Pre-School(Nursery/Kinder/Prep)">Pre-School(Nursery/Kinder/Prep)
                                            </option>
                                            <option
                                                {{ $data['educational_attainment'] == 'Post Secondary Undergraduate' ? 'selected' : '' }}
                                                value="Post Secondary Undergraduate">Post Secondary Undergraduate</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'Post Secondary graduate' ? 'selected' : '' }}
                                                value="Post Secondary graduate">Post Secondary graduate</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'High School Undergraduate' ? 'selected' : '' }}
                                                value="High School Undergraduate">High School Undergraduate</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'College Undergraduate' ? 'selected' : '' }}
                                                value="College Undergraduate">College Undergraduate</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'Senior High Graduate' ? 'selected' : '' }}
                                                value="Senior High Graduate">Senior High Graduate</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'High School Graduate' ? 'selected' : '' }}
                                                value="High School Graduate">High School Graduate</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'College Gradaute or Higher' ? 'selected' : '' }}
                                                value="College Gradaute or Higher">College Gradaute or Higher</option>
                                            <option
                                                {{ $data['educational_attainment'] == 'Senior High Graduate' ? 'selected' : '' }}
                                                value="Senior High Graduate">Senior High Graduate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Religion
                                        </label>
                                        <select name="religion" class="form-select" require>
                                            <option {{ $data['religion'] == 'None' ? 'selected' : '' }} value="None">
                                                None
                                            </option>
                                            <option {{ $data['religion'] == 'Roman Catholic' ? 'selected' : '' }}
                                                value="Roman Catholic">Roman Catholic</option>
                                            <option {{ $data['religion'] == 'Iglesia Ni Cristo' ? 'selected' : '' }}
                                                value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                                            <option {{ $data['religion'] == 'Evangelicals' ? 'selected' : '' }}
                                                value="Evangelicals">Evangelicals</option>
                                            <option {{ $data['religion'] == 'Protestant' ? 'selected' : '' }}
                                                value="Protestant">Protestant</option>
                                            <option {{ $data['religion'] == 'Aglipayan' ? 'selected' : '' }}
                                                value="Aglipayan">Aglipayan</option>
                                            <option {{ $data['religion'] == 'Seventh-day Adventist' ? 'selected' : '' }}
                                                value="Seventh-day Adventist">Seventh-day Adventist</option>
                                            <option {{ $data['religion'] == 'Bible Baptist Church' ? 'selected' : '' }}
                                                value="Bible Baptist Church">Bible Baptist Church</option>
                                            <option {{ $data['religion'] == 'Jehovahs Witnesses' ? 'selected' : '' }}
                                                value="Jehovahs Witnesses">Jehovahs Witnesses</option>
                                            <option {{ $data['religion'] == 'Islam' ? 'selected' : '' }} value="Islam">
                                                Islam</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h6>Complete Address</h6>
                            </div>
                            <div class="text">
                                <h6>Other relevant information</h6>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nationality
                                        </label>
                                        <input type="text" name="nationality" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $data['nationality'] }}"
                                            placeholder="Nationality " require>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Employment Status (before the
                                            training)
                                            * </label>
                                        <select name="employment_status" class="form-select" require>
                                            <option {{ $data['employment_status'] == 'Employed' ? 'selected' : '' }}
                                                value="Employed">Employed</option>
                                            <option {{ $data['employment_status'] == 'Unemployed' ? 'selected' : '' }}
                                                value="Unemployed">Unemployed</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Date of Employment
                                        </label>
                                        <input type="date" class="form-control" name="date_of_employment"
                                            value="{{ $data['date_of_employment'] }}" >

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name of employer
                                        </label>
                                        <input type="text" class="form-control" name="name_of_employer"
                                            value="{{ $data['name_of_employer'] }}" placeholder="Name of employer">
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Employment address
                                        </label>
                                        <input type="text" class="form-control" id="employment_address"
                                            name="employment_address" value="{{ $data['employment_address'] }}"
                                            placeholder="Employment address">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Salary
                                            * </label>
                                        <input type="text" class="form-control" name="salary"
                                            value="{{ $data['salary'] }}" placeholder="Salary">

                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Date of Birth
                                        </label>
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ $data['date_of_birth'] }}" require>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button type="button" class="back_button">Back</button>
                                <button type="button" class="next_button">Next Step</button>
                            </div>
                        </div>
                        <div class="main ">
                            <div class="text">
                                <h6>Parent/Guardian
                                </h6>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">First name*
                                        </label>
                                        <input type="text" class="form-control" name="parent_first_name"
                                            value="{{ $data['parent_first_name'] }}" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Last name*
                                        </label>
                                        <input type="text" class="form-control" name="parent_last_name"
                                            value="{{ $data['parent_last_name'] }}" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Middle name
                                        </label>
                                        <input type="text" class="form-control" name="parent_middle_name"
                                            value="{{ $data['parent_middle_name'] }}" placeholder="Middle name">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Extension
                                        </label>
                                        <input type="text" class="form-control" name="parent_extension"
                                            value="{{ $data['parent_extension'] }}" placeholder="jr,sr,3rd">
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Relation (to Guardian)*
                                        </label>
                                        <input type="text" class="form-control" name="parent_relation"
                                            value="{{ $data['parent_relation'] }}" placeholder="Relation (to Guardian)">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Date of Birth
                                        </label>
                                        <input type="date" class="form-control" name="parent_dob"
                                            value="{{ $data['parent_dob'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h6>Parent/Guardian Complete Permanent Mailing Address
                                </h6>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        </label>
                                        <input type="text" name="parent_address" class="form-control"
                                            id="parent_address" value="{{ $data['parent_address'] }}"
                                            placeholder="Complete Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email
                                        </label>
                                        <input type="email" class="form-control" name="parent_email"
                                            value="{{ $data['parent_email'] }}" placeholder="email@example.com ">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Contact number
                                        </label>
                                        <input type="text" class="form-control" name="parent_contact"
                                            value="{{ $data['parent_contact'] }}" placeholder="Contact number">
                                    </div>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button type="button" class="back_button">Back</button>
                                <button type="button" class="next_button">Next Step</button>
                            </div>
                        </div>
                        <div class="main ">
                            <div class="text">
                                <h6>Benifitiary
                                </h6>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">First name*
                                        </label>
                                        <input type="text" class="form-control" name="benefitiary_first_name"
                                            value="{{ $data['benefitiary_first_name'] }}" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Last name*
                                        </label>
                                        <input type="text" class="form-control" name="benefitiary_last_name"
                                            value="{{ $data['benefitiary_last_name'] }}" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Middle name
                                        </label>
                                        <input type="text" class="form-control" name="benefitiary_middle_name"
                                            value="{{ $data['benefitiary_middle_name'] }}" placeholder="Middle name">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Extension
                                        </label>
                                        <input type="text" class="form-control" name="benefitiary_extension"
                                            value="{{ $data['benefitiary_extension'] }}" placeholder="jr,sr,3rd">
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Relation (to Guardian)*
                                        </label>
                                        <input type="text" class="form-control" name="benefitiary_relation"
                                            value="{{ $data['benefitiary_relation'] }}"
                                            placeholder="Relation (to Benefitiary)">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Date of Birth
                                        </label>
                                        <input type="date" class="form-control" name="benefitiary_dob"
                                            value="{{ $data['benefitiary_dob'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h6>Benifitiary Complete Permanent Mailing Address
                                </h6>
                            </div>
                            <div class="row student-input">
                                <div class="col">
                                    <div class="mb-3">
                                        </label>
                                        <input type="text" name="benefitiary_address" class="form-control"
                                            id="benefitiary_address" value="{{ $data['benefitiary_address'] }}"
                                            placeholder="Complete Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email
                                        </label>
                                        <input type="email" class="form-control" name="benefitiary_email"
                                            value="{{ $data['benefitiary_email'] }} "placeholder="email@example.com ">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Contact number
                                        </label>
                                        <input type="text" class="form-control" name="benefitiary_contact"
                                            value="{{ $data['benefitiary_dob'] }}" placeholder="Contact number">
                                    </div>
                                </div>
                            </div>

                            <div class="buttons button_space">
                                <button type="button" class="back_button">Back</button>
                                <button type="button" class="next_button">Next Step</button>
                            </div>
                        </div>
                        <div class="main ">
                            <div class="text">
                                <h6> Learner/Trainee/Student (Clients) Classification:
                                </h6>
                            </div>
                            <div class="row student-input border rounded py-3 px-2 mb-4"
                                id="checboxContainerClassification">
                            </div>

                            <div class="buttons button_space">
                                <button class="back_button">Back</button>
                                <button class="next_button">Next Step</button>
                            </div>
                        </div>
                        <div class="main ">
                            <div class="text">
                                <h6>Student Disability:
                                </h6>
                            </div>
                            <div class="disability-form border rounded py-3 px-2 mb-4">
                                <div class="row student-input " id="checboxContainerDisability">
                                </div>
                                <div class="student-input mt-3 d-none" id="disabilityTeaxtarea">
                                    <label for="floatingTextarea2">Please specify:</label>
                                    <textarea class="form-control" name="disability_others" placeholder="Write the discription here ..."
                                        id="disability_others" style="height: 100px">{{ $data['disability_others'] }}</textarea>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Cause of Disability:</label>
                                        <select id="disabledSelect" name="disability_cause" class="form-select">
                                            <option
                                                {{ $data['disability_cause'] == 'Congenital/Inborn' ? 'selected' : '' }}
                                                value="Congenital/Inborn">Congenital/Inborn</option>
                                            <option {{ $data['disability_cause'] == 'Illness' ? 'selected' : '' }}
                                                value="Illness">Illness</option>
                                            <option {{ $data['disability_cause'] == 'Injury' ? 'selected' : '' }}
                                                value="Injury">Injury</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="buttons button_space">
                                <button class="back_button">Back</button>
                                <button class="next_button">Next Step</button>
                            </div>
                        </div>
                        <div class="main">

                            <div class="text">
                                <h6>Course/Qualification
                                </h6>
                            </div>
                            <div class="disability-form border rounded py-3 px-3 mb-4">
                                <div class=" student-input">
                                    <label for="disabledSelect" class="form-label p-0">Type of Course/Qualification:
                                    </label>
                                    <div class="mb-3  border-bottom">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input qualification_type" type="radio"
                                                name="qualification_type" id="inlineRadio1" value="1"
                                                {{ $data['qualification_type'] == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label p-0" for="inlineRadio1">Long term</label>
                                        </div>
                                        <div class="form-check form-check-inline qualification_type">
                                            <input class="form-check-input" type="radio" name="qualification_type"
                                                id="inlineRadio2" value="2"
                                                {{ $data['qualification_type'] == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label p-0" for="inlineRadio2">Short term</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row student-input">
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="disabledSelect" class="form-label">Name of Course/Qualification:
                                            </label>
                                            <select id="courses" name="qualification" class="form-select">
                                                <option disabled>Select Course</option>

                                                @foreach ($qualifications as $key => $qualification)
                                                    <option
                                                        {{ $data['qualification'] == $qualification->id ? 'selected' : '' }}
                                                        value="{{ $qualification->id }}">{{ $qualification->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">School Year
                                            </label>
                                            <input type="text" class="form-control" name="qualification_school_year"
                                                value="{{ $data['qualification_school_year'] }}"
                                                id="exampleFormControlInput1"
                                                placeholder="Contact number
                                            ">
                                        </div>
                                    </div>
                                    <div class="col {{ $data['qualification_type'] == '2' ? 'd-none' : '' }}"
                                        id="semester">
                                        <div class="mb-3">
                                            <label for="disabledSelect" class="form-label">Semester
                                            </label>
                                            <select name="qualification_semester" class="form-select">
                                                <option
                                                    {{ $data['qualification_semester'] == '1st Sem' ? 'selected' : '' }}
                                                    value="1st Sem">1st Sem</option>
                                                <option
                                                    {{ $data['qualification_semester'] == '2nd Sem' ? 'selected' : '' }}
                                                    value="2nd Sem">2nd Sem</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Batch
                                            </label>
                                            <input type="text" class="form-control" name="qualification_batch"
                                                value="{{ $data['qualification_batch'] }}" placeholder="Batch number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row student-input">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Training Day Duration
                                            </label>
                                            <input type="text" class="form-control"
                                                name="qualification_training_day_duration"
                                                value="{{ $data['qualification_training_day_duration'] }}"
                                                placeholder="Training Day Duration">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Training Hours
                                                Duration
                                            </label>
                                            <input type="text" class="form-control"
                                                name="qualification_training_hours_duration"
                                                value="{{ $data['qualification_training_hours_duration'] }}"
                                                placeholder="Training Hours Duration">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="disability-form border rounded py-3 px-3 mb-4">
                                <div class=" student-input">
                                    <label for="disabledSelect" class="form-label p-0">Scholar</label>
                                    <div class="mb-3  border-bottom">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio" name="course_type"
                                                id="inlineRadio1" value="1" selected>
                                            <label class="form-check-label p-0" for="inlineRadio1">Long term</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio" name="course_type"
                                                id="inlineRadio2" value="2" checked="checked">
                                            <label class="form-check-label p-0" for="inlineRadio2">Short term</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row student-input">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="disabledSelect" class="form-label">Type of Scholarship
                                            </label>
                                            <select name="scholarship" class="form-select">
                                                @foreach ($scholarships as $key => $scholarship)
                                                    <option
                                                        {{ $data['scholarship'] == $scholarship->id ? 'selected' : '' }}
                                                        value="{{ $scholarship->id }}">{{ $scholarship->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="student-input">
                                            <label for="floatingTextarea2">Others</label>
                                            <textarea class="form-control" placeholder="Enter Scholarship name" id="floatingTextarea2" style="height: 100px"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button type="button" class="back_button">Back</button>
                                <button type="button" class="next_button">Next Step</button>
                            </div>
                        </div>
                        <div class="main ">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">
                                        <h6>Other training
                                        </h6>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        <h6>License Examination Passed:
                                        </h6>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">
                                        <h6>Competency Assessment Passed
                                        </h6>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="other-training border rounded py-3 px-2 pr-5 mb-4">
                                        <div class="row student-input">
                                            <div class="col-4">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Qualification
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Qualification
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Training
                                                        venue
                                                    </label>
                                                    <input type="text" class="form-control" id="training_venue"
                                                        placeholder="Training venue
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Start date
                                                    </label>
                                                    <input type="date" class="form-control"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">End date
                                                    </label>
                                                    <input type="date" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="End date
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">No# hours
                                                    </label>
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Conducted by
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Conducted by
                                                    ">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success rounded-circle add-tile"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="other-training border rounded py-3 px-2 pr-5 mb-4">
                                        <div class="row student-input">
                                            <div class="col-4">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Title
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Qualification
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Examination
                                                        venue
                                                    </label>
                                                    <input type="text" class="form-control" id="examination_venue"
                                                        placeholder="Training venue
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Year taken
                                                    </label>
                                                    <input type="date" class="form-control"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Rating
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Rating
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Remarks
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Remarks
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Expired date
                                                    </label>
                                                    <input type="date" class="form-control"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>

                                        </div>
                                        <button class="btn btn-success rounded-circle add-tile"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="other-training border rounded py-3 px-2 pr-5 mb-4">
                                        <div class="row student-input">
                                            <div class="col-3">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Qualification
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Qualification
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Qualification
                                                        level
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Qualification level
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Industry
                                                        Inspector
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Industry Inspector
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Certificate
                                                        Number
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Certificate Number
                                                    ">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Date issued
                                                    </label>
                                                    <input type="date" class="form-control"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="">
                                                    <label for="exampleFormControlInput1" class="form-label">Expired date
                                                    </label>
                                                    <input type="date" class="form-control"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>

                                        </div>
                                        <button class="btn btn-success rounded-circle add-tile"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button type="button" class="back_button">Back</button>
                                <button type="button" class="next_button">Next Step</button>
                            </div>
                        </div>

                        <div class="main  ">

                            <div class="text">
                                <h3>Summary</h3>
                            </div>
                            <div class="user_card">
                                <span></span>
                                <div class="circle">
                                    <span><img src="https://i.imgur.com/hnwphgM.jpg"></span>
                                </div>
                                <div class="social">
                                    <span><i class="fa fa-share-alt"></i></span>
                                    <span><i class="fa fa-heart"></i></span>

                                </div>
                                <div class="user_name">
                                    <h3>Peter Hawkins</h3>
                                    <div class="detail">
                                        <p><a href="#">Izmar,Turkey</a>Hiring</p>
                                        <p>17 last day . 94Apply</p>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button class="back_button">Back</button>
                                <button class="submit_button">Submit</button>
                            </div>
                        </div>
                        <div class="main complete-loader">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            <p class="text-center">Marco buci is added</p>
                            <div class="text congrats">
                                <h2>Register Complete!</h2>
                                <div class="button-container mt-3">
                                    <button class="btn btn-outline-danger rounded-pill m-2">Cancel</button>
                                    <button class="btn btn-primary rounded-pill m-2">Add new</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
    <script type="text/javascript">
    
        window.addEventListener("load", function() {
                document.querySelector(".loader").style.display = "none";
            });
          

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(assesment_venue)),{
                types:['geocode'],
            });
            google.maps.event.addListener( autocomplete,'place_changed', function (){
                var near_place =autocomplete.getPlace();
            });
            


            // Get the parent div
            var $parentDiv = $(".sidebar");

            // Get the div to be moved
            var $divToMove = $(".left-side");

            // Move the div to the new parent
            $divToMove.appendTo($parentDiv);

            var myList = document.getElementById('myList');
            var items = myList.getElementsByTagName('li');

            // Add a click event listener to each item
            for (var i = 0; i < items.length; i++) {
                items[i].addEventListener('click', function(event) {
                    // Get the index of the clicked item
                    var index = Array.prototype.indexOf.call(items, event.target);
                    formnumber = index;
                    updateform();
                    progress_forward();
                    setCurrent();
                });
            }

            function setCurrent() {
                // Get the list and its items
                var myList = document.getElementById('myList');
                var items = myList.getElementsByTagName('li');

                // Remove any previously added "selected" class
                for (var j = 0; j < items.length; j++) {
                    items[j].classList.remove('selected');
                }

                // Add "selected" class to the specified item
                items[formnumber].classList.add('selected');

                // Get the indicator element by its ID and append it to the selected item
                var indicator = document.getElementById('formIndicator');
                items[formnumber].appendChild(indicator);
            }

            var next_click = document.querySelectorAll(".next_button");
            var main_form = document.querySelectorAll(".main");
            var step_list = document.querySelectorAll(".progress-bar li");
            let formnumber = 0;

            next_click.forEach(function(next_click_form) {
                next_click_form.addEventListener('click', function() {
                    if (!validateform()) {
                        return false
                    }
                    formnumber++;
                    updateform();
                    progress_forward();
                });
            });

            var back_click = document.querySelectorAll(".back_button");
            back_click.forEach(function(back_click_form) {
                back_click_form.addEventListener('click', function() {
                    formnumber--;
                    updateform();
                    progress_backward();
                });
            });

            var username = document.querySelector("#user_name");
            var shownname = document.querySelector(".shown_name");


            var submit_click = document.querySelectorAll(".submit_button");
            submit_click.forEach(function(submit_click_form) {
                submit_click_form.addEventListener('click', function() {
                    //    shownname.innerHTML= username.value;
                    formnumber++;
                    updateform();
                });
            });


            function updateform() {
                main_form.forEach(function(mainform_number) {
                    mainform_number.classList.remove('active');
                })
                main_form[formnumber].classList.add('active');
            }

            function progress_forward() {
                step_list[formnumber].classList.add('active');
            }

            function progress_backward() {
                var form_num = formnumber + 1;
                step_list[form_num].classList.remove('active');
                num.innerHTML = form_num;
            }




            function validateform() {
                validate = true;
                const validate_inputs = document.querySelectorAll(".main.active input");
                validate_inputs.forEach(function(vaildate_input) {
                    vaildate_input.classList.remove('warning');
                    if (vaildate_input.hasAttribute('require')) {
                        if (vaildate_input.value.length == 0) {
                            validate = false;
                            vaildate_input.classList.add('warning');
                        }
                    }
                });
                return validate;
            }


         

            var classificationData=[];
            var disabilityData = [];

            $.ajax({
                url: "{{ route('disability_show') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                type: "post",
                success: function(data) {

                    $.each(data, function(i, item) {
                        disabilityData.push({
                            label: data[i].name,
                            id: data[i].id
                        });
                    });

                    disabilityData.push({
                        label: 'others',
                        id: '0'
                    });
                    var checboxContainerDisability = document.getElementById(
                        "checboxContainerDisability");

                    $.each(disabilityData, function(index, value) {
                        const split = Math.floor(disabilityData.length / 4) + 1;

                        var checkboxColumn;
                        if (index % split === 0) {
                            checkboxColumn = document.createElement("div");
                            checkboxColumn.className = "col-3";
                            checboxContainerDisability.appendChild(checkboxColumn);
                        } else {
                            checkboxColumn = checboxContainerDisability.lastChild;
                        }

                        const checkbox = document.createElement("div");
                        checkbox.className = "form-check";
                        checkbox.innerHTML =
                            '<input class="form-check-input checkboxDisability" name="disability[]" type="checkbox" value="' +
                            value.id + '" id="checkboxDisability' + value.id +
                            '"><label class="form-check-label p-0" for="checkbox' + value.id +
                            '">' + value.label + '</label>';
                        checkboxColumn.appendChild(checkbox);
                    });

                      $.ajax({
                            url: "{{ route('disability_user') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "student_id": $('#student_id').val()
                            },
                            dataType: "json",
                            type: "post",
                            success: function(data) {
                                $.each(data['disability'], function(index, value) {
                                    var id = '#checkboxDisability' + value;
                                    $('#disabilityTeaxtarea').addClass('d-none');
                                    $(id).attr('checked', true);
                                });

                            },
                        });

                    $('input[name="disability[]"][type="checkbox"]').click(function() {
                        if ($(this).prop("checked") == true && $(this).val() == 0) {
                            $(this).removeClass('checkboxDisability');
                            $('.checkboxDisability').prop('checked', false);
                            $('#checkInput' + this.value).removeClass('d-none');
                            $('#disabilityTeaxtarea').removeClass('d-none');
                        } else if ($(this).prop("checked") == false) {
                            $('#checkInput' + this.value).addClass('d-none');
                            $('#disabilityTeaxtarea').addClass('d-none');

                        }
                    });
                },
            });

            var checboxContainerClassification = document.getElementById("checboxContainerClassification");

              $.ajax({
                url: "{{ route('classification_ajax_show') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                type: "post",
                success: function(data) {
                    console.log(data);
                    $.each(data, function(i, item) {
                        classificationData.push({
                            label: data[i].name,
                            id: data[i].id
                        });
                    });

                    classificationData.push({
                        label: 'others',
                        id: '0'
                    });
                    var checboxContainerDisability = document.getElementById(
                        "checboxContainerDisability");
                        $.each(classificationData, function(index, value) {
                        const split = Math.floor(classificationData.length / 4) + 1;
                        var checkboxColumn;
                        if (index % split === 0) {
                            checkboxColumn = document.createElement("div");
                            checkboxColumn.className = "col-3";
                            checboxContainerClassification.appendChild(checkboxColumn);
                        } else {
                            checkboxColumn = checboxContainerClassification.lastChild;
                        }
                        const checkbox = document.createElement("div");
                        checkbox.className = "form-check";
                         checkbox.innerHTML =
                            '<input class="form-check-input checkboxClassification" name="classification[]" type="checkbox" value="' +
                            value.id + '" id="checkboxClassification' + value.id +
                            '"><label class="form-check-label p-0" for="checkbox' + value.id +
                            '">' + value.label + '</label>';
                        checkboxColumn.appendChild(checkbox);
                    });

                    
                $.ajax({
                url: "{{ route('classification_user') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "student_id": $('#student_id').val()
                },
                dataType: "json",
                type: "post",
                success: function(data) {
                    $.each(data['classification'], function(index, value) {
                        console.log(value);
                        var id = '#checkboxClassification' + value;
                        $('#classificationTeaxtarea').addClass('d-none');
                        $(id).attr('checked', true);
                    });

                },
            });


                    $('input[name="disability[]"][type="checkbox"]').click(function() {
                        if ($(this).prop("checked") == true && $(this).val() == 0) {
                            $(this).removeClass('checkboxDisability');
                            $('.checkboxDisability').prop('checked', false);
                            $('#checkInput' + this.value).removeClass('d-none');
                            $('#disabilityTeaxtarea').removeClass('d-none');
                        } else if ($(this).prop("checked") == false) {
                            $('#checkInput' + this.value).addClass('d-none');
                            $('#disabilityTeaxtarea').addClass('d-none');

                        }
                    });


                },
            });


            $('input:radio[name="qualification_type"]').on('change', function() {
                var type = $(this).val();
                if (type == 2) {
                    $('#semester').addClass('d-none');
                } else {

                    $('#semester').removeClass('d-none');
                }

                $.ajax({
                    url: "{{ route('qualification_show') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": $(this).val()
                    },
                    dataType: "json",
                    type: "post",
                    success: function(data) {



                        $('#courses').empty();
                        $.each(data, function(index, value) {


                            var options = '<option disabled>Select Course</option>';
                            $.each(data, function(index, value) {
                                options += '<option value="' + value.id + '">' +
                                    value.name + '</option>';
                            });
                            $('#courses').html(options);
                        });

                    },
                });

            });

          

        

            $.ajax({
                url: "https://psgc.gitlab.io/api/regions/",
                dataType: "json",
                type: "get",
                success: function(data) {
                    var options;
                    $.each(data, function(index, value) {
                        options += '<option data-name="' + value.regionName + '" value="' +
                            value.code + '">' + value.regionName + '</option>';
                    });
                    $('#region').html(options);

                },
            });

            $('#region').on('change', function() {
                var region_selected = $(this).find(':selected').attr('data-name');
                var id = $(this).val();
                $('#permanent_address_region').val(region_selected);

                $.ajax({
                    url: "https://psgc.gitlab.io/api/regions/" + id + "/provinces/",
                    dataType: "json",
                    type: "get",
                    success: function(data) {
                        var options;
                        $.each(data, function(index, value) {
                            options += '<option data-name="' + value.name +
                                '" value="' + value.code + '">' + value.name +
                                '</option>';
                        });
                        $('#province').html(options);
                    },
                });
            });

            $('#province').on('change', function() {
                var province_selected = $(this).find(':selected').attr('data-name');
                var id = $(this).val();
                $('#permanent_address_province').val(province_selected);

                $.ajax({
                    url: "https://psgc.gitlab.io/api/provinces/" + id + "/cities-municipalities/",
                    dataType: "json",
                    type: "get",
                    success: function(data) {
                        var options;
                        $.each(data, function(index, value) {
                            options += '<option data-name="' + value.name +
                                '" value="' + value.code + '">' + value.name +
                                '</option>';
                        });
                        $('#city').html(options);
                    },
                });
            });

            $('#city').on('change', function() {
                var city_selected = $(this).find(':selected').attr('data-name');
                var id = $(this).val();
                $('#permanent_address_city').val(city_selected);

                $.ajax({
                    url: "https://psgc.gitlab.io/api/cities-municipalities/" + id + "/barangays/",
                    dataType: "json",
                    type: "get",
                    success: function(data) {
                        var options;
                        $.each(data, function(index, value) {
                            options += '<option data-name="' + value.name +
                                '" value="' + value.code + '">' + value.name +
                                '</option>';
                        });
                        $('#barangay').html(options);
                    },
                });
            });

            $('#barangay').on('change', function() {
                var barangay_selected = $(this).find(':selected').attr('data-name');
                var id = $(this).val();
                $('#permanent_address_barangay').val(barangay_selected);
            });




        });
    </script>
@endsection
