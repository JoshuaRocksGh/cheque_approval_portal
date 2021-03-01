<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/ubold/layouts/light/pages-login.html by HTTrack Website Copier/3.x [XR&CO2014], Mon, 04 Mar 2019 09:53:38 GMT -->
<head>
        <meta charset="utf-8" />
        <title>{{ env('app_name', 'NDK') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

        <style type="text/css">
            .header{
                line-height: 25px;
                margin-bottom: 16px;
                padding-bottom: 4px;
                border-bottom: 1px solid #CCC;
                color: #0298b2!important;
                text-align: center
                }
            .custom-color{
               color: #0298b2!important;
            }
            .custom-bg-color{
                background-color: #0298b2!important;
            }
        </style>

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="">
            <div class="container">
               <!--  <div class="row"> -->
                    <!-- <div class="col-md-8 col-lg-6 col-xl-7" style="padding-left: 0px">
                        <img class="img-fluid" src="{{asset('assets/images/meeting.jpg')}}">
                    </div> -->
                   <!--  <div class="col-md-4 col-lg-4 col-xl-4 card" style="display: inline-block;position: fixed;top: 0;bottom: 0;left: 0;right: 0;width: auto;height: 390px;margin: auto;background-color: #ffffffd1"> -->

                              @yield('content')

                        <!-- end card -->

                    <!-- </div> end col -->
              <!--   </div> -->
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt " >
              <a href="#" ><strong> <h4 style="color: #98865bcc">  Joshua Tetteh &copy; {{date('Y')}}</h4> </strong> </a>
        </footer>

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/light/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 09:53:38 GMT -->
</html>
