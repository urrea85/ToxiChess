@extends('masterPage')

    @section('title', 'Registro')

    @section('sidebar')
        @parent

        <p>This is appended to the master sidebar.</p>
    @endsection

    @section('content')
    <style>
        .rectangle{
            
            flex: 9;
            width: 340px;
            text-align: center;
            padding: 8px 8px 8px 8px;
            background-color: var(--mainColor);
            border-width: 1px;
            border-style: solid;
            margin: 15% auto;
            justify-content: center;
            border-color: black;
            border-width: 1px;
            border-style: solid;
            border-radius: 3px 3px 3px 3px;

        }

        input{
            color: darkgrey;
        }

        input:focus{
            color: black;
        }

        .bootstrap-blue-button-normal-1 {
            width: 100px;
            height: 40px;
            padding: 0px 10px 0px 10px;
            background: #428bca;
            color: #ffffff;
            border-color: #000000;
            border-width: 1px;
            border-style: solid;
            border-radius: 3px 3px 3px 3px;
            font-family: "Helvetica";
            font-weight: 400;
            font-size: 18px;
            text-align: center;
        }
        .bootstrap-blue-button-normal-2 {
            width: 100px;
            height: 40px;
            padding: 0px 10px 0px 10px;
            background: #ffffff;
            color: #003748;
            border-color: #000000;
            border-width: 1px;
            border-style: solid;
            border-radius: 3px 3px 3px 3px;
            font-family: "Helvetica";
            font-weight: 400;
            font-size: 18px;
            text-align: center;
        }

        
    </style>


<link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body>
    <div id="container" class="rectangle" style="display: flex;">
        <form>
            <!-- Username -->
            <i class="bi bi-person-circle"></i>
            <input type="name" value="Username">
            <br>
            </br>
            <!-- Email -->
            <i class="bi bi-envelope"></i>
            <input type="email" value="Email">
            <br>
            </br>
            <!-- Password -->
            <i class="bi bi-asterisk"></i>
            <input type="password">
            <div id="lower">
            <br>
            </br>
                <!-- Submit Button -->
                <button class="bootstrap-blue-button-normal-2" type=button>
                    Log in
                </button>
                <button class="bootstrap-blue-button-normal-1" value="Register" type=button>
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>

    @endsection