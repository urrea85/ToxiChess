@extends('panelAdmin')

@section('panel')
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
        @endisset
@endsection