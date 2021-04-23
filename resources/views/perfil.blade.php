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
<div class="flex-centerbox">
    <div class="form">
        <form method='POST' action = "{{url('/perfil')}}"class="form2">
            @csrf
            
            @method('PUT')
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Id</label> <input class=" " type="text" id="Id" name="Id" readonly="readonly"/>
            </div>
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Nickname</label> <input class=" " type="text" id="Nickname" name="Nickname" />
            </div>
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Name</label>     <input  class=" " type="text" id="Name" name="Name" />
            </div>
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Email</label>    <input  class=" " type="email" id="Email" name="Email" /> 
            </div style="padding: 10px 0px">
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Password</label> <input  class=" " type="password" id="Password" name="Password" /> <input type="checkbox" onclick="showPasswd()">
            </div style="padding: 10px 0px">
            <div style="padding: 10px 0px">
                <label class="rectangle-7">Total games</label> <input  type="" id="Total games" name="Total games" readonly="readonly"/>
            </div>
            <div style="padding: 10px 0px"> 
                <label class="rectangle-7">Points</label>      <input type="" id="Points" name="Points" readonly="readonly"/> 
            </div>
            <div style="padding: 10px 0px">
                <input type="submit" value="Actualizar Datos" class="icon" style="color:black"></i></input>  
                
                <button type="button" class="iconOff" onclick="borrarUsuario()" style="color:black">Eliminar Cuenta</i></button>
            </div>
            
            @isset($user)
            <script>
                document.getElementById("Id").value = '<?php echo $user->id?>';
                document.getElementById("Nickname").value = '<?php echo $user->nickname?>';
                document.getElementById("Name").value = '<?php echo $user->name?>';
                document.getElementById("Email").value = '<?php echo $user->email?>';
                document.getElementById("Password").value = '<?php echo $user->password?>';
                document.getElementById("Total games").value = '<?php echo $user->total_games?>';
            </script>
            @endisset

            @isset($total)
            <script>
                document.getElementById("Points").value = '<?php echo $total?>';
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

@endsection

