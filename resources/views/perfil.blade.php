@extends('masterPage')

@section('title', 'Perfil')

@section('sidebar')
    @parent

@endsection

@section('content')
<link rel="stylesheet" href="css/perfil.css">
<div class="form">
    <form>
        <label class="rectangle-7">Nickname</label> <input class=" " type="text" id="Nickname" name="Nickname" /><br><br>
        <label class="rectangle-7">Name</label>     <input  class=" " type="text" id="Name" name="Name" /> <br><br>
        <label class="rectangle-7">Email</label>    <input  class=" " type="email" id="Email" name="Email" />  <br><br>
        <label class="rectangle-7">Password</label> <input  class=" " type="password" id="Password" name="Password" /> <input type="checkbox" onclick="showPasswd()"><br><br>
        <label class="rectangle-7">Total games</label> <input  type="" id="Total games" name="Total games" readonly="readonly"/><br><br>
        <label class="rectangle-7">Points</label>      <input type="" id="Points" name="Points" readonly="readonly"/><br><br><br><br>
        <button type="button" class="icon"> Actualizar Datos </i></button>
        <button type="button" class="iconOff"> Eliminar Cuenta </i></button>
    </form>
</div>
@endsection