    @extends('masterPage')

    @section('title', 'Ranking')

    @section('sidebar')
        @parent
        <p></p>
    @endsection

    @section('content')

    <link rel="stylesheet" href="css/panelAdmin.css">
    <link rel="stylesheet" href="css/perfil.css">
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
    
    <center style="margin-top:2%">
        @isset($users)
        
        

        <div class="col-md-8">
            <table class="table table-hover" id="data-table">
                <thead>
                    <tr>

                    <th style="padding:0px 25px">Nº</th>
                        @if($raw)
                        @auth
                            @if (Auth::user()->role == 'admin')
                                <td>Id</td>
                            @endif
                            @endauth
                        @endif
                        <th style="padding:0px 25px">Nickname</th><th style="padding:0px 25px">Score</th>
                        
                        @if($raw)
                        <th>Fecha</th>
                        @endif
                        @auth
                            @if (Auth::user()->role == 'admin')
                                @if($raw)
                                <th></th>
                                @endif
                            @endif
                        @endauth

                    </tr>
                </thead>

                <tbody>
                <?php $i=0; ?>
                    @foreach ($users as $user)
                    
                        <?php $i++;?>
                        @if( $i == 1)
                            <td><i class="bi bi-trophy-fill" ></i> </td>
                        @else
                            <td> {{$i}} </td>
                        @endif
                        @if($raw)
                        @auth
                            @if (Auth::user()->role == 'admin')
                                <td>{{$user->id}}</td>
                            @endif
                            @endauth
                        @else
                        
                        @endif

                        <td>{{$user->nickname}}</td>
                        <td>{{$user->points}}</td>

                        @if($raw)
                            <th>{{$user->updated_at}}</th>
                        @endif

                        @auth
                            @if (Auth::user()->role == 'admin')
                                @if($raw)
                                    <form method='POST' action = "<?php echo '/ranking/raw/'.$user->id?>">
                                    @csrf
                                    @method('DELETE')
                                        <td>
                                            <button type="submit" onclick="return confirm('Do you want delete this record?'); "> <i class="bi bi-trash-fill" ></i></button>
                                        </td>
                                    </form>
                                @endif
                            @endif
                        @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>


            @if($raw)
            @endif

        </div>
        


        <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
            <?php echo $users->render(); ?>
        </div>

        @if (session()->has('message'))
          <script>
                alert("<?php echo session('message')?>");
          </script>
        @endif
      </div>


        @endisset
    </center>
    @endsection