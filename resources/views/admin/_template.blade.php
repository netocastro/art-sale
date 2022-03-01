<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

</head>

<body>
    <h1>navbar</h1>

    @yield('content')

    <h1>footer</h1>

    <!-- ----------------O jquery do proprio projeto nao esta funcionando--------------------------- -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('scripts')

</body>

</html>
