<!DOCTYPE html>
<html>
<head>
    @include('backoffice._components.metas')
    @include('backoffice._components.styles')
    @yield('page-styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
   
    <div class="main-wrapper">
    @include('backoffice._components.header')
    @include('backoffice._components.sidebar')
    @yield('content')
    </div>
    @yield('page-modals')
    @include('backoffice._components.scripts')
    @yield('page-scripts')
</body>
</html>