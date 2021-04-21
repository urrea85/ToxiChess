    @extends('masterPage')

    @section('title', 'Ranking')

    @section('sidebar')
        @parent

        <p>This is appended to the master sidebar.</p>
    @endsection

    @section('content')

    @isset($users)
    
    <link rel="stylesheet" href="css/panelAdmin.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <div class="div2">
    <p style="color:#ffffff; font-weight: bold;">FALTA ORDENAR POR PUNTOS</p>
        <table cellspacing="10" cellpadding="5" style="padding: 0 30px"><tr>
        <th>Nickname</th><th>Score</th>
        </tr>

        @foreach ($users as $user)
            <td>{{$user->nickname}}</td>
            <td>{{$user->puntos}}</td>
            </tr>
        @endforeach

        </table>
    </div>

    <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
        <?php echo $users->render(); ?>
    </div>
    @endisset

    @endsection