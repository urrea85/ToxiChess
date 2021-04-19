<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <base href="/public">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
    </head>
    <body>
        @section('sidebar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/app.css">
        <script type="application/javascript">

        function showPasswd()
        {
            var x = document.getElementById("Password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>

        <div  style="display:flex; position:fixed; top:0; right:0; left:0;" class="btn-group btn-group-justified">
            <button style="vertical-align: middle;" type="button" class="logo" onclick="window.location='{{url('/home')}}'"><img src="img/logoRecortado.png"></button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/ranking')}}'">Ranking</button>
            <button type="button" class="horizontal-menu-2">Historial</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/home')}}'">Jugar</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/perfil')}}'">Perfil</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/panelAdmin')}}'">Panel Administrador</button>
            <button type="button" class="icon" onclick="window.location='{{url('/perfil')}}'"> <i class="bi bi-person-circle" ></i></button>
            <button type="button" class="iconOff"> <i class="bi bi-power"></i></button>
        </div>

        @show

        <div class="container">
            @yield('content')
            
        </div>
    </body>

    <footer>
        <div style="display:flex; position: fixed; bottom: 2%; right:1%;">
                <button type="button" class="redes" style="background:lightskyblue; margin-right:10px"> <i class="bi bi-twitter"></i></button>
                <button type="button" class="redes" style="background:orchid"> <i class="bi bi-instagram"></i></button>
        </div>
    </footer>
    {{-- MODO EMPLEO YIELD
    @extends('masterPage')

    @section('title', 'BOBO')

    @section('sidebar')
        @parent

        <p>This is appended to the master sidebar.</p>
    @endsection

    @section('content')

    @endsection --}}
</html>