<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title custom-color">Navigation</li>

                <li>
                    <a href="{{url('home')}}">
                        <i class="fe-airplay"></i>
                        <!-- <span class="badge badge-success badge-pill float-right">4</span> -->
                        <span> Dashboards </span>
                    </a>
                </li>

                {{--  <li>
                    <a href="{{url('returns?page=1')}}" id="returnr-fetch-api">
                        <i class="fe-bar-chart-2"></i>
                        <!-- <span class="badge badge-success badge-pill float-right">4</span> -->
                        <span> Returns </span>
                    </a>
                </li>  --}}

            @if(Auth::user()->user_role == 'N')

{{--
            <li>
                <a href="{{url('returns')}}">
                    <i class="fe-bar-chart-2"></i>
                    <!-- <span class="badge badge-success badge-pill float-right">4</span> -->
                    <span> Returns </span>
                </a>
            </li>  --}}

            <li>
                <a href="{{url('uploaded-returns')}}">
                    <i class="fe-upload"></i>
                    <!-- <span class="badge badge-success badge-pill float-right">4</span> -->
                    <span>  Uploaded Returns </span>
                </a>
            </li>


            @else




            <li>
                <a href="javascript: void(0);">
                    <i class="fe-upload"></i>
                    <span> Approvals </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{url('pending-uploaded-returns')}}" class="text-warning">Pending</a>
                    </li>
                    <li>
                        <a href="{{url('approve-cheque-list')}}" class="text-success">Approved</a>
                    </li>
                    <li>
                        <a href="{{url('reject-cheque-list')}}" class="text-danger">Rejected</a>
                    </li>

                </ul>
            </li>

            {{--  <li>
                <a href="javascript: void(0);">
                    <i class="fe-upload"></i>
                    <span> Users </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{url('add_user')}}" class="text-warning">New User</a>
                    </li>
                    <li>
                        <a href="{{url('view_users')}}" class="text-success">View Users</a>
                    </li>


                </ul>
            </li>  --}}





            @endif


                <li>
                    <a href="{{url('logout')}}">
                        <i class="fe-log-out"></i>
                        <!-- <span class="badge badge-success badge-pill float-right">4</span> -->
                        <span> Logout </span>
                    </a>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
