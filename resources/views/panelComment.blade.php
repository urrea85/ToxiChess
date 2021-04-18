@extends('panelAdmin')

@section('panel')

<script>
       function actualizarComentarios()
        {
            var input = document.getElementById("idMessage").value;
            var select = document.getElementById("content").value;
            if (input == "" && select != ""){
                alert("Debes llenar el campo")
                return false;
            }else {
                if((input=="id") && !Number.isInteger(parseInt(input))){
                    alert("Introduzca un número")
                    return false;
                }
                    window.location="/panelAdmin/comments/update/"+input +"/" + select;

            }
        }
</script>

<link rel="stylesheet" href="css/perfil.css">
<div class="div">
    <select id="mySelect">
                <option value="id">Id</option>
                <option value="content">Content</option>
                <option value="user">User ID</option>
                <option value="all" selected>All</option>
            </select>
            <input class="input" id="myInput" type="text" required>
            <button type="button" class="icon" id="search" onclick="filtrarComentarios()"> <i class="bi bi-search" ></i></button>
        @isset($comments)
        <div>
            <br>
        <div class="div2">
                <table cellspacing="10" cellpadding="5" style="padding: 0 30px"><tr>
                <th>Id</th><th>Date</th><th>Content</th><th>User ID</th>
                </tr>
                @foreach ($comments as $comment)
                    <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->date}}</td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->user_id}}</td>
                    </tr>
                @endforeach

                </table>
        </div>
        <div class="flex-centerbox" style="flex-direction: row; padding-top: 20px">
            <?php echo $comments->render() ;?>
        </div>
        <div style="padding: 10px 0px">
            <label class="rectangle-7">ID</label>  <input  class="" type="number" id="idMessage" name="id" /> 
        </div style="padding: 10px 0px">
        <div style="padding: 10px 0px">
            <label class="rectangle-7">New Message</label>  <input  class="" type="text" id="content" name="id2" /> 
        </div style="padding: 10px 0px">
        <div style="padding: 10px 0px">
            <button type="button" class="icon" style=" font-size: 21px" onclick="actualizarComentarios()"> Actualizar</i></button>  
        </div style="padding: 10px 0px">
  
        @endisset
@endsection