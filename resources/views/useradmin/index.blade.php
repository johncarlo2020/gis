@extends('layouts.app')

@section('content')
    <section class="main-section mb-0 dashboard-section ">
        <div class="title-head px-2">
            <h1>Dashboard</h1>
        </div>
        <div class="container-fluid">
            <div>
                <div class="tiles-container row gap-2 px-2">
                    <div class="col">
                        <div class="title row shadow-sm  card ">
                            <div class="info col-8">
                                <span>Student count</span>
                                <h1>{{$studentCount}}</h1>
                            </div>
                            <div class="info-icon col-4">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="title row shadow-sm  card ">
                            <div class="info col-8">
                                <span>Active Student Count</span>
                                <h1>{{$activeStudentCount}}</h1>
                            </div>
                            <div class="info-icon col-4">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="title row shadow-sm  card ">
                            <div class="info col-8">
                                <span>Student Request Count</span>
                                <h1>1000</h1>
                            </div>
                            <div class="info-icon col-4">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="title row shadow-sm  card ">
                            <div class="info col-8">
                                <span>Total Courses</span>
                                <h1>{{$courses}}</h1>
                            </div>
                            <div class="info-icon col-4">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <section class="main-section dashboard-section ">
        <div class="container-fluid">
            <div class="chart-table">
                <div class="row">
                    <div class="col-8">
                        <div class="table-resent shadow-sm card  h-100">
                            <div class="title-head border-bottom px-3 py-2 mb-2 bg-success rounded-top">
                                <p class="p-0 m-0">Recent Added Student</p>
                            </div>
                            <div class="table-container py-2 px-3">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Courses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $key => $student)
                                        <tr>
                                            <th scope="row">{{$student->first_name}}</th>
                                            <td>{{$student->last_name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->qualification_name}}</td>
                                        </tr>
                                    @endforeach
                                     
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="chart-student card shadow-sm h-100">
                            <div class="title-head border-bottom px-3 py-2 mb-2 bg-primary rounded-top">
                                <p class="p-0 m-0">Qualification/Courses</p>
                            </div>
                            <div class="chart mt-3 mb-auto">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

<script defer>
    document.addEventListener("DOMContentLoaded", function() {

        var canvas = document.getElementById("myChart");
        var ctx = canvas.getContext("2d");
        ctx.canvas.width = 250;
        ctx.canvas.height = 250;
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', ],
                datasets: [{
                    data: [12, 19, 3],
                    backgroundColor: [
                        '#5072DE',
                        '#35BBCD',
                        '#1ECA89'
                    ],
                }]
            },
            options: {
                cutoutPercentage: 75, // controls the size of the hole in the center of the donut
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // you can also set this to 'top', 'left', or 'right'
                }
            }
        });
    });
</script>
