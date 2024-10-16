<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, ample admin admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Admin Pro is powerful and clean admin dashboard template" />
    <meta name="robots" content="noindex,nofollow" />
    <title>RAINBOW VISA SERVICE</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ampleadmin/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ URL::asset('assets/images/logos/rainbow_logo.png') }}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/daterangepicker/daterangepicker.css') }}" />
    <link href="{{ URL::asset('dist/css/style.min.css') }}" rel="stylesheet" />

    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/extra-libs/prism/prism.css') }}" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- -------------------------------------------------------------- -->
    <script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        .reset-this {
            all: initial;
            padding: 5px;
             font-family: inherit;
             color: #3e5569;
        }

        .redo-fieldset {
            border: 1px solid rgb(146, 146, 146);
            padding: 15px;
            border-radius: 5px;
            font-family: inherit;
        }

        .form-group label {
            font-weight: bold;
            font-size: 14px;

            /* color: #333; */
        }

        .form-group input {
            border: 0.5px solid #0000001f;
            /* background-color: #f9f9f9; */
            padding: 5px;
            border-radius: 3px;
            font-size: 14px;
            color: #555555;
            /* box-shadow: 0 2px 2px rgba(92, 92, 92, 0.1); */
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus,  .form-group textarea:focus, .select:focus {
            border: 2px solid #007bff;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
            outline: none;
        }
    </style>


</head>


<body>

    <!-- -------------------------------------------------------------- -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- -------------------------------------------------------------- -->
    <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
                stroke="#20222a" stroke-width="2"></path>
            <path
                d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
                stroke="#20222a" stroke-width="2"></path>
            <path id="teabag" fill="#20222a" fill-rule="evenodd" clip-rule="evenodd"
                d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z">
            </path>
            <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" stroke="#20222a"></path>
            <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#20222a"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- -------------------------------------------------------------- -->
    <div id="main-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- -------------------------------------------------------------- -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header border-end">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon text-center">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ URL::asset('assets/images/logos/rainbow_logo.png') }}" alt="homepage"
                                class="dark-logo" style="width: 50px" />
                            <!-- Light Logo icon -->
                            <img src="{{ URL::asset('assets/images/logos/rainbow_logo.png') }}" alt="homepage"
                                class="light-logo" />
                            {{-- <h4><b>ACCOUNT | APP</b></h4> --}}
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            {{-- <img src="../../assets/images/logos/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../../assets/images/logos/logo-light-text.png" class="light-logo"
                                alt="homepage" /> --}}
                            <b> VISA SERVICE</b>
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        {{-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu fs-5"></i></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fs-5 mdi mdi-gmail"></i>
                                <div class="notify">
                                    <span class="heartbit"></span>
                                    <span class="point"></span>
                                </div>
                            </a>
                            <div class="
                    dropdown-menu
                    mailbox
                    dropdown-menu-start dropdown-menu-animate-up
                  "
                                aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="border-bottom rounded-top py-3 px-4">
                                            <div class="mb-0 font-weight-medium fs-4">
                                                You have 4 new messages
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center message-body position-relative"
                                            style="height: 230px">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/1.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle online"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                        Pavan kumar
                                                    </h5>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                              ">Just
                                                        see the my admin!</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:30
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/2.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle busy"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                        Sonu Nigam
                                                    </h5>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                              ">I've
                                                        sung a song! See you at</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:10
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/3.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle away"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                        Arijit Sinh
                                                    </h5>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                              ">I
                                                        am a singer!</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/4.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle offline"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                        Pavan kumar
                                                    </h5>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                              ">Just
                                                        see the my admin!</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:02
                                                        AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link border-top text-center text-dark pt-3"
                                            href="javascript:void(0);">
                                            <b>See all e-Mails</b> <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-check-circle fs-5"></i>
                                <div class="notify">
                                    <span class="heartbit"></span>
                                    <span class="point"></span>
                                </div>
                            </a>
                            <div
                                class="
                    dropdown-menu dropdown-menu-start
                    mailbox
                    dropdown-menu-animate-up
                  ">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="border-bottom rounded-top py-3 px-4">
                                            <div class="mb-0 font-weight-medium fs-4">
                                                Notifications
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center notifications position-relative"
                                            style="height: 230px">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          ">
                                                <span class="btn btn-light-danger text-danger btn-circle">
                                                    <i data-feather="link" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                        Luanch Admin
                                                    </h5>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                text-muted
                                mt-1
                              ">Just
                                                        see the my new admin!</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:30
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          ">
                                                <span
                                                    class="
                              btn btn-light-success
                              text-success
                              btn-circle
                            ">
                                                    <i data-feather="calendar" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                        Event today
                                                    </h5>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                text-muted
                                mt-1
                              ">Just
                                                        a reminder that you have event</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:10
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          ">
                                                <span class="btn btn-light-info text-info btn-circle">
                                                    <i data-feather="settings" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                        Settings
                                                    </h5>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                text-muted
                                mt-1
                              ">You
                                                        can customize this template as you want</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          ">
                                                <span
                                                    class="
                              btn btn-light-primary
                              text-primary
                              btn-circle
                            ">
                                                    <i data-feather="users" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                        Pavan kumar
                                                    </h5>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                text-muted
                                mt-1
                              ">Just
                                                        see the my admin!</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:02
                                                        AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link border-top text-center text-dark pt-3"
                                            href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item dropdown mega-dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-md-block">Mega <i class="icon-options-vertical"></i></span>
                                <span class="d-block d-md-none"><i class="mdi mdi-dialpad font-24"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animate-up">
                                <div class="mega-dropdown-menu row">
                                    <div class="col-lg-3 col-xl-2 mb-4">
                                        <h4 class="mb-3">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide carousel-dark"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid"
                                                        src="../../assets/images/big/img1.jpg" alt="First slide" />
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid"
                                                        src="../../assets/images/big/img2.jpg" alt="Second slide" />
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid"
                                                        src="../../assets/images/big/img3.jpg" alt="Third slide" />
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls"
                                                role="button" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls"
                                                role="button" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <h4 class="mb-3">ACCORDION</h4>
                                        <!-- Accordian -->
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        Accordion Item #1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingOne"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod
                                                        high life accusamus terry richardson ad squid.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Accordion Item #2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod
                                                        high life accusamus terry richardson ad squid.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                                        aria-controls="flush-collapseThree">
                                                        Accordion Item #3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingThree"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod
                                                        high life accusamus terry richardson ad squid.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <h4 class="mb-3">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="mb-3 form-floating">
                                                <input type="text" class="form-control" id="exampleInputname1"
                                                    placeholder="Enter Name" />
                                                <label>Enter Name</label>
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <input type="email" class="form-control"
                                                    placeholder="Enter email" />
                                                <label>Enter Email address</label>
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                <label>Enter Message</label>
                                            </div>
                                            <button type="submit" class="btn px-4 rounded-pill btn-info">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-lg-3 col-xlg-4 mb-4">
                                        <h4 class="mb-3">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li>
                                                <a href="#" class="font-weight-medium"><i
                                                        data-feather="check-circle"
                                                        class="feather-sm text-success me-2"></i>
                                                    You can give link</a>
                                            </li>
                                            <li>
                                                <a href="#" class="font-weight-medium"><i
                                                        data-feather="check-circle"
                                                        class="feather-sm text-success me-2"></i>
                                                    Give link</a>
                                            </li>
                                            <li>
                                                <a href="#" class="font-weight-medium"><i
                                                        data-feather="check-circle"
                                                        class="feather-sm text-success me-2"></i>
                                                    Another Give link</a>
                                            </li>
                                            <li>
                                                <a href="#" class="font-weight-medium"><i
                                                        data-feather="check-circle"
                                                        class="feather-sm text-success me-2"></i>
                                                    Forth link</a>
                                            </li>
                                            <li>
                                                <a href="#" class="font-weight-medium"><i
                                                        data-feather="check-circle"
                                                        class="feather-sm text-success me-2"></i>
                                                    Another fifth link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item search-box">
                            <form class="app-search d-none d-lg-block">
                                <input type="text" class="form-control" placeholder="Search..." />
                                <a href="" class="active"><i class="fa fa-search"></i></a>
                            </form>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ URL::asset('assets/images/users/1.jpg') }}" alt="user"
                                    class="rounded-circle" width="36" />
                                <span class="ms-2 font-weight-medium">{{ Auth::user()->name }}</span><span
                                    class="fas fa-angle-down ms-2"></span>
                            </a>
                            <div
                                class="
                    dropdown-menu dropdown-menu-end
                    user-dd
                    animated
                    flipInY
                  ">
                                <div
                                    class="
                      d-flex
                      no-block
                      align-items-center
                      p-3
                      bg-info
                      text-white
                      mb-2
                    ">
                                    <div class="">
                                        <img src="{{ URL::asset('assets/images/users/1.jpg') }}" alt="user"
                                            class="rounded-circle" width="60" />
                                    </div>
                                    <div class="ms-2">
                                        <h4 class="mb-0 text-white">{{ Auth::user()->name }}</h4>
                                        <p class="mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>


                                {{-- <a class="dropdown-item" href="#"><i data-feather="user"
                                        class="feather-sm text-info me-1 ms-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="#"><i data-feather="credit-card"
                                        class="feather-sm text-info me-1 ms-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="#"><i data-feather="mail"
                                        class="feather-sm text-success me-1 ms-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="settings"
                                        class="feather-sm text-warning me-1 ms-1"></i>
                                    Account Setting</a> --}}
                                <div class="dropdown-divider"></div>


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>
                                    ออกจากระบบ
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>

                                <div class="dropdown-divider"></div>
                                {{-- <div class="ps-4 p-2">
                                    <a href="#" class="btn d-block w-100 btn-info rounded-pill">View Profile</a>
                                </div> --}}
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">

            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">เมนูหลัก</span>
                        </li>
                       
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-av-timer"></i><span class="hide-menu">Home
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                            </ul>
                        </li>
                    

                      
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-av-timer"></i><span
                                    class="hide-menu">Customers
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item">
                                    <a href="{{ route('customer.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-comment-processing-outline"></i>
                                        <span class="hide-menu"> Customers </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if (Auth::user()->isAdmin !== 'Loyal')
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-cart-outline"></i><span
                                    class="hide-menu">Jobs </span></a>
                            <ul aria-expanded="false" class="collapse first-level">


                                <li class="sidebar-item">
                                    <a href="{{ route('joborder.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu"> Job Order </span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                      


                     

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span
                                    class="hide-menu">รายงาน</span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                            </ul>
                        </li>

                        {{-- @if (Auth::user()->isAdmin === 'isAdmin') --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-buffer"></i><span class="hide-menu">Category
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item">
                                    <a href="{{ route('wallet.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-cash-usd"></i>
                                        <span class="hide-menu"> Wallet </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="{{ route('jobtrasaction.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-credit-card"></i>
                                        <span class="hide-menu"> Transactions </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="{{ route('visaType.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-credit-card"></i>
                                        <span class="hide-menu"> Visa Type </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="{{ route('jobdetail.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-credit-card"></i>
                                        <span class="hide-menu">Job Detail</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- @endif --}}

                        

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-settings"></i><span
                                    class="hide-menu">ตั้งค่าระบบ </span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item">
                                    <a href="{{ route('auth.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-comment-processing-outline"></i>
                                        <span class="hide-menu"> ระบบสมาชิก </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @endif

                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- -------------------------------------------------------------- -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- Page wrapper  -->
        <!-- -------------------------------------------------------------- -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->



            <div class="page-breadcrumb border-bottom">


            </div>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- -------------------------------------------------------------- -->
            <!-- Container fluid  -->
            <!-- -------------------------------------------------------------- -->

            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: "error",
                        title: '{{ session('error') }}',
                        showConfirmButton: false,
                        timer: 2000

                    })
                </script>
            @endif
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: "success",
                        title: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 2000
                    });
                </script>
            @endif

            @php
                if (!session()->has('visited')) {
                    session(['visited' => true]);
                } else {
                    session()->forget('success');
                    session()->forget('error');
                }
            @endphp


            @yield('content')


            <!-- -------------------------------------------------------------- -->
            <!-- End PAge Content -->
            <!-- -------------------------------------------------------------- -->
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Container fluid  -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- footer -->
        <!-- -------------------------------------------------------------- -->
        <footer class="footer text-center">
            All Rights Reserved by Anucha Yothanan
        </footer>

        <!-- -------------------------------------------------------------- -->
        <!-- End footer -->
        <!-- -------------------------------------------------------------- -->
    </div>

    <!-- End Page wrapper  -->
    <!-- -------------------------------------------------------------- -->
    </div>

    <!-- -------------------------------------------------------------- -->
    <!-- End Wrapper -->
    <!-- -------------------------------------------------------------- -->
    <!-- -------------------------------------------------------------- -->
    <!-- customizer Panel -->
    <!-- -------------------------------------------------------------- -->
    <aside class="customizer" style="display: none">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home"
                        role="tab" aria-controls="pills-home" aria-selected="true"><i
                            class="mdi mdi-wrench fs-6"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#chat" role="tab"
                        aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply fs-6"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact"
                        role="tab" aria-controls="pills-contact" aria-selected="false"><i
                            class="mdi mdi-star-circle fs-6"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <div class="p-3 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-weight-medium mb-2 mt-2">Layout Settings</h5>
                        <div class="form-check mt-3">
                            <input type="checkbox" name="theme-view" class="form-check-input" id="theme-view" />
                            <label class="form-check-label" for="theme-view">
                                <span>Dark Theme</span>
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" name="sidebar-position" class="form-check-input"
                                id="sidebar-position" />
                            <label class="form-check-label" for="sidebar-position">
                                <span>Fixed Sidebar</span>
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" name="header-position" class="form-check-input"
                                id="header-position" />
                            <label class="form-check-label" for="header-position">
                                <span>Fixed Header</span>
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" name="boxed-layout" class="form-check-input" id="boxed-layout" />
                            <label class="form-check-label" for="boxed-layout">
                                <span>Boxed Layout</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-weight-medium mb-2 mt-2">Logo Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin1"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin2"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin3"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin4"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin5"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-weight-medium mb-2 mt-2">Navbar Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin1"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin2"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin3"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin4"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin5"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-weight-medium mb-2 mt-2">Sidebar Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    id="changeThemeButton" data-sidebarbg="skin1"></a>
                            </li>

                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin2"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin3"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin4"></a>
                            </li>
                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin5"></a>
                            </li>
                            <script>
                                // เมื่อโหลดเว็บไซต์ใหม่
                                window.addEventListener('load', function() {
                                    // หากต้องการให้กดปุ่มโดยอัตโนมัติ สร้างการคลิกโดยใช้ dispatchEvent()
                                    var changeThemeButton = document.getElementById('changeThemeButton');
                                    changeThemeButton.dispatchEvent(new MouseEvent('click'));
                                });

                                // เพิ่ม Event Listener เมื่อคลิกที่ปุ่มเปลี่ยน Theme
                                document.getElementById('changeThemeButton').addEventListener('click', function() {
                                    // คุณสามารถเพิ่มโค้ดที่ต้องการให้ทำงานเมื่อคลิกที่ปุ่มนี้ได้ที่นี่
                                    console.log("Button clicked!");
                                });
                            </script>

                            <li class="theme-item list-inline-item me-1">
                                <a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="mailbox list-style-none mt-3">
                        <li>
                            <div class="message-center chat-scroll position-relative">
                                <a href="javascript:void(0)"
                                    class="
                      message-item
                      d-flex
                      align-items-center
                      border-bottom
                      px-3
                      py-2
                    "
                                    id="chat_user_1" data-user-id="1">
                                    <span class="user-img position-relative d-inline-block">
                                        <img src="{{ URL::asset('assets/images/users/1.jpg') }}" alt="user"
                                            class="rounded-circle w-100" />
                                        <span class="profile-status rounded-circle online"></span>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h5 class="message-title mb-0 mt-1">Pavan kumar</h5>
                                        <span
                                            class="
                          fs-2
                          text-nowrap
                          d-block
                          text-muted text-truncate
                        ">Just
                                            see the my admin!</span>
                                        <span class="fs-2 text-nowrap d-block text-muted">9:30 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)"
                                    class="
                      message-item
                      d-flex
                      align-items-center
                      border-bottom
                      px-3
                      py-2
                    "
                                    id="chat_user_2" data-user-id="2">
                                    <span class="user-img position-relative d-inline-block">
                                        <img src="{{ URL::asset('assets/images/users/2.jpg') }}" alt="user"
                                            class="rounded-circle w-100" />
                                        <span class="profile-status rounded-circle busy"></span>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h5 class="message-title mb-0 mt-1">Sonu Nigam</h5>
                                        <span
                                            class="
                          fs-2
                          text-nowrap
                          d-block
                          text-muted text-truncate
                        ">I've
                                            sung a song! See you at</span>
                                        <span class="fs-2 text-nowrap d-block text-muted">9:10 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)"
                                    class="
                      message-item
                      d-flex
                      align-items-center
                      border-bottom
                      px-3
                      py-2
                    "
                                    id="chat_user_3" data-user-id="3">
                                    <span class="user-img position-relative d-inline-block">
                                        <img src="{{ URL::asset('assets/images/users/3.jpg') }}" alt="user"
                                            class="rounded-circle w-100" />
                                        <span class="profile-status rounded-circle away"></span>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h5 class="message-title mb-0 mt-1">Arijit Sinh</h5>
                                        <span
                                            class="
                          fs-2
                          text-nowrap
                          d-block
                          text-muted text-truncate
                        ">I
                                            am a singer!</span>
                                        <span class="fs-2 text-nowrap d-block text-muted">9:08 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)"
                                    class="
                      message-item
                      d-flex
                      align-items-center
                      border-bottom
                      px-3
                      py-2
                    "
                                    id="chat_user_4" data-user-id="4">
                                    <span class="user-img position-relative d-inline-block">
                                        <img src="{{ URL::asset('assets/images/users/4.jpg') }}" alt="user"
                                            class="rounded-circle w-100" />
                                        <span class="profile-status rounded-circle offline"></span>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h5 class="message-title mb-0 mt-1">Nirav Joshi</h5>
                                        <span
                                            class="
                          fs-2
                          text-nowrap
                          d-block
                          text-muted text-truncate
                        ">Just
                                            see the my admin!</span>
                                        <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)"
                                    class="
                      message-item
                      d-flex
                      align-items-center
                      border-bottom
                      px-3
                      py-2
                    "
                                    id="chat_user_5" data-user-id="5">
                                    <span class="user-img position-relative d-inline-block">
                                        <img src="{{ URL::asset('assets/images/users/5.jpg') }}" alt="user"
                                            class="rounded-circle w-100" />
                                        <span class="profile-status rounded-circle offline"></span>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h5 class="message-title mb-0 mt-1">Sunil Joshi</h5>
                                        <span
                                            class="
                          fs-2
                          text-nowrap
                          d-block
                          text-muted text-truncate
                        ">Just
                                            see the my admin!</span>
                                        <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)"
                                    class="
                      message-item
                      d-flex
                      align-items-center
                      border-bottom
                      px-3
                      py-2
                    "
                                    id="chat_user_6" data-user-id="6">
                                    <span class="user-img position-relative d-inline-block">
                                        <img src="{{ URL::asset('assets/images/users/6.jpg') }}" alt="user"
                                            class="rounded-circle w-100" />
                                        <span class="profile-status rounded-circle offline"></span>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h5 class="message-title mb-0 mt-1">Akshay Kumar</h5>
                                        <span
                                            class="
                          fs-2
                          text-nowrap
                          d-block
                          text-muted text-truncate
                        ">Just
                                            see the my admin!</span>
                                        <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)"
                                    class="
                      message-item
                      d-flex
                      align-items-center
                      border-bottom
                      px-3
                      py-2
                    "
                                    id="chat_user_7" data-user-id="7">
                                    <span class="user-img position-relative d-inline-block">
                                        <img src="{{ URL::asset('assets/images/users/7.jpg') }}" alt="user"
                                            class="rounded-circle w-100" />
                                        <span class="profile-status rounded-circle offline"></span>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h5 class="message-title mb-0 mt-1">Pavan kumar</h5>
                                        <span
                                            class="
                          fs-2
                          text-nowrap
                          d-block
                          text-muted text-truncate
                        ">Just
                                            see the my admin!</span>
                                        <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)"
                                    class="
                      message-item
                      d-flex
                      align-items-center
                      border-bottom
                      px-3
                      py-2
                    "
                                    id="chat_user_8" data-user-id="8">
                                    <span class="user-img position-relative d-inline-block">
                                        <img src="{{ URL::asset('assets/images/users/8.jpg') }}" alt="user"
                                            class="rounded-circle w-100" />
                                        <span class="profile-status rounded-circle offline"></span>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h5 class="message-title mb-0 mt-1">Varun Dhavan</h5>
                                        <span
                                            class="
                          fs-2
                          text-nowrap
                          d-block
                          text-muted text-truncate
                        ">Just
                                            see the my admin!</span>
                                        <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Tab 2 -->
                <!-- Tab 3 -->
                <div class="tab-pane fade p-3" id="pills-contact" role="tabpanel"
                    aria-labelledby="pills-contact-tab">
                    <h6 class="mt-3 mb-3">Activity Timeline</h6>
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-light-success text-success">
                                <i data-feather="user" class="feather-sm fill-white"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-weight-medium">
                                    Meeting today <span class="sl-date"> 5pm</span>
                                </div>
                                <div class="desc">you can write anything</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-light-info text-info">
                                <i data-feather="camera" class="feather-sm fill-white"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-weight-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user"
                                    src="{{ URL::asset('assets/images/users/2.jpg') }}" />
                            </div>
                            <div class="sl-right">
                                <div class="font-weight-medium">
                                    Go to the Doctor <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user"
                                    src="{{ URL::asset('assets/images/users/1.jpg') }}" />
                            </div>
                            <div class="sl-right">
                                <div>
                                    <a href="javascript:void(0)">Stephen</a>
                                    <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-light-primary text-primary">
                                <i data-feather="user" class="feather-sm fill-white"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-weight-medium">
                                    Meeting today <span class="sl-date"> 5pm</span>
                                </div>
                                <div class="desc">you can write anything</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-light-info text-info">
                                <i data-feather="send" class="feather-sm fill-white"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-weight-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user"
                                    src="{{ URL::asset('assets/images/users/4.jpg') }}" />
                            </div>
                            <div class="sl-right">
                                <div class="font-weight-medium">
                                    Go to the Doctor <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user"
                                    src="{{ URL::asset('assets/images/users/6.jpg') }}" />
                            </div>
                            <div class="sl-right">
                                <div>
                                    <a href="javascript:void(0)">Stephen</a>
                                    <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- -------------------------------------------------------------- -->
    <!-- All Jquery -->

    <!-- Bootstrap tether Core JavaScript -->

    <script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ URL::asset('dist/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/app.init.horizontal.js') }}"></script>
    <script src="{{ URL::asset('dist/js/app-style-switcher.horizontal.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ URL::asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ URL::asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ URL::asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ URL::asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/custom.min.js') }}"></script>
    <!-- This Page JS -->
    <script src="{{ URL::asset('assets/extra-libs/prism/prism.js') }}"></script>


    <script src="{{ URL::asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/pages/forms/select2/select2.init.js') }}"></script>

    <script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/jquery.repeater/repeater-init.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/jquery.repeater/dff.js') }}"></script>

    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ URL::asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>


    <script src="{{ URL::asset('assets/libs/moment/moment.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/daterangepicker/daterangepicker.js') }}"></script>









</body>

</html>
