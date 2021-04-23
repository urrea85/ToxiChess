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
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/perfil')}}'">Perfil</button>
            <button type="button" class="horizontal-menu-2" onclick="window.location='{{url('/panelAdmin')}}'">Panel Administrador</button>
            <button type="button" class="icon" onclick="showRegister()"> <i class="bi bi-person-circle" ></i></button>
            <button type="button" class="iconOff"> <i class="bi bi-power"></i></button>
        </div>


        @show

        <div class="container">
            @yield('content')
            
        </div>

        <div id="oculto" style="text-align: left; position:absolute;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;visibility:hidden;">
            <div id="container" class="rectangle3" style="display: flex;">
            <form method="POST" action="{{url('/register')}}">
                    @csrf
                   
                <!-- Username -->
                <div class="moi">
                    <i  class="bi bi-person-circle"><input name="nickname" id="nickname" class="input3" type="name" value="Nickname" required></i>
                </div>
              
                <!-- Email -->
                <div class="moi">
                    <i class="bi bi-envelope"><input name="email" id="email" class="input3" type="email" value="Email" required></i>
                </div>
                
                <!-- Password -->
                <div class="moi">
                <i  class="bi bi-asterisk"><input name="password"  id="Password" class="input3" type="password" required><input type="checkbox" onclick="showPasswd()"></i>
                </div>
                <div id="lower" style="display:flex;justify-content:center">
               
                    <!-- Submit Button -->
                    <button class="bootstrap-blue-button-normal-2" type=button >
                        Log in
                    </button>
                    <input class="bootstrap-blue-button-normal-1" value="Register" type=submit></input>
                    <button class="bootstrap-blue-button-normal-1" value="Close" type=button style="background:red" onclick="showRegister()">
                        Close
                    </button>
                </div>
                @if (session()->has('error'))
                    <script>
                            var x = document.getElementById("oculto");
                            if (x.style.visibility == "hidden") {
                                x.style.visibility = "visible";
                            } else {
                                x.style.visibility = "hidden";
                            }
                    </script>
                @endif

                @if (session()->has('error'))
                    <p style="text-align:center; color: red; text-size: 15px;">{{session('error')}}</p>
                @endif
        </form>
    </div>
        </div>
    </body>

    <footer>
        <div style="display:flex; position: fixed; bottom: 2%; right:1%;">
                <button type="button" class="redes" style="background:lightskyblue; margin-right:10px" onclick="location.href='https://twitter.com/UA_Universidad'"> <i class="bi bi-twitter"></i></button>
                <button type="button" class="redes" style="background:orchid" onclick="location.href='https://www.instagram.com/ua_universidad/'"> <i class="bi bi-instagram"></i></button>
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