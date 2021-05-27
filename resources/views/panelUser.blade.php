@extends('panelAdmin')


@section('panel')
<center style="margin-top:2%">
<select id="mySelect">
            <option value="id">Id</option>
            <option value="name">Name</option>
            <option value="nick">Nickname</option>
            <option value="email">Email</option>
            <option value="games">Total Games</option>
            <option value="all" selected>All</option>
        </select>
        <input class="input" id="myInput" type="text" required>
        <button type="button" class="icon" id="search" onclick="filtrarUsuarios()"> <i class="bi bi-search" ></i></button>
    @isset($users)
    <div class="col-md-8" style="margin-top:2%">
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Nickname</th>
                <th>Email</th>
                <th>Total Games</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($users as $user)
               
                <tr>
                    {{--<td><input id="id" type="text" value="{{$game->id}}"></td>--}}
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->nickname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->total_games}}</td>
                </tr>
            @endforeach
          </tbody>
        </table>

        <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
                <?php echo $users->render() ;?>
        </div>
      </div>
      @endisset
      </div>
</center>


@endsection