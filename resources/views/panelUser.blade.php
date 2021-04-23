@extends('panelAdmin')


@section('panel')
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
        <button type="button" class="icon" id="search" onclick="filtrarUsuarios()"> <i class="bi bi-search" ></i></button>
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
@endsection