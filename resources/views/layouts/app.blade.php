<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page.title')</title>
    @vite('resources/js/app.js')
</head>


<body>

    {{-- INCLUDIAMO L'HEADER  --}}
    @include('partials.header')

    <main class="container">
        @yield('page.main')
    </main>

</body>

</html>
