<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body class="sb-nav-fixed">
    @include('partials.topbar')
        <div id="layoutSidenav">
            @include('partials.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('partials.footer')
            </div>
        </div>
</body>

</html>
