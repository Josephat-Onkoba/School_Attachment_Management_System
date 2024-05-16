<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom Auth Laravel')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
