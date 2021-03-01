<!DOCTYPE html>
<html>
@include('snippets.style')
<style type="text/css">
	.navbar-custom {
    background-color: #e82b34!important;
	}
</style>
@yield('styles')

<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Pages - Admin Dashboard UI Kit - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<script src="../../../../cdn-cgi/apps/head/QJpHOqznaMvNOv9CGoAdo_yvYKU.js"></script><link rel="apple-touch-icon" href="{{asset('pages/ico/60.png">

</head>
	<body class="fixed-header horizontal-menu horizontal-app-menu dashboard">
		@include('snippets.nav')

		<div class="page-container ">
			<div class="page-content-wrapper ">
				<div class="content sm-gutter">
					@yield('content')
				</div>
				@include('snippets.footer')
			</div>
		</div>
		@include('snippets.script')
		@yield('scripts')
	</body>

</html>