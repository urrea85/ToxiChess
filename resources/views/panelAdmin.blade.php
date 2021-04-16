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

        function filtrar()
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
                window.location="/panelAdmin/"+select +"/" + input;
            }
        }

    </script>
    <div class="div">
        <select id="mySelect">
            <option value="id">Id</option>
            <option value="name">Name</option>
            <option value="nick">Nickname</option>
            <option value="email">Email</option>
            <option value="games">Total Games</option>
            <option value="all" selected>All</option>
        </select>
        <input class="input" id="myInput" type="text" required>
        <button type="button" class="icon" id="search" onclick="filtrar()"> <i class="bi bi-search" ></i></button>
    @isset($users)
    <div>
        <br>
    <div class="div2">
            <table cellspacing="10" cellpadding="5" style="padding: 0 30px"><tr>
            <th>Id</th><th>Name</th><th>Nickname</th><th>Email</th><th>Total Games</th>
            </tr>

            @foreach ($users as $user)
                <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->nickname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->total_games}}</td>
                </tr>
            @endforeach

            </table>
    </div>
    <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
        <?php echo $users->render() ;?>
    </div>

    @endisset
    {{-- 
        {{$users->links()}} //para ver todas las paginas (curso 13 listar y leer registros)   
    --}}
@endsection