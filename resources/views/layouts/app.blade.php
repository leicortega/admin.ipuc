<!DOCTYPE html>
<html lang="es">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('assets/images/logo.png') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Dashboard de administrador IPUC Jose Eustacio Rivera.">
        <meta name="author" content="Leiner Ortega">
        <title>@yield('title') - IPUC Admin</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
        <!-- END: CSS Assets-->

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <!-- END: Head -->
    <body class="app">

        <!-- BEGIN: Mobile Menu -->
        @include('layouts.menu_mobile')
        <!-- END: Mobile Menu -->

        <div class="flex">

            <!-- BEGIN: Side Menu -->
            @include('layouts.menu')
            <!-- END: Side Menu -->

            <!-- BEGIN: Content -->
            <div class="content">

                <!-- BEGIN: Top Bar -->
                @include('layouts.top_bar')
                <!-- END: Top Bar -->

                {{-- Content Blade --}}
                @yield('content')

            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        @yield('MyScripts')
        <!-- END: JS Assets-->
    </body>
</html>