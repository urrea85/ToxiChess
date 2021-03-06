@extends('masterPage')

@section('title', 'Historial')

@section('sidebar')
    @parent

@endsection

@section('content')
<link rel="stylesheet" href="css/panelAdmin.css">
<link rel="stylesheet" href="css/perfil.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


<center style="margin-top:2%">
    @isset($games)
    <div class="col-md-8">
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
            @auth
              @if (Auth::user()->role == 'admin')
                <th>ID</th>
              @endif
            @endauth
              
              <th>Result</th>
              <th>Start</th>
              <th>End</th>
              @auth
                @if (Auth::user()->role == 'admin')
                  <th>Action</th>
                @endif
              @endauth
            </tr>
          </thead>
          <tbody>
            @foreach ($games as $game)
               
                <form method='POST' action = "<?php echo '/historial/'.$game->id?>">
                @csrf
                  @method('DELETE')
                <tr>
                      {{--<td><input id="id" type="text" value="{{$game->id}}"></td>--}}
                      @auth
                        @if (Auth::user()->role == 'admin')
                        <td>{{$game->id}}</td>
                        @endif
                      @endauth
                      @if ($game->result == "white")
                        <td><i class="bi bi-trophy" ></td>
                      @elseif ($game->result == "black")
                          <td> <i class="bi bi-trophy-fill" ></td>
                      @else
                         <td> <i class="bi bi-dash" ></td>
                      @endif
                      <td>{{$game->start}}</td>
                      <td>{{$game->end}}</td>
                      @auth
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <button type="submit" onclick="return confirm('Do you want delete this record?'); "> <i class="bi bi-trash-fill" ></i></button>
                        </td>
                        @endif
                      @endauth
                      </tr>
                  </form>
            @endforeach
          </tbody>
        </table>

        <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
                <?php echo $games->render() ;?>
        </div>
        @if (session()->has('message'))
          <script>
                alert("<?php echo session('message')?>");
          </script>
        @endif
      </div>
      @endisset
      </div>
</center>
@endsection