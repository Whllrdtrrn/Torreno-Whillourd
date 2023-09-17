<!DOCTYPE html>
<html>
<head>
    @include('frontend._components.metas')
    @include('frontend._components.styles')
    @yield('page-styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    @include('frontend._components.header')
    @yield('content')
    @include('frontend._components.scripts')
    @include('frontend._components.footer')

    @yield('page-scripts')
</body>
</html>