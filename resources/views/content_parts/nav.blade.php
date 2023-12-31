	@if(Auth::check())

		<!--Double navigation-->
		<header>
			<!-- Sidebar navigation -->
			<div id="slide-out" class="side-nav sn-bg-4 fixed adminNav">
				<ul class="custom-scrollbar">
					<!-- Logo -->
					<li>
						<div class="logo-wrapper waves-light">
							<a href="/"><img src="/images/EW-Logo-White.png" class="img-fluid flex-center"></a>
						</div>
					</li>
					<!--/. Logo -->

					<!-- Side navigation links -->
					<li>
						<ul class="collapsible collapsible-accordion">
							<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-plane" aria-hidden="true"></i> Trip Locations<i class="fa fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="{{ route('location.create') }}">Add Trips</a></li>
										<li><a href="{{ route('location.index') }}">Edit Trip Events</a></li>
									</ul>
								</div>
							</li>
							<li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-images"></i></i> Trip Pictures<i class="fa fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="{{ route('pictures.create') }}">Add Pictures</a></li>
										<li><a href="{{ route('pictures.index') }}">Edit Pictures</a></li>
									</ul>
								</div>
							</li>
							<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-users"></i> Contacts<i class="fa fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="{{ route('contacts.create') }}">Add New Contact</a></li>
										<li><a href="{{ route('contacts.index') }}">Edit Contact</a></li>
									</ul>
								</div>
							</li>
							<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user" aria-hidden="true"></i> Users<i class="fa fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="{{ route('admin.create') }}">Add New Admin</a></li>
										<li><a href="{{ route('admin.index') }}">Edit Admin</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="{{ route('settings.index') }}" class="navi_option" {{ $_SERVER["SCRIPT_NAME"] == "/e2w/admin/questions.php" ? "style='font-weight:700; color:#8fba82;'" : "" }} >Settings</a>
							</li>
							<li>
								<a href="{{ route('logout') }}" class="navi_option" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
					<!--/. Side navigation links -->
				</ul>
				<div class="sidenav-bg mask-strong"></div>
			</div>
			<!--/. Sidebar navigation -->

			<!-- Navbar -->
			<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">

				<!-- SideNav slide-out button -->
				<div class="float-left">
					<a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
				</div>

				<!-- Breadcrumb-->
				<div class="breadcrumb-dn mr-auto">
					<p>Administrator</p>
				</div>
			</nav>
			<!-- /.Navbar -->
		</header>
		<!--/.Double navigation-->

	@else

		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar fixed-top">

			<!-- Navbar brand -->
			<a class="navbar-brand" href="/">
				<img src="{{ asset('/images/EW-Logo-White.png') }}" height="30" alt="mdb logo">
			</a>

			<!-- Collapse button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation_example" aria-controls="navigation_example" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Collapsible content -->
			<div class="collapse navbar-collapse" id="navigation_example">

				<!-- Links -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item{{ strlen(request()->getPathInfo()) < 2 ? ' active' : '' }}">
						<a class="nav-link" href="/">Home</a>
					</li>

					<li class="nav-item{{ substr_count(request()->getPathInfo(), 'trips') > 0 ? ' active' : '' }}">
						<a class="nav-link" href="{{ route('web_index') }}">Trips <span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item{{ substr_count(request()->getPathInfo(), 'picture') > 0 || substr_count(request()->getPathInfo(), 'photo') > 0 ? ' active' : '' }}">
						<a class="nav-link" href="/photos">Photos</a>
					</li>

					<li class="nav-item{{ substr_count(request()->getPathInfo(), 'contact_us') > 0 ? ' active' : '' }}">
						<a class="nav-link" href="/contact_us">Contact Us</a>
					</li>

					<li class="nav-item{{ substr_count(request()->getPathInfo(), 'about_us') > 0 ? ' active' : '' }}">
						<a class="nav-link" href="/about_us">About Us</a>
					</li>

					<li class="nav-item{{ substr_count(request()->getPathInfo(), 'login') > 0 ? ' active' : '' }}">
						<a class="nav-link" href="/login">Login</a>
					</li>

					<!-- Dropdown -->
					{{--<li class="nav-item dropdown">--}}
						{{--<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>--}}
						{{--<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">--}}
							{{--<a class="dropdown-item" href="#">Action</a>--}}
							{{--<a class="dropdown-item" href="#">Another action</a>--}}
							{{--<a class="dropdown-item" href="#">Something else here</a>--}}
						{{--</div>--}}
					{{--</li>--}}
				</ul>
				<!-- Links -->
			</div>
			<!-- Collapsible content -->

		</nav>
		<!--/.Navbar-->

	@endif