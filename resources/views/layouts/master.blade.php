<!DOCTYPE html>
<html lang="en">

	<head>
        <meta charset="utf-8" />
        <title>ROKEL CHEQUE PORTAL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->



        @include('snippets.style')
        <style type="text/css">

			 .navbar-custom {
		    	background-color: #0298b2!important;
		    	color: #02b239!important;
            }
            .custom-color{
                color: #0298b2!important;
            }
            .custom-bg-color{
                 background-color: #0298b2!important;
            }
        </style>
		@yield('styles')

    </head>
    <body >

    	<!-- Begin page -->
        <div id="wrapper">
            @include('snippets.nav')
        	@include('snippets.side-bar')
        	 <div class="content-page">
                <div class="content">
                	@yield('content')
                </div>
            </div>
        </div>
        @include('snippets.script')
		@yield('scripts')
         @include('sweetalert::alert')
    </body>

    {{-- Sweet Alert js --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
