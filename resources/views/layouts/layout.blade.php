<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">
        
        <title>@yield('title')</title>

        @yield('styles')

        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body>

        @yield('content')

        @yield('scripts')

    </body>

</html>
