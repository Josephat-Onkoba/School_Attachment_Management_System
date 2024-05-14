<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom Auth Laravel')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @yield('style')
</head>
<body class="flex flex-col h-screen">
    <header class="bg-white border-gray-200 dark:bg-gray-900">
        @include('layouts.header')
    </header>
    
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <footer class="bg-white rounded-lg shadow dark:bg-gray-900">
        @include('layouts.footer')
    </footer>
    
    @yield('script')
</body>
</html>
