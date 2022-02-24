<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
    <title>@yield('title', 'ABC Bank')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    @stack('styles')
</head>

<body class="bg-light">
    @include('layouts.navbar')
    <div id="app" class="px-2 py-4 p-md-5">
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/common.js') }}"></script>
</body>

</html>
