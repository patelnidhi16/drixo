@extends('admin.layouts.master')
@section('content')
<div id="wrapper">

<!-- Topbar Start -->
<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo.png')}}" alt="" height="24" />
                <span class="d-inline h5 ml-1 text-logo">Shreyu</span>
            </span>
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo.png')}}" alt="" height="24">
            </span>
        </a>

        <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
            <li class="">
                <button class="button-menu-mobile open-left disable-btn">
                    <i data-feather="menu" class="menu-icon"></i>
                    <i data-feather="x" class="close-icon"></i>
                </button>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
            <li class="d-none d-sm-block">
                <div class="app-search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span data-feather="search"></span>
                        </div>
                    </form>
                </div>
            </li>

            <li class="dropdown d-none d-lg-block" data-toggle="tooltip" data-placement="left" title="Change language">
                <a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i data-feather="globe"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/germany.jpg')}}" alt="user-image" class="mr-2" height="12"> <span
                            class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/italy.jpg')}}" alt="user-image" class="mr-2" height="12"> <span
                            class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/spain.jpg')}}" alt="user-image" class="mr-2" height="12"> <span
                            class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/russia.jpg')}}" alt="user-image" class="mr-2" height="12"> <span
                            class="align-middle">Russian</span>
                    </a>
                </div>
            </li>


            <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left"
                title="8 new unread notifications">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                    aria-expanded="false">
                    <i data-feather="bell"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title border-bottom">
                        <h5 class="m-0 font-size-16">
                            <span class="float-right">
                                <a href="#" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                            <div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div>
                            <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                            <div class="notify-icon">
                                <img src="{{asset('assets/images/users/avatar-1.jpg')}}" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                            <div class="notify-icon">
                                <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom active">
                            <div class="notify-icon bg-success"><i class="uil uil-comment-message"></i> </div>
                            <p class="notify-details">Jaclyn Brunswick commented on Dashboard<small class="text-muted">1
                                    min
                                    ago</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                            <div class="notify-icon bg-danger"><i class="uil uil-comment-message"></i></div>
                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days
                                    ago</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="uil uil-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);"
                        class="dropdown-item text-center text-primary notify-item notify-all border-top">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="Settings">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                    <i data-feather="settings"></i>
                </a>
            </li>

            <li class="dropdown notification-list align-self-center profile-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <div class="media user-profile ">
                        <img src="{{asset('assets/images/users/avatar-7.jpg')}}" alt="user-image" class="rounded-circle align-self-center" />
                        <div class="media-body text-left">
                            <h6 class="pro-user-name ml-2 my-0">
                                <span>Shreyu N</span>
                                <span class="pro-user-desc text-muted d-block mt-1">Administrator </span>
                            </h6>
                        </div>
                        <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                    </div>
                </a>
                <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
                    <a href="pages-profile.html" class="dropdown-item notify-item">
                        <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                        <span>My Account</span>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                        <span>Settings</span>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                        <span>Support</span>
                    </a>

                    <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                        <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                        <span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>

</div>
<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="{{asset('assets/images/users/avatar-7.jpg')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{asset('assets/images/users/avatar-7.jpg')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">Nik Patel</h6>
            <span class="pro-user-desc">Administrator</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="pages-profile.html" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                    <span>Settings</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                    <span>Support</span>
                </a>

                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="index.html">
                        <i data-feather="home"></i>
                        <span class="badge badge-success float-right">1</span>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">Apps</li>
                <li>
                    <a href="apps-calendar.html">
                        <i data-feather="calendar"></i>
                        <span> Calendar </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="inbox"></i>
                        <span> Email </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="email-inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="email-read.html">Read</a>
                        </li>
                        <li>
                            <a href="email-compose.html">Compose</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="briefcase"></i>
                        <span> Projects </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="project-list.html">List</a>
                        </li>
                        <li>
                            <a href="project-detail.html">Detail</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="bookmark"></i>
                        <span> Tasks </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="task-list.html">List</a>
                        </li>
                        <li>
                            <a href="task-board.html">Kanban Board</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">Custom</li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="file-text"></i>
                        <span> Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="pages-starter.html">Starter</a>
                        </li>
                        <li>
                            <a href="pages-profile.html">Profile</a>
                        </li>
                        <li>
                            <a href="pages-activity.html">Activity</a>
                        </li>
                        <li>
                            <a href="pages-invoice.html">Invoice</a>
                        </li>
                        <li>
                            <a href="pages-pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="pages-maintenance.html">Maintenance</a>
                        </li>
                        <li>
                            <a href="pages-login.html">Login</a>
                        </li>
                        <li>
                            <a href="pages-register.html">Register</a>
                        </li>
                        <li>
                            <a href="pages-recoverpw.html">Recover Password</a>
                        </li>
                        <li>
                            <a href="pages-confirm-mail.html">Confirm</a>
                        </li>
                        <li>
                            <a href="pages-404.html">Error 404</a>
                        </li>
                        <li>
                            <a href="pages-500.html">Error 500</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="layout"></i>
                        <span> Layouts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="layouts-horizontal.html">Horizontal Nav</a>
                        </li>
                        <li>
                            <a href="layouts-rtl.html">RTL</a>
                        </li>
                        <li>
                            <a href="layouts-dark.html">Dark</a>
                        </li>
                        <li>
                            <a href="layouts-scrollable.html">Scrollable</a>
                        </li>
                        <li>
                            <a href="layouts-boxed.html">Boxed</a>
                        </li>
                        <li>
                            <a href="layouts-preloader.html">With Pre-loader</a>
                        </li>
                        <li>
                            <a href="layouts-dark-sidebar.html">Dark Side Nav</a>
                        </li>
                        <li>
                            <a href="layouts-condensed.html">Condensed Nav</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="package"></i>
                        <span> UI Elements </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="components-bootstrap.html">Bootstrap UI</a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false">Icons
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-third-level" aria-expanded="false">
                                <li>
                                    <a href="icons-feather.html">Feather Icons</a>
                                </li>
                                <li>
                                    <a href="icons-unicons.html">Unicons Icons</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="widgets.html">Widgets</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" aria-expanded="false">
                        <i data-feather="file-text"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="forms-basic.html">Basic Elements</a>
                        </li>
                        <li>
                            <a href="forms-advanced.html">Advanced</a>
                        </li>
                        <li>
                            <a href="forms-validation.html">Validation</a>
                        </li>
                        <li>
                            <a href="forms-wizard.html">Wizard</a>
                        </li>
                        <li>
                            <a href="forms-editor.html">Editor</a>
                        </li>
                        <li>
                            <a href="forms-file-uploads.html">File Uploads</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="charts-apex.html" aria-expanded="false">
                        <i data-feather="pie-chart"></i>
                        <span> Charts </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" aria-expanded="false">
                        <i data-feather="grid"></i>
                        <span> Tables </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="tables-basic.html">Basic</a>
                        </li>
                        <li>
                            <a href="tables-datatables.html">Advanced</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row page-title">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="float-right mt-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Shreyu</a></li>
                            <li class="breadcrumb-item"><a href="#">Apps</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Calendar</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1 mt-0">Calendar</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-xl-2 col-lg-3 col-6">
                                    <img src="{{asset('assets/images/cal.png')}}" class="mr-4 align-self-center img-fluid "
                                    alt="cal" />
                                </div>
                                <div class="col-xl-10 col-lg-9">
                                    <div class="mt-4 mt-lg-0">
                                        <h5 class="mt-0 mb-1 font-weight-bold">Welcome to Your Calendar</h5>
                                        <p class="text-muted mb-2">The calendar shows the events synced from all
                                            your linked calendars.
                                            Click on event to see or edit the details. You can create new event by
                                            clicking on "Create New event" button or any cell available
                                            in calendar below.</p>

                                        <button class="btn btn-primary mt-2 mr-1" id="btn-new-event"><i
                                                class="uil-plus-circle"></i> Create New Event</button>
                                        <button class="btn btn-white mt-2"><i class="uil-sync"></i> Link
                                            Calendars</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div>
                <!-- end col-12 -->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div>
                <!-- end col-12 -->
            </div> <!-- end row -->

            <!-- modals -->
            <!-- Add New Event MODAL -->
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                            <h5 class="modal-title" id="modal-title">Event</h5>
                        </div>
                        <div class="modal-body p-4">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label">Event Name</label>
                                            <input class="form-control" placeholder="Insert Event Name"
                                                type="text" name="title" id="event-title" required />
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <select class="form-control custom-select" name="category"
                                                id="event-category" required>
                                                <option value="bg-danger" selected>Danger</option>
                                                <option value="bg-success">Success</option>
                                                <option value="bg-primary">Primary</option>
                                                <option value="bg-info">Info</option>
                                                <option value="bg-dark">Dark</option>
                                                <option value="bg-warning">Warning</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a valid event category</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-light mr-1" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end modal-content-->
                </div> <!-- end modal dialog-->
            </div>
            <!-- end modal-->
        </div> <!-- container-fluid -->

    </div> <!-- content -->

    

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    2019 &copy; Shreyu. All Rights Reserved. Crafted with <i class='uil uil-heart text-danger font-size-12'></i> by <a href="https://coderthemes.com/" target="_blank">Coderthemes</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
<div class="rightbar-title">
    <a href="javascript:void(0);" class="right-bar-toggle float-right">
        <i data-feather="x-circle"></i>
    </a>
    <h5 class="m-0">Customization</h5>
</div>

<div class="slimscroll-menu">

    <h5 class="font-size-16 pl-3 mt-4">Choose Variation</h5>
    <div class="p-3">
        <h6>Default</h6>
        <a href="index.html"><img src="{{('assets/images/layouts/vertical.jpg')}}" alt="vertical" class="img-thumbnail demo-img" /></a>
    </div>
    <div class="px-3 py-1">
        <h6>Top Nav</h6>
        <a href="layouts-horizontal.html"><img src="{{('assets/images/layouts/horizontal.jpg')}}" alt="horizontal" class="img-thumbnail demo-img" /></a>
    </div>
    <div class="px-3 py-1">
        <h6>Dark Side Nav</h6>
        <a href="layouts-dark-sidebar.html"><img src="{{('assets/images/layouts/vertical-dark-sidebar.jpg')}}" alt="dark sidenav" class="img-thumbnail demo-img" /></a>
    </div>
    <div class="px-3 py-1">
        <h6>Condensed Side Nav</h6>
        <a href="layouts-dark-sidebar.html"><img src="{{('assets/images/layouts/vertical-condensed.jp')}}g" alt="condensed" class="img-thumbnail demo-img" /></a>
    </div>
    <div class="px-3 py-1">
        <h6>Fixed Width (Boxed)</h6>
        <a href="layouts-boxed.html"><img src="{{('assets/images/layouts/boxed.jpg')}}" alt="boxed"
                class="img-thumbnail demo-img" /></a>
    </div>
</div> <!-- end slimscroll-menu-->
</div>
@endsection
@push('script')
<script src="{{('assets/js/vendor.min.js')}}"></script>

<!-- plugin js -->
<script src="{{('assets/libs/moment/moment.min.js')}}"></script>
<script src="assets/libs/fullcalendar-core/main.min.js"></script>
<script src="{{('assets/libs/fullcalendar-bootstrap/main.min.js')}}"></script>
<script src="{{('assets/libs/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{('assets/libs/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{('assets/libs/fullcalendar-list/main.min.js')}}"></script>
<script src="{{('assets/libs/fullcalendar-interaction/main.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>

<!-- Calendar init -->
<script src="{{asset('assets/js/pages/calendar.init.js')}}"></script>
<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

<!-- Plugin css -->
<link href="{{asset('assets/libs/fullcalendar-core/main.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/fullcalendar-daygrid/main.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/fullcalendar-bootstrap/main.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/fullcalendar-timegrid/main.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/fullcalendar-list/main.min.css')}}" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
@endpush