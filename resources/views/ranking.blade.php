    @extends('masterPage')

    @section('title', 'Ranking')

    @section('sidebar')
        @parent

        <p>This is appended to the master sidebar.</p>
    @endsection

    @section('content')


    <link rel="stylesheet" href="css/panelAdmin.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <div style="display:flex; justify-content:center">

    <form action="{{url('/ranking/total')}}", method="GET">
        <button type="submit", value="Total", class="button" style="margin: 10px; font-size: 21px" id="rankingTotal"> Total </button>
    </form>
    <form action="{{url('/ranking/mensual')}}", method="GET">
        <button type="submit", value="Mensual",  class="button" style="margin: 10px; font-size: 21px" id="rankingMensual"> Mensual </button>
    </form>
    <form action="{{url('/ranking/raw')}}", method="GET">
        <button type="submit", value="Raw",  class="button" style="margin: 10px; font-size: 21px" id="rankingRaw"> Raw </button>
    </form>

    </div>
    @isset($users)
    
    

    <div class="div2">
        <table cellspacing="5" style="margin-top:10px; padding:10px 20px; border-collapse:inherit"><tr>

        @if($raw)
        <th>Id</th>
        @endif
        <th style="padding:0px 25px">Nickname</th><th style="padding:0px 25px">Score</th>
        
        @if($raw)
        <th>Fecha</th>
        @endif

        </tr>

        @foreach ($users as $user)
            @if($raw)
            <th>{{$user->id}}</th>
            @endif
            <td>{{$user->nickname}}</td>
            <td>{{$user->points}}</td>

            @if($raw)
            <th>{{$user->updated_at}}</th>
            @endif

            </tr>
        @endforeach

        </table>


        @if($raw)
        <form method='POST' action = "{{url('/ranking/raw')}}">
            @csrf
            @method('DELETE')
            <div style="padding: 10px 0px">
                <label class="rectangle-7">ID</label>
                <input  class="" type="number" id="idPoints" name="id"/> 
            </div style="padding: 10px 0px">
            <div style="padding: 10px 0px">
                <input type="submit" class="iconOff" style=" font-size: 21px; color:black" value="Eliminar"></i></input>  
            </div style="padding: 10px 0px">

            @if (session()->has('message'))
                    <p style="text-align:center; color: red; text-size: 15px;">{{session('message')}}</p>
            @endif
        </form>
        @endif

    </div>
    <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
        <?php echo $users->render(); ?>
    </div>


    @endisset

    @endsection