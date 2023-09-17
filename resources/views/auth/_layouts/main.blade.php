<!DOCTYPE html>
<html>
<head>
    @include('auth._components.metas')
    @include('auth._components.styles')
    @yield('page-styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

</head>
<body>
    @yield('content')
    @include('auth._components.scripts')
    @yield('page-scripts')
</body>
</html>