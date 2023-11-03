<!DOCTYPE html>
<html>

<head>
    <title> Laravel 10 Task List App</title>
    @yield('styles')
</head>

<body>
    <h1> @yield('title') </h1>
    @if (session()->has('success'))
        {{ session('success') }}
    @endif
    <div>
        @yield('content')
    </div>
</body>

</html>
