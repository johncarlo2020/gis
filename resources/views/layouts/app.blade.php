<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>AdminLTE 3 | Dashboard 3</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- AdminLTE -->
    <script src="{{ asset('js/adminlte.js') }}" defer></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('chart.js/Chart.min.js') }}" defer></script>


    <!-- Additional Scripts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>



</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa-solid fa-bell"></i>
                        <span class="badge badge-danger navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item mr-4">
                    <div class="user-panel  d-flex">
                        <div class="info">
                            <a href="#" class="d-block user-Name">
                                {{-- session data --}}
                                @php
                                    $myData = session('my_data');
                                @endphp
                                {{ $myData }}
                            </a>
                        </div>
                        <div class="image">
                            <button class="btn p-0" id="navDropDown" data-clicked="false">
                                <img src="{{ asset('images/user2-160x160.jpg') }}" class="img-circle border-light"
                                    alt="User Image">
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="nav-drop" id="navDropItem">
            <ul class="nav">
                <li>
                    <a href="" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="" class="nav-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>Setting</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-Container elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.home') }}" class="brand-link">
                <img src="{{ asset('images/logo-white.png') }}" alt="Logo" class="brand-image img-circle "
                    style="opacity: .8">
                <span class="brand-text ">Institute</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav  nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item dashboard-link">
                            <a href="{{ route('admin.home') }}"
                                class="nav-link {{ request()->routeIs('admin.home', 'encoder.home', 'registrar.home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ auth()->user()->role == 3 ? 'd-none' : '' }}">
                            <a class="nav-link {{ request()->routeIs('admin.qualification*') ? 'active' : '' }}">
                                <i class="fa-solid fa-bars"></i>
                                <p>
                                    Qualification/Courses
                                </p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview ">
                                <li class="nav-item">
                                    <a href="{{ route('admin.qualification.show') }}" class="nav-link">
                                        <p>Courses</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/docs/3.2/javascript/push-menu.html" class="nav-link">
                                        <p>Subject</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ auth()->user()->role == 3 ? 'd-none' : '' }}">
                            <a href="{{ route('admin.scholarship.show') }}"
                                class="nav-link {{ request()->routeIs('admin.scholarship*') ? 'active' : '' }}">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p>
                                    Scholarship
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ auth()->user()->role == 3 ? 'd-none' : '' }} ">
                            <a href="{{ route('admin.disability.show') }}"
                                class="nav-link {{ request()->routeIs('admin.disability*') ? 'active' : '' }}">
                                <i class="fa-solid fa-wheelchair"></i>
                                <p>
                                    Disability
                                </p>

                            </a>
                        </li>
                        <li class="nav-item {{ auth()->user()->role == 3 ? 'd-none' : '' }}">
                            <a href="{{ route('admin.classification.show') }}"
                                class="nav-link {{ request()->routeIs('admin.classification*') ? 'active' : '' }}">
                                <i class="fa-solid fa-people-group"></i>
                                <p>
                                    Client Classification
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('admin.student.show') }}"
                                class="nav-link {{ request()->routeIs('admin.student*') ? 'active' : '' }}">
                                <i class="fa-solid fa-user-graduate"></i>
                                <p>
                                    Student
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ auth()->user()->role != 1 ? 'd-none' : '' }}">
                            <a href="{{ route('admin.user') }}"
                                class="nav-link {{ request()->routeIs('admin.user*') ? 'active' : '' }}">
                                <i class="fa-solid fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>

                    </ul>
                    <div class="log-out">
                        <a class="nav-link logout-icon">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                @yield('content')
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer d-none">
            <strong>Copyright &copy; 2014-2021 </strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>

    <style>
        .image {
            position: relative;
        }

        #navDropDown {
            position: relative;
        }

        #navDropItem {
            width: 136PX;
            position: absolute;
            background: #FFFFFF;
            box-shadow: 0px -2px 12px rgb(0 0 0 / 11%);
            border-radius: 5px;
            top: 60px;
            right: 25px;
            z-index: 9999;
            PADDING: 10PX;
        }

        #navDropItem ul li a {
            font-size: 13px;
            padding: 5px 1rem;
        }
    </style>
    <script>
        $(document).ready(function() {

            var myData = '{{ $myData }}';
            $("#navDropItem").hide();
            var open = false;
            $("#navDropDown").click(function() {
                console.log(open);
                open = !open;
                showdrop();
            });

            function showdrop() {
                if (open === false) {
                    $("#navDropItem").hide().fadeOut(1000);


                } else {
                    $("#navDropItem").show().fadeIn(1000);
                }
            }

        });
    </script>
    @yield('scripts')



</body>

</html>
