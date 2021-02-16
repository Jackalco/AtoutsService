<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Sections to put the title and meta description tags, for SEO purpose -->
        <title>@yield('head-title',env('APP_NAME'))</title>
        <meta name="description" content="@yield('head-meta-description','')">
        @stack('head-meta')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts.css') }}"/>

        @stack('script.head')

        @stack('stylesheet')
    </head>
    <body>

    @include('layouts.nav')
    <main>

                @yield('content')

    </main>
    @include('layouts.footer')


    @stack('script')
    </body>
</html>