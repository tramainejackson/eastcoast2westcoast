@if(Auth::check())

    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <nav id="sidenav-1" class="sidenav bg-white" style="margin-top: 60px;" data-mdb-sidenav-init>
            <ul class="sidenav-menu">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <!-- Collapse 1 -->
                    <a
                        data-mdb-collapse-init
                        data-mdb-ripple-init
                        class="list-group-item list-group-item-action py-2 ripple{{ Str::contains(url()->current(), 'location') ? ' bg-secondary text-white rounded' : '' }}"
                        aria-current="true"
                        data-mdb-toggle="collapse"
                        href="#collapseExample1"
                        aria-expanded="true"
                        aria-controls="collapseExample1"
                    >
                        <i class="fas fa-plane fa-fw me-3" aria-hidden="true"></i><span>Trip Locations</span>
                    </a>
                    <!-- Collapsed content -->
                    <ul id="collapseExample1" class="collapse list-group list-group-flush{{ Str::contains(url()->current(), 'location') ? ' show' : '' }}">
                        <li class="list-group-item py-1">
                            <x-nav-link :href="route('location.create')" :active="Route::is('location.create')" class="text-black opacity-75 px-2">
                                {{ __('Add Trips') }}
                            </x-nav-link>
                        </li>
                        <li class="list-group-item py-1">
                            <x-nav-link :href="route('location.index')" :active="Route::is('location.index') || Str::containsAll(url()->current(), ['location', 'edit'])" class="text-black opacity-75 px-2">
                                {{ __('Edit Trip Events') }}
                            </x-nav-link>
                        </li>
                    </ul>
                    <!-- Collapse 1 -->

                    <!-- Collapse 2 -->
                    <a
                        data-mdb-collapse-init
                        data-mdb-ripple-init
                        class="list-group-item list-group-item-action py-2 ripple{{ Str::contains(url()->current(), 'pictures') ? ' bg-secondary text-white rounded' : '' }}"
                        aria-current="true"
                        data-mdb-toggle="collapse"
                        href="#collapseExample2"
                        aria-expanded="true"
                        aria-controls="collapseExample2"
                    >
                        <i class="far fa-images fa-fw me-3"></i><span>Trip Pictures</span>
                    </a>
                    <!-- Collapsed content -->
                    <ul id="collapseExample2" class="collapse list-group list-group-flush{{ Str::contains(url()->current(), 'pictures') ? ' show' : '' }}">
                        <li class="list-group-item py-1">
                            <x-nav-link :href="route('pictures.create')" :active="Route::is('pictures.create')" class="text-black opacity-75 px-2">
                                {{ __('Add Pictures') }}
                            </x-nav-link>
                        </li>
                        <li class="list-group-item py-1">
                            <x-nav-link :href="route('pictures.index')" :active="Route::is('pictures.index') || Str::containsAll(url()->current(), ['pictures', 'edit'])" class="text-black opacity-75 px-2">
                                {{ __('Edit Pictures') }}
                            </x-nav-link>
                        </li>
                    </ul>
                    <!-- Collapse 2 -->

                    <!-- Collapse 3 -->
                    <a
                        data-mdb-collapse-init
                        data-mdb-ripple-init
                        class="list-group-item list-group-item-action py-2 ripple{{ Str::contains(url()->current(), 'contacts') ? ' bg-secondary text-white rounded' : '' }}"
                        aria-current="true"
                        data-mdb-toggle="collapse"
                        href="#collapseExample3"
                        aria-expanded="true"
                        aria-controls="collapseExample3"
                    >
                        <i class="fas fa-users fa-fw me-3"></i><span>Contacts</span>
                    </a>
                    <!-- Collapsed content -->
                    <ul id="collapseExample3" class="collapse list-group list-group-flush{{ Str::contains(url()->current(), 'contacts') ? ' show' : '' }}">
                        <li class="list-group-item py-1">
                            <x-nav-link :href="route('contacts.create')" :active="Route::is('contacts.create')" class="text-black opacity-75 px-2">
                                {{ __('Add New Contact') }}
                            </x-nav-link>
                        </li>
                        <li class="list-group-item py-1">
                            <x-nav-link :href="route('contacts.index')" :active="Route::is('contacts.index') || Str::containsAll(url()->current(), ['contacts', 'edit'])" class="text-black opacity-75 px-2">
                                {{ __('Edit Contact') }}
                            </x-nav-link>
                        </li>
                    </ul>
                    <!-- Collapse 3 -->

                    <!-- Collapse 4 -->
                    <a
                        data-mdb-collapse-init
                        data-mdb-ripple-init
                        class="list-group-item list-group-item-action py-2 ripple{{ Str::contains(url()->current(), 'admin') ? ' bg-secondary text-white rounded' : '' }}"
                        aria-current="true"
                        data-mdb-toggle="collapse"
                        href="#collapseExample4"
                        aria-expanded="true"
                        aria-controls="collapseExample4"
                    >
                        <i class="fas fa-user fa-fw me-3"></i><span>Users</span>
                    </a>
                    <!-- Collapsed content -->
                    <ul id="collapseExample4" class="collapse list-group list-group-flush{{ Str::contains(url()->current(), 'admin') ? ' show' : '' }}">
                        <li class="list-group-item py-1">
                            <x-nav-link :href="route('admin.create')" :active="Route::is('admin.create')" class="text-black opacity-75 px-2">
                                {{ __('Add New Admin') }}
                            </x-nav-link>
                        </li>
                        <li class="list-group-item py-1">
                            <x-nav-link :href="route('admin.index')" :active="Route::is('admin.index') || Str::containsAll(url()->current(), ['admin', 'edit'])" class="text-black opacity-75 px-2">
                                {{ __('Edit Admin') }}
                            </x-nav-link>
                        </li>
                    </ul>
                    <!-- Collapse 4 -->

                    <a href="{{ route('settings.index') }}" class="list-group-item list-group-item-action py-2 ripple{{ Str::contains(url()->current(), 'setting') ? ' bg-secondary text-white rounded' : '' }}">
                        <i class="fas fa-gear fa-fw me-3"></i><span>Settings</span>
                    </a>

                    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action py-2 ripple" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-arrow-right-from-bracket fa-fw me-3"></i><span>Logout</span>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </ul>
        </nav>
        <!--/. Sidebar navigation -->

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-scroll bg-primary p-3 fw-light" style="z-index: 1050;">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/images/EW-Logo-White.png') }}" height="30" alt="mdb logo">
            </a>

            <!-- Collapse button -->
            <button
                data-mdb-ripple-init
                data-mdb-toggle="sidenav"
                data-mdb-target="#sidenav-1"
                class="btn btn-primary ms-auto"
                aria-controls="#sidenav-1"
                aria-haspopup="true">
                <i class="fas fa-bars fa-2xl"></i>
            </button>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->

@else

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll bg-primary p-3 fw-light">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('/images/EW-Logo-White.png') }}" height="30" alt="mdb logo">
        </a>

        <!-- Collapse button -->
        <button
            data-mdb-collapse-init
            class="navbar-toggler"
            type="button"
            data-mdb-target="#navigation_example"
            aria-controls="navigation_example"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars fa-2xl"></i>
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
            </ul>
            <!-- Links -->
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->

@endif
