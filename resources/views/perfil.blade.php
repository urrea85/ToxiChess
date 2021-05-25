@extends('masterPage')

@section('title', 'Perfil')

@section('sidebar')
    @parent

@endsection

@section('content')
<script>
    function borrarUsuario(){
        x = document.getElementById("Id").value;
        window.location="perfil/"+x;
    }
</script>
<link rel="stylesheet" href="css/perfil.css">

@auth
<div class="flex-centerbox">
    <div class="form">
        <form method='POST' action = "{{url('/perfil')}}"class="form2">
            @csrf
            
            @method('PUT')
            
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Nickname</label> <input class=" " type="text" id="Nickname" name="Nickname" value="{{ Auth::user()->nickname }}"/>
            </div>
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Name</label>     <input  class=" " type="text" id="Name" name="Name" value="{{ Auth::user()->name }}"/>
            </div>
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Email</label>    <input  class=" " type="email" id="Email" name="Email" value="{{ Auth::user()->email }}"/>
            </div style="padding: 10px 0px">
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Total games</label> <input  type="" id="Total games" name="Total games" readonly="readonly" value="{{ Auth::user()->total_games }}"/>
            </div>
            <div style="padding: 10px 0px"> 
                <label class="rectangle-7">Points</label>      <input type="" id="Points" name="Points" readonly="readonly"/> 
            </div>
            <div style="padding: 10px 0px">
                <input style="font-size:23px; color:black;" type="submit" value="Actualizar Datos" class="icon" style="color:black"></i></input>  
                
                <button style="font-size:23px; color:black;" type="button" class="iconOff" onclick="borrarUsuario()" style="color:black">Eliminar Cuenta</i></button>
            </div>

            @isset($points)
            <script>
                document.getElementById("Points").value = '<?php echo $points?>';
            </script>
            @endisset
            @isset($message)
            <p style="text-align: center;">
                {{$message}}
            </p>
            @endisset
            
        </form>
    </div>
</div>
@endauth


@endsection

