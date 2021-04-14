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
    <div class="chat-container">
        <ul id="messages-w" class="messages">
            @for ($i = 0; $i<20; $i++)
                <li> TestMessage{{$i}} </li>
            @endfor
            <li>SomeUser69: Yeah, I would've went for d4 but e5 is also fine...</li>
            <li>xXbyKasparovXx: What u saying bro? d4 would've been shity, Kd4 and we lose a piece after...</li>
            <li>SomeUser69: We could've checked with queen and we would have enough time to move the bishop away</li>
        </ul>
        <form id="form-w" class="chat-form" action="">
            <input id="message-w" style="flex:1" class="" autocomplete="off" />
            <input type="submit" value="Submit" />
        </form>
    </div>
    <div style=" flex:9 ; margin: 50px 0px ; display:flex; align-items:center; justify-content:center">
        <div id="myBoard" style="width:85%"></div>
    </div>
    <div class="chat-container">
        <ul id="messages-b" class="messages">
            @for ($i = 0; $i<20; $i++)
                <li> TestMessage{{$i}} </li>
            @endfor
            <li>SomeUser69: Yeah, I would've went for d4 but e5 is also fine...</li>
            <li>xXbyKasparovXx: What u saying bro? d4 would've been shity, Kd4 and we lose a piece after...</li>
            <li>SomeUser69: We could've checked with queen and we would have enough time to move the bishop away</li>
        </ul>
        <form id="form-b" class="chat-form" action="">
            <input id="message-b" style="flex:1" autocomplete="off" />
            <input type="submit" value="Submit" />
        </form>
    </div>
</div>

<script src="js/chessB.js"></script>
@endsection
