<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title> @yield('title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/colors/main.css') }}" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

		@include('layouts.partials.header')
		
		<!-- Dashboard -->
		<div id="dashboard">
		
		<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
	
				<div class="dashboard-nav">
					@include('layouts.partials.menu')				
				</div>
				
				<div class="dashboard-content">		
				 	@yield('content')
				</div>
		</div>
		<!-- Dashboard / End -->
</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ asset('front/scripts/jquery-2.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/scripts/dropzone.js') }}"></script>
<script src="{{ asset('front/scripts/switcher.js') }}"></script>

</body>
</html>