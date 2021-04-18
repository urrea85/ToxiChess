@extends('masterPage')

@section('title', 'Perfil')

@section('sidebar')
    @parent

@endsection

@section('content')
<link rel="stylesheet" href="css/perfil.css">
<div class="flex-centerbox">
    <div class="form">
        <form class="form2">
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
                <button type="button" class="icon"> Actualizar Datos </i></button>  
                <button type="button" class="iconOff"> Eliminar Cuenta </i></button>
            </div>
        </form>
    </div>
</div>
@endsection