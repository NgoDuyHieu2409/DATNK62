<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken Theme">

    <title>HieuND</title>

    {{-- <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900%7CPlayfair+Display:400,700,900"
        rel="stylesheet"> --}}
        <link href="css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" media="screen">
        <link href="css/flaticon.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link href="css/magnific-popup.css" rel="stylesheet">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" data-template-style="true" type="text/css" href="css/CSTiles-1.1.0.css">
        <link href="css/custom.css" rel="stylesheet" media="screen">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header> --}}

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/SmoothScroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
	<script src="js/jquery.slicknav.js"></script>
	<script src="js/jquery.magnific-popup.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.CSTiles-1.1.0.min.js"></script>
    <script src="js/function.js"></script>
</body>

</html>
