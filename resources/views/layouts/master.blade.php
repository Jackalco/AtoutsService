<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('head-title',env('APP_NAME'))</title>
        <meta name="description" content="@yield('head-meta-description','')">
        @stack('head-meta')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cookie.css') }}"/>
        <script src="https://kit.fontawesome.com/172e84d6d0.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/navbar.js') }}"></script>

        @stack('script.head')

        @stack('stylesheet')
    </head>
    <body>

    @include('layouts.nav')
    <main>

                @yield('content')
                @include('cookieConsent::index')

</div>

    </main>
    @include('layouts.footer')


    @stack('script')
    </body>
</html>