<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ env('APP_RE') }}/bootstrap/bootstrap.min.css">
    <script src="{{ env('APP_RE') }}/bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="text-center fw-bold bg-black text-white p-4">
        <h2>LAB7 - Nguyễn Minh Quang - PH37198 - WD18308</h2>
    </header>

    @yield('content')

    <footer class="text-center bg-black text-white p-4">
        <h6>Nguyễn Minh Quang - PH37198 - WD18308</h6>
    </footer>
</body>
</html>