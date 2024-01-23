<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <title>Edu MS</title> --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon1.png') }}" />
    <link href="{{ asset('layouts/vertical-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../layouts/vertical-light-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('../layouts/vertical-light-menu/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('../src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../layouts/vertical-light-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../layouts/vertical-light-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <link href="{{ asset('../src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('../src/plugins/src/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">

    <link href="{{ asset('src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('../src/assets/css/light/apps/invoice-add.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('../src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('../src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('../src/assets/css/dark/apps/invoice-add.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('../layouts/custom.css') }}" rel="stylesheet" type="text/css" />


</head>

<body class="layout-boxed">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        {{-- <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div> --}}
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl a1">
        <header class="header navbar navbar-expand-sm expand-header">

            <a href="javascript:void(0);" class="sidebarCollapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>

            <div class="search-animated toggle-search">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        {{-- <input type="text" class="form-control search-form-control  ml-lg-auto"
                            placeholder=""> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x search-close">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                </form>
                <span class="badge badge-secondary"></span>
            </div>

            <ul class="navbar-item flex-row ms-lg-auto ms-0">
                <li class="nav-item theme-toggle-item">
                    <a href="javascript:void(0);" class="nav-link theme-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-moon dark-mode">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-sun light-mode">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </a>
                </li>

                {{-- <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg><span class="badge badge-success"></span>
                    </a>
                </li> --}}

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-container">
                            <div class="avatar avatar-sm avatar-indicators avatar-online">
                                <img alt="avatar" src="{{ asset('../src/assets/img/profile-30.png') }}"
                                    class="rounded-circle">
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <div class="emoji me-2">
                                    &#x1F44B;
                                </div>
                                <div class="media-body">
                                    <h5>{{ Auth::user()->name }}</h5>
                                    {{-- <p>Project Leader</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="user-profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> <span>Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="app-mailbox.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                    <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                    <path
                                        d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                    </path>
                                </svg> <span>Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth-boxed-lockscreen.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11"
                                        rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg> <span>Lock Screen</span>
                            </a>
                        </div>

                        <div class="dropdown-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> <span>Log Out</span>
                                </a>
                            </form>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="/">
                                <img src="{{ asset('img/favicon1.png') }}" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="/" class="nav-link"> DRSIMC </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left">
                                <polyline points="11 17 6 12 11 7"></polyline>
                                <polyline points="18 17 13 12 18 7"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu active">
                        <a href="{{ route('dashboard') }}" aria-expanded="" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#NewStudent" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Application</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="NewStudent"
                            data-bs-parent="#accordionExample">
                            {{-- <li>
                                <a href="{{ route('applicant.foreign') }}"> Application List </a>
                            </li> --}}
                            <li>
                                <a href="#level-three" data-bs-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle collapsed">Application List<svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="level-three"
                                    data-bs-parent="#pages">
                                    <li>
                                        <a href="{{ route('applicant.local') }}"> Local </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('applicant.foreignList') }}"> Foreign</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('offerLetter.index') }}"> Offer Letter </a>
                            </li>
                            <li>
                                <a href="{{ route('booking.index') }}"> Application Payments </a>
                            </li>
                            <li>
                                <a href="{{ route('confirmation.index') }}"> Application Conformation </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('applicant.local') }}"> Application Sort List (Local) </a>
                            </li>                             --}}
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#Students" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                                <span>Students</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Students" data-bs-parent="#accordionExample">
                            <li>
                                <a href="{{ route('student.create') }}"> New Admission </a>
                            </li>
                            <li>
                                <a href="{{ route('student.index') }}"> Admission List </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#newStudents" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check-square">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg>
                                <span>Admission</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="newStudents"
                            data-bs-parent="#accordionExample">
                            <!--<li>-->
                            <!--    <a href="{{ route('student.rollSheet') }}"> Student Roll Sheet </a>-->
                            <!--</li>-->
                            <li>
                                <a href="{{ route('applicant.current') }}"> Student (Current) </a>
                            </li>
                            <li>
                                <a href="{{ route('student.alumni') }}"> Student (Alumni) </a>
                            </li>
                            <li>
                                <a href="{{ route('applicant.canceled') }}"> Student (Cancel) </a>
                            </li>
                            <li>
                                <a href="{{ route('applicant.all') }}"> Student List (All) </a>
                            </li>
                            <li>
                                <a href="{{ route('portalStudent.view') }}"> Student Login (Portal) </a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu">
                        <a href="#Academic" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark">
                                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <span>Academic </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Academic" data-bs-parent="#accordionExample">
                            <li>
                                <a href="{{ route('examReg.search') }}"> Exam Registration </a>
                            </li>
                            <li>
                                <a href="{{ route('examReg.index') }}"> Exam Reg List </a>
                            </li>
                            <li>
                                <a href="{{ route('examResult.index') }}"> Exam Result </a>
                            </li>
                            <li>
                                <a href="{{ route('testimonial.index') }}"> Testimonial Issue </a>
                            </li>
                            <li>
                                <a href="{{ route('testimonial.index') }}"> Testimonial Issue Bulk </a>
                            </li>
                            <li>
                                <a href="{{ route('application.index') }}">Application</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <!-- {{ route('paymentHistory.index') }} -->
                        <a href="{{ route('booking.index') }}" aria-expanded="" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                                <span>Payments</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#Associate" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                                    <rect x="2" y="7" width="20" height="14"
                                        rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                                <span>Associate</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Associate" data-bs-parent="#accordionExample">
                            <li>
                                <a href="{{ route('associate.index') }}"> Associate List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#report" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span>Report</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="report" data-bs-parent="#accordionExample">
                            <li>
                                <a href="{{ route('student.idPrint') }}"> ID Print</a>
                            </li>
                            <li>
                                <a href="{{ route('student.rollSheet') }}"> Student Roll Sheet </a>
                            </li>
                            <li>
                                <a href="{{ route('student.reportUniversityList') }}"> Report University Sheet </a>
                            </li>
                            <li>
                                <a href="{{ route('associate.report') }}"> Associate Report </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#Hostel" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                                    <rect x="3" y="3" width="18" height="18"
                                        rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                                <span>Hostel </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Hostel" data-bs-parent="#accordionExample">
                            <li>
                                <a href="/maintenance"> New Admission </a>
                            </li>
                            <li>
                                <a href="/maintenance"> Admission List </a>
                            </li>
                        </ul>
                    </li>
                    
                    <!--<li class="menu">-->
                    <!--    <a href="{{ route('dashboard') }}" aria-expanded="" class="dropdown-toggle">-->
                    <!--        <div class="">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
                    <!--                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
                    <!--                stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">-->
                    <!--                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>-->
                    <!--                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>-->
                    <!--            </svg>-->
                    <!--            <span>Library </span>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li class="menu">-->
                    <!--    <a href="#application" data-bs-toggle="collapse" aria-expanded="false"-->
                    <!--        class="dropdown-toggle">-->
                    <!--        <div class="">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
                    <!--                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
                    <!--                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">-->
                    <!--                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>-->
                    <!--                <polyline points="14 2 14 8 20 8"></polyline>-->
                    <!--                <line x1="16" y1="13" x2="8" y2="13"></line>-->
                    <!--                <line x1="16" y1="17" x2="8" y2="17"></line>-->
                    <!--                <polyline points="10 9 9 9 8 9"></polyline>-->
                    <!--            </svg>-->
                    <!--            <span>Application</span>-->
                    <!--        </div>-->
                    <!--        <div>-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
                    <!--                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
                    <!--                stroke-linecap="round" stroke-linejoin="round"-->
                    <!--                class="feather feather-chevron-right">-->
                    <!--                <polyline points="9 18 15 12 9 6"></polyline>-->
                    <!--            </svg>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--    <ul class="collapse submenu list-unstyled" id="application"-->
                    <!--        data-bs-parent="#accordionExample">-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('application.index') }}"> Appliaction List</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('applicationType.index') }}"> Application Type </a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('offerLetter.index') }}"> Offer Letter</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('testimonial.index') }}"> Testimonial </a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <li class="menu">
                        <a href="#Settings" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>
                                <span>Settings</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Settings" data-bs-parent="#accordionExample">
                            <li>
                                <a href="{{ route('course.index') }}">Course</a>
                            </li>
                            <li>
                                <a href="{{ route('courseSubject.index') }}">Course Subject</a>
                            </li>
                            <li>
                                <a href="{{ route('examName.index') }}">Exam Name</a>
                            </li>
                            <li>
                                <a href="{{ route('examDetails.index') }}">Exam Details</a>
                            </li>
                            <li>
                                <a href="{{ route('paymentSchedule.index') }}">Payment Schedule</a>
                            </li>
                            <li>
                                <a href="{{ route('paymentScheduleDetails.index') }}">Payment Schedule Details</a>
                            </li>
                            <li>
                                <a href="{{ route('template.index') }}">Templetes</a>
                            </li>
                            <li>
                                <a target="_blank" href="{{ route('application2.foreign') }}"> Application Public URL </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#College" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                                <span>College</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="College" data-bs-parent="#accordionExample">
                            <li>
                                <a href="{{ route('university.index') }}">University</a>
                            </li>
                            <li>
                                <a href="{{ route('college.index') }}">College</a>
                            </li>
                            <li>
                                <a href="{{ route('collegeDetail.index') }}">College Details</a>
                            </li>
                            <li>
                                <a href="{{ route('collegeFee.index') }}">College Fee</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#user" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>User</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="user" data-bs-parent="#accordionExample">
                            <li>
                                @can('permission-list')
                                    <a href="{{ route('permission.index') }}">Permission</a>
                                @endcan
                            </li>
                            <li>
                                @can('role-list')
                                    <a href="{{ route('roles.index') }}">Role</a>
                                @endcan
                            </li>
                            <li>
                                @can('user-list')
                                    <a href="{{ route('users.index') }}">User</a>
                                @endcan
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="menu">
                        <a href="{{ route('roles.index') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-gitlab">
                                    <path
                                        d="M22.65 14.39L12 22.13 1.35 14.39a.84.84 0 0 
                                        1-.3-.94l1.22-3.78 2.44-7.51A.42.42 0 0 1 4.82 2a.43.43 0 0 
                                        1 .58 0 .42.42 0 0 1 .11.18l2.44 7.49h8.1l2.44-7.51A.42.42
                                         0 0 1 18.6 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 
                                         7.51L23 13.45a.84.84 0 0 1-.35.94z">
                                    </path>
                                </svg>
                                <span>Role</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('users.index') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Users</span>
                            </div>
                        </a>
                    </li> --}}
                    <!--<li class="menu">-->
                    <!--    <a href="#r" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">-->
                    <!--        <div class="">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
                    <!--                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
                    <!--                stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open">-->
                    <!--                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>-->
                    <!--                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>-->
                    <!--            </svg>-->
                    <!--            <span>Rony</span>-->
                    <!--        </div>-->
                    <!--        <div>-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
                    <!--                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
                    <!--                stroke-linecap="round" stroke-linejoin="round"-->
                    <!--                class="feather feather-chevron-right">-->
                    <!--                <polyline points="9 18 15 12 9 6"></polyline>-->
                    <!--            </svg>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--    <ul class="collapse submenu list-unstyled" id="r" data-bs-parent="#accordionExample">-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('student.create') }}"> New Student </a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('student.create2') }}"> New S 2 test</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('student.index') }}"> Student List</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('file.index') }}">File List</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('examReg.index') }}">Exam Registration List</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('examResult.index') }}">Exam Result List</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('medicalTest.index') }}">Medical Test</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('paymentHistory.index') }}">Payment History</a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                </ul>
            </nav>
        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">
                        <div class="content-wrapper">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper a1">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">{{ date('Y') }}</span> <a
                            target="_blank" href="https://technolabbd.com/"></a>, All rights reserved.
                    </p>
                </div>
                <div class="footer-section f-section-2">
                    {{-- <p class="">Code<svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-heart">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg></p> --}}
                </div>
            </div>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>
    <script src="{{ asset('cork/layouts/vertical-light-menu/app.js') }}"></script>
    <script src="{{ asset('src/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>
