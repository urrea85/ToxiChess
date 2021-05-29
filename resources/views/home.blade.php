@extends('masterPage')

@section('title', 'HOME')

@section('content')
<link rel="stylesheet" href="css/chessboard-1.0.0.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
crossorigin="anonymous"></script>
<script src="js/chessboard-1.0.0.js"></script>
<script src="js/app.js"></script>

<div style="height:100%; width:100%; display:flex; align-items:stretch">
    <div id="chat-container-w" class="chat-container">
        <ul id="messages-w" class="messages">
        </ul>
        <form id="form-w" class="chat-form" action="">
            <input id="message-w" style="flex:1;width:0"" class="" autocomplete="off" @unless(Auth::check()) onclick="alert('Necesitas estar registrado para enviar mensajes')" @endunless/>
            <input type="submit"  value="Submit" @unless(Auth::check()) disabled @endunless>
        </form>
    </div>
    <div style=" flex:9 ; margin: 50px 0px ; display:flex; align-items:center; justify-content:center; flex-direction: column">
        <div id="myBoard" style="width:80%" @unless(Auth::check()) onclick="alert('Necesitas estar registrado para votar')" @endunless></div>
        <div id="timer">00 S</div>
    </div>
    <div id="chat-container-b" class="chat-container">
        <ul id="messages-b" class="messages">
        </ul>
        <form id="form-b" class="chat-form" action="">
            <input id="message-b" style="flex:1;width:0" autocomplete="off" @unless(Auth::check()) onclick="alert('Necesitas estar registrado para enviar mensajes')" @endunless/>
            <input type="submit" value="Submit" @unless(Auth::check()) disabled @endunless/>
        </form>
    </div>
</div>

<div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Results</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="resultContent" class="modal-body">
        The result was: 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
var time = {{ $time }} ;
var fen = "{{ $fen }}" ;
</script>
<script src="js/chat.js"></script>

@endsection