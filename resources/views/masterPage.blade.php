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
            <button type="button" class="horizontal-menu-2">Historial</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/home')}}'">Jugar</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/perfil')}}'">Perfil</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/panelAdmin')}}'">Panel Administrador</button>
            <button type="button" class="icon" onclick="showRegister()"> <i class="bi bi-person-circle" ></i></button>
            <button type="button" class="iconOff"> <i class="bi bi-power"></i></button>
        </div>

        {{-- onclick="window.location='{{url('/register')}}'" --}}

        @show

        <div class="container">
            @yield('content')
            
        </div>

        <div id="oculto" style="position:absolute;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;visibility:hidden;">
            <div id="container" class="rectangle3" style="display: flex;">
            <form>
                <!-- Username -->
                <div class="moi">
                    <i  class="bi bi-person-circle"><input class="input3" type="name" value="Username"></i>
                </div>
              
                <!-- Email -->
                <div class="moi">
                    <i class="bi bi-envelope"><input class="input3" type="email" value="Email"></i>
                </div>
                
                <!-- Password -->
                <div class="moi">
                <i  class="bi bi-asterisk"><input id="Password" class="input3" type="password"><input type="checkbox" onclick="showPasswd()"></i>
                </div>
                <div id="lower" style="display:flex;justify-content:center">
               
                    <!-- Submit Button -->
                    <button class="bootstrap-blue-button-normal-2" type=button >
                        Log in
                    </button>
                    <button class="bootstrap-blue-button-normal-1" value="Register" type=button >
                        Register
                    </button>
                    <button class="bootstrap-blue-button-normal-1" value="Close" type=button style="background:red" onclick="showRegister()">
                        Close
                    </button>
                </div>
        </form>
    </div>
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