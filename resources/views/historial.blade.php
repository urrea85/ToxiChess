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
        <h3 class="text-center text-info" style="color: black !important">Historial</h3>
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Result</th>
              <th>Start</th>
              <th>End</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($games as $game)
               
                <form method='POST' action = "<?php echo '/historial/'.$game->id?>">
                @csrf
                  @method('DELETE')
                <tr>
                      {{--<td><input id="id" type="text" value="{{$game->id}}"></td>--}}
                      <td>{{$game->id}}</td>
                      <td>{{$game->result}}</td>
                      <td>{{$game->start}}</td>
                      <td>{{$game->end}}</td>
                      <td>
                          <button type="submit" onclick="return confirm('Do you want delete this record?'); "> <i class="bi bi-trash-fill" ></i></button>
                      </td>
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