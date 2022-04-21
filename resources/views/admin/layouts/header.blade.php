<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"> eLEARNING</i></h2>
                        </span>
                        <span class="logo-sm">
                        <i class="fa fa-book me-3"></i>
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

                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0 mr-5" >
<li>
<div class="media user-profile mt-2 mb-2" style="margin-right: -85px;">
    <span class="iconify" data-icon="carbon:user-avatar-filled" style="color: #5369f8;" data-width="40"></span>

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{Auth::guard('admin')->user()->email}}</h6>
            <span class="pro-user-desc">Administrator</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu" >
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown mt-2" style="margin-left: -170px;">
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
</li>

                    </ul>
                </div>

            </div>