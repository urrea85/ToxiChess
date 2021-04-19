@extends('masterPage')

@section('title', 'Panel')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <link rel="stylesheet" href="css/panelAdmin.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <script type="application/javascript">

        function filtrarUsuarios()
        {
            var input = document.getElementById("myInput").value;
            var select = document.getElementById("mySelect").value;
            if (input == "" && select != "all"){
                alert("Debes llenar el campo")
                return false;
            }else {
                if((select=="id" || select == "games") && !Number.isInteger(parseInt(input))){
                    alert("Introduzca un número")
                    return false;
                }
                    window.location="/panelAdmin/users/"+select +"/" + input;
            }
        }

        function filtrarComentarios()
        {
            var input = document.getElementById("myInput").value;
            var select = document.getElementById("mySelect").value;
            if (input == "" && select != "all"){
                alert("Debes llenar el campo")
                return false;
            }else {
                if((select=="id" || select == "games") && !Number.isInteger(parseInt(input))){
                    alert("Introduzca un número")
                    return false;
                }
                    window.location="/panelAdmin/comments/"+select +"/" + input;

            }
        }


    </script>

    <div class="div">

        <button  class="button" style="margin: 10px; font-size: 21px" id="user" onclick="window.location='{{url('/panelAdmin/users')}}'"> Users </button> 
        <button class="button" style="margin: 10px; font-size: 21px" id="comment" onclick="window.location='{{url('/panelAdmin/comments')}}'"> Comments </button> 
    <div>

        @yield('panel')
@endsection