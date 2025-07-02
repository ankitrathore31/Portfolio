<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Portfolio</title>
</head>

<body>

    {{-- Sidebar --}}
    @include('Home.sidebar.sidebar')

    {{-- Main Content --}}
    @yield('content')

    @if (Request::is('/'))
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    @endif
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- JavaScript --}}
    <script src="{{ asset('script/script.js') }}"></script>

</body>

</html>
