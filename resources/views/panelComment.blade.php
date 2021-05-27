@extends('panelAdmin')

@section('panel')



<link rel="stylesheet" href="css/perfil.css">




<center>
    <select id="mySelect">
                <option value="id">Id</option>
                <option value="content">Content</option>
                <option value="user">User ID</option>
                <option value="all" selected>All</option>
            </select>
            <input class="input" id="myInput" type="text" required>
            <button type="button" class="icon" id="search" onclick="filtrarComentarios()"> <i class="bi bi-search" ></i></button>
        @isset($comments)
 
        <div class="col-md-8" style="margin-top:2%">
            <table class="table table-hover" id="data-table">
            <thead>
                <tr>
                    <th>Id</th><th>Date</th><th>Content</th><th>User ID</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($comments as $comment)
            <form method='POST' action = "<?php echo '/panelAdmin/comments/'.$comment->id?>">
                @csrf
                    <tr>
                        {{--<td><input id="id" type="text" value="{{$game->id}}"></td>--}}
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->date}}</td>
                        <td><input id="content<?php echo $comment->id?>" type="text" value="{{$comment->content}}"></td>
                        <td>{{$comment->user_id}}</td>
                        <td>
                            <button type="submit" onclick="return confirm('Do you want delete this record?'); "> <i class="bi bi-trash-fill" ></i></button>
                            <button type="submit" formaction="<?php echo '/panelAdmin/comments/update/'.$comment->id?>" onclick="return confirm('Do you want edit this record?'); "> <i class="bi bi-pencil-fill" ></i></button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
            </table>

            <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
                    <?php echo $comments->render() ;?>
            </div>

            @if (session()->has('message'))
                <script>
                        alert("<?php echo session('message')?>");
                </script>
                @endif
            </div>
      @endisset

</center>


       {{--
       <form method='POST' action = "{{url('/panelAdmin/comments')}}">
            @csrf
            @method('DELETE')
            <div style="padding: 10px 0px">
                <label class="rectangle-7">ID</label>  <input  class="" type="number" id="idMessage" name="id"/> 
            </div style="padding: 10px 0px">
            <div style="padding: 10px 0px">
                <label class="rectangle-7">New Message</label>  <input  class="" type="text" id="content" name="id2" /> 
            </div style="padding: 10px 0px">
            <div style="padding: 10px 0px">
                <button type="button" class="icon" style=" font-size: 21px;color:black" onclick="actualizarComentarios()"> Actualizar</i></button>
                <input type="submit" class="iconOff" style=" font-size: 21px; color:black" value="Eliminar"></i></input>  
            </div style="padding: 10px 0px">

            @if (session()->has('message'))
                    <p style="text-align:center; color: red; text-size: 15px;">{{session('message')}}</p>
            @endif
        </form>
        @endisset
        --}} 
       
@endsection