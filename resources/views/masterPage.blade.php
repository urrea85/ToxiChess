<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <style>

            body {
                background: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
                color: white;
                text-align: center;
            }

            .horizontal-menu-2{    
                        flex: 2;
                        color: gold;
                        font-weight: 400;
                        font-size: 20px;
                        text-align: center;
                        border-color: mediumpurple;
                        border-right:0;
                        border-left: 0; 
                        border-top: 0;
                        box-shadow: 0 0 40px 40px mediumpurple inset, 0 0 0 0 mediumpurple;
                        -webkit-transition: all 150ms ease-in-out;
                        transition: all 150ms ease-in-out;
                    }

                    .horizontal-menu-2:hover {
                         box-shadow: 0 0 10px 0 mediumpurple inset, 0 0 10px 4px mediumpurple;
                    }

         
           .iconOff{
                background-color: mediumpurple;
                flex: 1;
                font-size: 30px;
                vertical-align: middle;
                border-top: 0;
                border-right: 2px solid mediumpurple;   
                border-bottom: 2px solid #6C3783;
                border-left: 0;
                -webkit-transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
                box-shadow: 0 0 40px 40px mediumpurple inset, 0 0 0 0 mediumpurple;
                 transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
            }

            .iconOff:hover {
                box-shadow: 0 0 40px 40px #e74c3c inset;
            }

            .icon{
                background-color: mediumpurple;
                flex: 1;
                font-size: 30px;
                vertical-align: middle;
                border-top: 0;
                border-right: 2px solid mediumpurple;   
                border-bottom: 2px solid #6C3783;
                border-left: 0;
                box-shadow: 0 0 40px 40px mediumpurple inset, 0 0 0 0 mediumpurple;
                -webkit-transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
                 transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
            }

            .icon:hover {
                box-shadow: 0 0 40px 40px limegreen inset;
            }
            .redes{
                flex: 1;
                position: fixed;
                font-size: 1.8em;
                margin-top: 0.2em;
                line-height: 1.1em;
                cursor: pointer;
                border: 0;
            }
            
            html{
                height: 100%;
            }

            .logo{
                background-color: mediumpurple;
                border-top: 0;
                border-right: 2px solid mediumpurple;   
                border-bottom: 2px solid #6C3783;
                border-left: 0;

            }

            .logo:before {
                content: '';
                background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
                position: absolute;
                top: -2px;
                left:-2px;
                background-size: 400%;
                z-index: -1;
                filter: blur(5px);
                width: calc(100% + 4px);
                height: calc(100% + 4px);
                animation: glowing 20s linear infinite;
                opacity: 0;
                transition: opacity .3s ease-in-out;
                border-radius: 10px;
            }

            .logo:active {
                color: #000
            }

            .logo:active:after {
                background: transparent;
            }

            .logo:hover:before {
                opacity: 1;
            }

            .logo:after {
                z-index: -1;
                content: '';
                position: absolute;
                width: 100%;
                height: 100%;
                background: #111;
                left: 0;
                top: 0;
                border-radius: 10px;
            }

            @keyframes glowing {
                0% { background-position: 0 0; }
                50% { background-position: 400% 0; }
                100% { background-position: 0 0; }
            }
            
        </style>
        

        <div  style="display:flex; position:fixed; top:0; right:0; left:0;" class="btn-group btn-group-justified">
            <button style="vertical-align: middle;" type="button" class="logo"><img src="img/logoRecortado.png"></button>
            <button type="button" class="horizontal-menu-2">Ranking</button>
            <button type="button" class="horizontal-menu-2">Historial</button>
            <button type="button" class="horizontal-menu-2">Jugar</button>
            <button type="button" class="horizontal-menu-2">Perfil</button>
            <button type="button" class="horizontal-menu-2">Panel Administrador</button>
            <button type="button" class="icon" > <i class="bi bi-person-circle" ></i></button>
            <button type="button" class="iconOff"> <i class="bi bi-power"></i></button>
        </div>



        @show

        <div class="container">
            @yield('content')
        </div>
    </body>

    <footer>
        <div style="display:flex; position: fixed; bottom: 10%; right:0;">
                <button type="button" class="redes" style="left: 92%; background:lightskyblue"> <i class="bi bi-twitter"></i></button>
                <button type="button" class="redes" style="left: 95%; background:orchid"> <i class="bi bi-instagram"></i></button>
        </div>
    </footer>
</html>