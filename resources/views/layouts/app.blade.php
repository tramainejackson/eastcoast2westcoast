<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Eastcoast2Westcoast Travel'))</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css?family=Felipa|Playfair+Display|Allerta+Stencil|Artifika|Sacramento|Cinzel+Decorative|Fanwood+Text|Fredericka+the+Great|Fugaz+One|Germania+One|Graduate|Grand+Hotel|IM+Fell+Double+Pica|Montserrat|Slabo+27px|Source+Sans+Pro"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_styles.min.css') }}">

    <!-- Styles -->
    @yield('additional_css')

</head>
<body class="" id="">

{{--NAVIGATION--}}
<div class="" id="e2w_nav">
    @include('components.navigation')
</div>

{{--PAGE CONTENT--}}
<div class="">
    <main class="" style="margin-top: 75px;">

        @if(Auth::guest())
            <div class="col-12 mb-n2" id="">
                <h1 class="font-weight-bold text-uppercase h1 pt-5 mb-5 text-center coolText4 webHeader">Eastcoast
                    Westcoast Travel</h1>
            </div>
        @endif

        {{ $slot }}

        <div
            class="alert fade"
            id="return-data-alert"
            role="alert"
            data-mdb-color="success"
            data-mdb-position="top-right"
            data-mdb-stacking="true"
            data-mdb-width="300px"
            data-mdb-append-to-body="true"
            data-mdb-hidden="true"
            data-mdb-autohide="true"
            data-mdb-delay="4000">
            <p class="alertBody m-0 p-0 text-center"></p>
        </div>
    </main>
</div>

{{--FOOTER--}}
<div class="" id="e2w_footer">
    <footer class="page-footer fixed-bottom">
        @include('components.copyright')
    </footer>
</div>

<!-- Bootstrap core -->
<script type="text/javascript" src="{{ asset('js/mdb.umd.min.js') }}"></script>
<!-- Custom Scripts -->
<script type="text/javascript" src="{{ asset('js/myjs.js') }}"></script>

@if(session('status'))
    <script type="text/javascript">
        document.getElementsByClassName('alertBody')[0].innerHTML = '{{ session('status') }}';
        mdb.Alert.getInstance(document.getElementById('return-data-alert')).update({
            delay: 20000
        });
        mdb.Alert.getInstance(document.getElementById('return-data-alert')).show();
    </script>
@elseif(session('bad_status'))
    <script type="text/javascript">
        document.getElementsByClassName('alertBody')[0].innerHTML = '{{ session('bad_status') }}';
        mdb.Alert.getInstance(document.getElementById('return-data-alert')).show();
    </script>
@endif

<!-- SCRIPTS -->
@yield('additional_scripts')

</body>
</html>
