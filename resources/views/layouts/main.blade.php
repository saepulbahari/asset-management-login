<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>

    @include('_partial._navbar')

    <div class="container mx-auto my-8">
        @yield('content')
    </div>
</body>

</html>
