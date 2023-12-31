@php $agent = new Jenssegers\Agent\Agent(); @endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('Title', 'E<>W')</title>

    <!-- Styles -->
    @yield('styles')
	
	<!-- Scripts -->
	@yield('scripts')
</head>
<body>
    <div id="app">
		<nav style="position:absolute; background:transparent;">
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<div class="side-nav" id="mobile-demo">
					<div class="">
						<img src="/images/E2W_header.png" class="responsive-img" />
					</div>
					<div class="">
						<ul class="">
							<li><a href="/">Upcoming Trips</a></li>
							<li><a href="/past">Past Trips</a></li>
							<li><a href="/pictures">Photos</a></li>
							<li><a href="/about_us">About Us</a></li>
							<li><a href="/contact_us">Contact Us</a></li>
							<li><a href="/suggestions">Suggestions</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
        @yield('content')
    </div>
</body>
</html>
