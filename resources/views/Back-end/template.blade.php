<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{asset('admin/images/favicon.ico')}}">

	<title>Admin | @yield('title')</title>

	<link rel="stylesheet" href="{{asset('admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/font-icons/entypo/css/entypo.css')}}">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="{{asset('admin/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/neon-core.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/neon-theme.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/neon-forms.css')}}">
	<link rel="stylesheet" href="{{asset('admin/js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{asset('admin/js/select2/select2.css') }}">

	<script src="{{asset('admin/js/jquery-1.11.3.min.js')}}"></script>
</head>
<body class="page-body  page-fade" data-url="#">
	<div class="page-container">
		<div class="sidebar-menu">
			<div class="sidebar-menu-inner">
				<header class="logo-env">
					@include('Back-end.includes.logo')
				</header>
				@include('Back-end.includes.navigasi')
			</div>
		</div>
		
		<div class="main-content">
			@include('Back-end.includes.head_navigation')
			@yield('main')
			@include('Back-end.includes.footer')
		</div>
	</div>
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{asset('admin/js/jvectormap/jquery-jvectormap-1.2.2.css')}}">
	<link rel="stylesheet" href="{{asset('admin/js/rickshaw/rickshaw.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/font-icons/font-awesome/css/font-awesome.min.css')}}">
	<script src="{{asset('admin/js/select2/select2.min.js') }}"></script>

	<!-- Bottom scripts (common) -->
	<script src="{{asset('admin/js/gsap/TweenMax.min.js')}}"></script>
	<script src="{{asset('admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}"></script>
	<script src="{{asset('admin/js/bootstrap.js')}}"></script>
	<script src="{{asset('admin/js/joinable.js')}}"></script>
	<script src="{{asset('admin/js/resizeable.js')}}"></script>
	<script src="{{asset('admin/js/neon-api.js')}}"></script>
	<script src="{{asset('admin/js/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>


	<!-- Imported scripts on this page -->
	<script src="{{asset('admin/js/jvectormap/jquery-jvectormap-europe-merc-en.js')}}"></script>
	<script src="{{asset('admin/js/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('admin/js/rickshaw/vendor/d3.v3.js')}}"></script>
	<script src="{{asset('admin/js/rickshaw/rickshaw.min.js')}}"></script>
	<script src="{{asset('admin/js/raphael-min.js')}}"></script>
	<script src="{{asset('admin/js/morris.min.js')}}"></script>
	<script src="{{asset('admin/js/toastr.js')}}"></script>
	<script src="{{asset('admin/js/neon-chat.js')}}"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{asset('admin/js/neon-custom.js')}}"></script>


	<!-- Demo Settings -->
	<script src="{{asset('admin/js/neon-demo.js')}}"></script>
	@yield('scripts')
</body>
</html>