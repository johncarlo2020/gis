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
    </style>

    <div class="container main-container-steper">

        <div class="card ">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Student List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                </ol>
            </nav>
            <div class="form px-4">
                <div class="left-side">
                    <ul class="progress-bar  progress-bar-container">
                        <li class="active">Tesda Information</li>
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
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Unique Learner Identifier*
                                        "
                                        required require>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Vouchers Number</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Vouchers Number" required require>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Training Status</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Training Status" required require>
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Trainor Name
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Trainor Name
                                        " required
                                        require>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date Started of
                                        training</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" required
                                        require>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date end of training</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" required
                                        require>
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name of Assessor
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Trainor Name
                                        " required
                                        require>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date Assessed
                                        training</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Assessment Result</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
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
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Assessment Venue
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="buttons">
                            <button class="next_button">Next Step</button>
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
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="First name
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last name*
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Trainor Name
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Middle name
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Middle name
                                        ">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Extension
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="jr,sr,3rd
                                        ">
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
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Province</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">City/Municipality</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">District</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Barangay</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Number Street
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Number Street
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact number
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Contact number
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact number 2
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Contact number 2
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email
                                    </label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="email@example.com
                                            ">
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
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
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
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Civil Status </label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Educational Attainment Before the
                                        Training (Trainee)</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Religion
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Religion
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <h6>Complete Address</h6>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Region</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Province</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">City/Municipality</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">District</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Barangay</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Number Street
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Number Street
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <h6>Other relevant information</h6>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nationality
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Nationality
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Employment Status (before the training)
                                        * </label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date of Employment
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Date of Employment
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name of employer
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Name of employer
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Employment address
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Employment address
                                        ">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Salary
                                        * </label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date of Birth
                                    </label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
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
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="First name
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last name*
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Trainor Name
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Middle name
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Middle name
                                        ">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Extension
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="jr,sr,3rd
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Relation (to Guardian)*
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Relation (to Guardian)
                                        ">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date of Birth
                                    </label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <h6>Parent/Gueardian Complete Permanent Mailing Address
                            </h6>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Region</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Province</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">City/Municipality</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">District</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Barangay</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Number Street
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Number Street
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email
                                    </label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="email@example.com
                                            ">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact number
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Contact number
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
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
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="First name
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last name*
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Trainor Name
                                        ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Middle name
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Middle name
                                        ">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Extension
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="jr,sr,3rd
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Relation (to Guardian)*
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Relation (to Guardian)
                                        ">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date of Birth
                                    </label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
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
                                    <label for="disabledSelect" class="form-label">Region</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Province</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">City/Municipality</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">District</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Barangay</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Number Street
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Number Street
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email
                                    </label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="email@example.com
                                            ">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact number
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Contact number
                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>
                    <div class="main ">
                        <div class="text">
                            <h6> Learner/Trainee/Student (Clients) Classification:
                            </h6>
                        </div>
                        <div class="row student-input border rounded py-3 px-2 mb-4" id="checboxContainerClassification">
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
                                <textarea class="form-control" placeholder="Write the discription here ..." id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row student-input">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Cause of Disability:</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                        <option>Disabled select</option>
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
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label p-0" for="inlineRadio1">Long term</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label p-0" for="inlineRadio2">Short term</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row student-input">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Name of Course/Qualification:
                                        </label>
                                        <select id="disabledSelect" class="form-select">
                                            <option>Disabled select</option>
                                            <option>Disabled select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">School Year
                                        </label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Contact number
                                            ">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Semester
                                        </label>
                                        <select id="disabledSelect" class="form-select">
                                            <option>Disabled select</option>
                                            <option>Disabled select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Batch
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Batch number
                                            ">
                                    </div>
                                </div>
                            </div>
                            <div class="row student-input">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Training Day Duration
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Training Day Duration
                                            ">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Training Hours Duration
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Training Hours Duration
                                            ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="disability-form border rounded py-3 px-3 mb-4">
                            <div class=" student-input">
                                <label for="disabledSelect" class="form-label p-0">Scholar</label>
                                <div class="mb-3  border-bottom">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label p-0" for="inlineRadio1">Long term</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label p-0" for="inlineRadio2">Short term</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row student-input">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Type of Scholarship
                                        </label>
                                        <select id="disabledSelect" class="form-select">
                                            <option>Disabled select</option>
                                            <option>Disabled select</option>
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
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>
                    <div class="main ">
                        <div class="text">
                            <h6>Other training
                            </h6>
                        </div>
                        <div class="other-training border rounded py-3 px-2 pr-5 mb-4">
                            <div class="row student-input">
                                <div class="col-4">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Qualification
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Qualification
                                            ">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Training venue
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Training venue
                                            ">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Start date
                                        </label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">End date
                                        </label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1"
                                            placeholder="End date
                                            ">
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">No# hours
                                        </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Conducted by
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Conducted by
                                            ">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success rounded-circle add-tile"><i
                                    class="fa-solid fa-plus"></i></button>
                        </div>

                        <div class="text">
                            <h6>License Examination Passed:
                            </h6>
                        </div>
                        <div class="other-training border rounded py-3 px-2 pr-5 mb-4">
                            <div class="row student-input">
                                <div class="col-4">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Title
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Qualification
                                            ">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Examination venue
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Training venue
                                            ">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Year taken
                                        </label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Rating
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Rating
                                            ">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Remarks
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Remarks
                                            ">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Expired date
                                        </label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success rounded-circle add-tile"><i
                                    class="fa-solid fa-plus"></i></button>
                        </div>

                        <div class="text">
                            <h6>Competency Assessment Passed
                            </h6>
                        </div>
                        <div class="other-training border rounded py-3 px-2 pr-5 mb-4">
                            <div class="row student-input">
                                <div class="col-3">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Qualification
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Qualification
                                            ">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Qualification level
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Qualification level
                                            ">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Industry Inspector
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Industry Inspector
                                            ">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Certificate Number
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Certificate Number
                                            ">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Date issued
                                        </label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="">
                                        <label for="exampleFormControlInput1" class="form-label">Expired date
                                        </label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success rounded-circle add-tile"><i
                                    class="fa-solid fa-plus"></i></button>
                        </div>

                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
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

                </div>
            </div>
        </div>
    </div>
@endsection
