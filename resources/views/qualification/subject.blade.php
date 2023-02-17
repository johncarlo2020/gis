@extends('layouts.app')

@section('content')
    <section class="main-section">
        <div class="header">
            <h6>User</h6>
        </div>
    </section>
    <section>
        <div class="container-fluid px-3">
            <div class="row">
                <div class="col-3">
                    <div class="nav-course   mr-2 rounded">
                        <div class="head-content px-3 py-2  border-bottom ">
                            <h5>Qualification/Courses</h5>
                        </div>
                        <div class="list-qualification">
                            <p>Long term</p>
                            <ul>
                                <li class="liactive">asdasddasdasdasdasdadadadadasdasdasdasdasdasdasdasd</li>
                                <li>asdasd</li>
                                <li>asdasd</li>
                                <li>asdasd</li>
                            </ul>
                            <p>Short term</p>
                            <ul>
                                <li>asdasd</li>
                                <li>asdasd</li>
                                <li>asdasd</li>
                                <li>asdasd</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-9 ">
                    <div class="tabled-list rounded">
                        <div class="head-content d-flex justify-content-between px-3 py-2 mb-3  border-bottom  ">
                            <h6>The Bachelor of Science in Information Technology (BSIT)</h6>
                            <button class="btn add-btn ">Add <span><i class="fa-solid fa-circle-plus"></i></span></button>
                        </div>
                        <div class="tale-container p-3">
                            /table here
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
