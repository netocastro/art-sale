<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body style="padding-bottom: 100px;">
    @include('site.fragments.navbar')
    @include('site.fragments.secondNavbar')

    @yield('content')

    @include('site.fragments.footer')

    <!-- ----------------O jquery do proprio projeto nao esta funcionando--------------------------- -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://localhost/development/2021/Site-Emerson/Site-Emerson/cdn/js/functions.js"></script>
    <script src="{{ asset('js/dependencies/bootstrap.js') }}"></script>
    @stack('scripts')
    
    
    

</body>

</html>
