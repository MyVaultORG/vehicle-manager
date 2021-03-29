<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <title></title>
</head>
<body>
    
    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <div class="ajax_load_box_title">Aguarde, carregando...</div>
        </div>
    </div>

    @yield('content')

    <script src="{{ asset('site/js/jquery.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('site/js/scripts.js') }}"></script>    
    @yield('scripts')
</body>
</html>

