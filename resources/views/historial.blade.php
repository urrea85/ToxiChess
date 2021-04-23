@extends('masterPage')

@section('title', 'Historial')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<link rel="stylesheet" href="css/panelAdmin.css">
<link rel="stylesheet" href="css/perfil.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


<div class="div1">
@isset($games)
    <div class="div2">
            <table cellspacing="10" cellpadding="5" style="padding: 0 30px"><tr>
            <th>Id</th><th>Result</th><th>Start</th><th>End</th>
            </tr>

            @foreach ($games as $game)
                <tr>
                <td>{{$game->id}}</td>
                <td>{{$game->result}}</td>
                <td>{{$game->start}}</td>
                <td>{{$game->end}}</td>
                </tr>
            @endforeach

            </table>

            <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
                <?php echo $games->render() ;?>
            </div>
            <form method='POST' action = "{{url('/historial')}}">
            @csrf
            @method('DELETE')
            <div style="padding: 10px 0px">
                <label class="rectangle-7">ID</label>  <input  class="" type="number" id="idGame" name="idGame"/> 
            </div style="padding: 10px 0px">
            <div style="padding: 10px 0px">
                <input type="submit" class="iconOff" style=" font-size: 21px; color:black" value="Eliminar"></i></input>  
            </div style="padding: 10px 0px">

            @if (session()->has('message'))
                    <p style="text-align:center; color: red; text-size: 15px;">{{session('message')}}</p>
            @endif
        </form>

    </div>

@endisset
</div>
@endsection