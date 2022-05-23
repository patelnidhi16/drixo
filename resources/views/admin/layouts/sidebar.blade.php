<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
    <span class="iconify" data-icon="carbon:user-avatar-filled" style="color: #5369f8;" data-width="40"></span>

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{Auth::guard('admin')->user()->email}}</h6>
            <span class="pro-user-desc">Administrator</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <!-- <a href="pages-profile.html" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a> -->
                              <a href="{{route('admin.change')}}" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Change Password</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.adminuser')}}">
                        <i data-feather="home"></i>
                        <span> Admin User </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.displaysubject')}}">
                    <span class="iconify" data-icon="bx:list-ul"></span>
                        <span> Subject </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.permission')}}">
                    <span class="iconify" data-icon="bx:list-ul"></span>
                        <span> Role Permission </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.student')}}">

                    <span class="iconify" data-icon="bxs:user-plus"></span>
                        <span> Student </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.assigntest')}}">
                    <span class="iconify" data-icon="ic:outline-assignment-turned-in" data-width="100"></span>
                        <span> Assign Test </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.assigntest_list')}}">
                    <span class="iconify" data-icon="clarity:assign-user-solid" data-width="100"></span>
                        <span>  Assign Test Student </span>
                        <!-- display student table -->
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.result')}}">
                    <span class="iconify" data-icon="codicon:output"></span>
                        <span>Display Result </span>
                        <!-- display student table but status = 0 -->
                    </a>
                </li>
                <!-- <li>
                    <a href="">
                        <i data-feather="calendar"></i>
                        <span> Return Result </span>
                        display student table but status = 0
                    </a>
                </li> -->
                <li>
                    <a href="{{route('admin.attempt_test')}}">
                    <span class="iconify" data-icon="ant-design:file-done-outlined"></span>
                        <span> Attemt Test </span>
                        <!-- display student table but status = 0 -->
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.notattempt_test')}}">

                    <span class="iconify" data-icon="mdi:book-cancel-outline" data-width="100"></span>
                        <span> Not attemt Test </span>
                        <!-- display student table but status = 1 -->
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <i data-feather="calendar"></i>
                        <span> Questions </span>
                    </a>
                </li> -->

        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
</body>