<!--Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/user-1.png') }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                           <b>{{ Auth::user()->name }} ({{ Auth::user()->email }})</b> &nbsp; <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="{{url('logout')}}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{url('/')}}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logoo.png') }}" alt="" height="40">

                    </span>

                </a>
            </div>

            <div class="logo-lg-text-light topnav-menu topnav-menu-left m-0  text-white" style="color:white !important;padding-top: 10px;">
                {{-- <h3 style="color: white">USG MONITOR LOGS</h3> --}}
            </div>

            <!-- <ul class="list-unstyled topnav-menu topnav-menu-left m-0">

                <li class="dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        Create New
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">

                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-briefcase mr-1"></i>
                            <span>New Projects</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-user mr-1"></i>
                            <span>Create Users</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-bar-chart-line- mr-1"></i>
                            <span>Revenue Report</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-settings mr-1"></i>
                            <span>Settings</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-headphones mr-1"></i>
                            <span>Help & Support</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown dropdown-mega d-none d-lg-block">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        Mega Menu
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-megamenu">
                        <div class="row">
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="text-dark mt-0">UI Components</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);">Widgets</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Nestable List</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Range Sliders</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Masonry Items</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Sweet Alerts</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Treeview Page</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Tour Page</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="text-dark mt-0">Applications</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);">eCommerce Pages</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">CRM Pages</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Email</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Calendar</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Team Contacts</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Task Board</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Email Templates</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="text-dark mt-0">Extra Pages</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);">Left Sidebar with User</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Menu Collapsed</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Small Left Sidebar</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">New Header Style</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Search Result</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Gallery Pages</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Maintenance & Coming Soon</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center mt-3">
                                    <h3 class="text-dark">Special Discount Sale!</h3>
                                    <h4>Save up to 70% off.</h4>
                                    <button class="btn btn-primary btn-rounded mt-3">Download Now</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
            </ul> -->
        </div>
        <!-- end Topbar
