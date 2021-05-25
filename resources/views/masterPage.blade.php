<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <base href="/public">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


    </head>
    <body>
        @section('sidebar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/styles.css"> 
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

            {{-- aún no funciona hay que hacer auth--}}
        <script type="application/javascript">
        
            function showRegister()
                {
                var x = document.getElementById("oculto");
                    if (x.style.visibility == "hidden") {
                        x.style.visibility = "visible";
                    } else {
                        x.style.visibility = "hidden";
                    }
                }
        </script>
        

        <div  style="display:flex; position:fixed; top:0; right:0; left:0;" class="btn-group btn-group-justified">
            <button style="vertical-align: middle;" type="button" class="logo" onclick="window.location='{{url('/home')}}'"><img src="img/logoRecortado.png"></button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/ranking')}}'">Ranking</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/historial')}}'">Historial</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/home')}}'">Jugar</button>
            @auth
            @if (Auth::user()->role == 'admin')
                <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/panelAdmin')}}'">Panel Administrador</button>
            @endif
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/perfil')}}'">{{ Auth::user()->nickname }}</button>
            @endauth
            @guest   
                <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/login')}}'"> <i class="bi bi-person-circle" ></i></button>
                <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/register')}}'"> <i class="bi bi-person-plus-fill" ></i></button>
            @else
                   <button class="iconOff" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                       <i class="bi bi-power"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            @endguest
        </div>
        @show

        <div class="container2">
            @yield('content')
            
        </div>

    </body>

    <footer>
        <div style="display:flex; position: fixed; bottom: 2%; right:1%;">
                <button type="button" class="redes" style="background:lightskyblue; margin-right:10px" onclick="location.href='https://twitter.com/UA_Universidad'"> <i class="bi bi-twitter"></i></button>
                <button type="button" class="redes" style="background:orchid" onclick="location.href='https://www.instagram.com/ua_universidad/'"> <i class="bi bi-instagram"></i></button>
        </div>
    </footer>
</html>