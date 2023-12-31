{{--<nav x-data="{ open: false }" class="navbar navbar-light navbar-expand-lg">--}}
{{--    <!-- Primary Navigation Menu -->--}}
{{--    <!-- Container wrapper -->--}}
{{--    <div class="container-fluid">--}}

{{--        <!-- Toggle button -->--}}
{{--        <button class="navbar-toggler"--}}
{{--                type="button"--}}
{{--                data-mdb-toggle="collapse"--}}
{{--                data-mdb-target="#navbarSupportedContent"--}}
{{--                aria-controls="navbarSupportedContent"--}}
{{--                aria-expanded="false"--}}
{{--                aria-label="Toggle navigation">--}}
{{--            <i class="fas fa-bars"></i>--}}
{{--        </button>--}}

{{--        <!-- Logo -->--}}
{{--        <div class="d-lg-none mx-auto">--}}
{{--            <a class="navbar-brand px-lg-2" href="{{ route('welcome') }}">--}}
{{--                <x-application-logo class="block w-auto fill-current text-gray-600 ms-n4" />--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <!-- Collapsible wrapper -->--}}
{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <!-- Logo -->--}}
{{--            <div class="d-none d-lg-flex flex-column align-items-center ms-3 ms-lg-0">--}}
{{--                <a class="navbar-brand px-lg-2" href="{{ route('welcome') }}">--}}
{{--                    <x-application-logo class="block w-auto fill-current text-gray-600"/>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <!-- Right elements -->--}}
{{--            <div class="d-flex flex-fill flex-column align-items-center justify-content-lg-end flex-lg-row mt-3 mt-lg-0">--}}
{{--                @auth--}}
{{--                    @if(\Illuminate\Support\Facades\Auth::user()->type == 'customer')--}}
{{--                        <!-- Navigation Links -->--}}
{{--                        <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                            <x-nav-link :href="route('portal.index')" :active="Str::contains(url()->current(), 'portal')" class="text-black opacity-75">--}}
{{--                                {{ __('My Portal') }}--}}
{{--                            </x-nav-link>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                    <!-- Navigation Links -->--}}
{{--                    <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                        <div class="container-fluid">--}}
{{--                            <ul class="navbar-nav">--}}
{{--                                <!-- Dropdown -->--}}
{{--                                <li class="dropdown">--}}
{{--                                    <x-nav-link--}}
{{--                                            :href="route('dashboard')"--}}
{{--                                            :active="request()->routeIs('dashboard') || Str::contains(url()->current(), 'registration_request') || Str::contains(url()->current(), 'customers') || Str::contains(url()->current(), 'admin') || Str::contains(url()->current(), 'documents') || Str::contains(url()->current(), 'about')"--}}
{{--                                            class="dropdown-toggle text-black opacity-75"--}}
{{--                                            id="navbarDropdownMenuLink"--}}
{{--                                            role="button"--}}
{{--                                            data-mdb-toggle="dropdown"--}}
{{--                                            aria-expanded="false"--}}
{{--                                    >{{ __('Admin') }}</x-nav-link>--}}

{{--                                    <ul class="dropdown-menu pt-1 ps-3 pb-3" aria-labelledby="navbarDropdownMenuLink" style="min-width: 11rem;">--}}
{{--                                        <li class="my-1">--}}
{{--                                            <x-nav-link :href="route('dashboard')"--}}
{{--                                                        :active="request()->routeIs('dashboard')" class="text-black opacity-75">--}}
{{--                                                {{ __('Dashboard') }}--}}
{{--                                            </x-nav-link>--}}
{{--                                        </li>--}}
{{--                                        <li class="my-1">--}}
{{--                                            <x-nav-link :href="route('documents.index')"--}}
{{--                                                        :active="Str::contains(url()->current(), 'documents')" class="text-black opacity-75">--}}
{{--                                                {{ __('Documents') }}--}}
{{--                                            </x-nav-link>--}}
{{--                                        </li>--}}
{{--                                        <li class="my-1">--}}
{{--                                            <x-nav-link :href="route('registration_requests.index')"--}}
{{--                                                        :active="Str::contains(url()->current(), 'registration_request')" class="text-black opacity-75">--}}
{{--                                                {{ __('Registration Request') }}--}}
{{--                                            </x-nav-link>--}}
{{--                                        </li>--}}
{{--                                        <li class="my-1">--}}
{{--                                            <x-nav-link :href="route('customers.index')"--}}
{{--                                                        :active="Str::contains(url()->current(), 'customers')" class="text-black opacity-75">--}}
{{--                                                {{ __('Customers') }}--}}
{{--                                            </x-nav-link>--}}
{{--                                        </li>--}}
{{--                                        <li class="my-1">--}}
{{--                                            <x-nav-link :href="route('admin_reviews')"--}}
{{--                                                        :active="Str::contains(url()->current(), 'admin_reviews')" class="text-black opacity-75">--}}
{{--                                                {{ __('Reviews') }}--}}
{{--                                            </x-nav-link>--}}
{{--                                        </li>--}}
{{--                                        <li class="my-1">--}}
{{--                                            <x-nav-link :href="route('admin_terms')"--}}
{{--                                                        :active="Str::contains(url()->current(), 'admin_terms')" class="text-black opacity-75">--}}
{{--                                                {{ __('Policies') }}--}}
{{--                                            </x-nav-link>--}}
{{--                                        </li>--}}
{{--                                        <li class="my-1">--}}
{{--                                            <x-nav-link :href="route('admin_faqs')"--}}
{{--                                                        :active="Str::contains(url()->current(), 'admin_faqs')" class="text-black opacity-75">--}}
{{--                                                {{ __('FAQ') }}--}}
{{--                                            </x-nav-link>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endif--}}
{{--                @endauth--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                    <x-nav-link :href="route('services')" :active="request()->routeIs('services')" class="text-black opacity-75">--}}
{{--                        {{ __('Mind-Body Manual') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                    <x-nav-link :href="route('training')" :active="request()->routeIs('training')" class="text-black opacity-75">--}}
{{--                        {{ __('Trainings') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-black opacity-75">--}}
{{--                        {{ __('Acknowledgements') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                    <x-nav-link :href="route('reviews.index')" :active="request()->routeIs('reviews.index')" class="text-black opacity-75">--}}
{{--                        {{ __('Reviews') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                    <x-nav-link :href="route('terms.index')" :active="request()->routeIs('terms.index')" class="text-black opacity-75">--}}
{{--                        {{ __('Privacy Policy') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                    <x-nav-link :href="route('faqs.index')" :active="request()->routeIs('faqs.index')" class="text-black opacity-75">--}}
{{--                        {{ __('FAQ\'s') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}

{{--                @auth--}}
{{--                    <!-- Navigation Links -->--}}
{{--                    <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                        <x-nav-link :href="route('logout')"--}}
{{--                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-black opacity-75">--}}
{{--                            {{ __('Logout') }}--}}
{{--                        </x-nav-link>--}}
{{--                    </div>--}}

{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                        {{ csrf_field() }}--}}
{{--                    </form>--}}
{{--                @else--}}
{{--                    <!-- Navigation Links -->--}}
{{--                    <div class="px-lg-2 my-1 my-lg-0">--}}
{{--                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-black opacity-75">--}}
{{--                            {{ __('Login') }}--}}
{{--                        </x-nav-link>--}}
{{--                    </div>--}}
{{--                @endauth--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

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
    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll bg-primary">

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
            <ul class="navbar-nav ms-auto">
                <li class="nav-item{{ strlen(request()->getPathInfo()) < 2 ? ' active' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item{{ substr_count(request()->getPathInfo(), 'trips') > 0 ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('welcome') }}">Trips <span class="sr-only">(current)</span></a>
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
