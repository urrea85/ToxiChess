<!DOCTYPE html>
<html style="height: 100%;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
        href="css/chessboard-1.0.0.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
        crossorigin="anonymous"></script>
        <script src="js/chessboard-1.0.0.js"></script>
        <script src="js/app.js"></script>
        <style>
            .chat-container{
                flex:4; 
                margin: 50px 50px ;
                border:black 2px solid; 
                border-radius:5px;
                display: flex;
                flex-direction:column;
            }

            body { margin: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; }

            .chat-form { background: rgba(0, 0, 0, 0.15); padding: 0.25rem; display: flex; height: 3rem; box-sizing: border-box; backdrop-filter: blur(10px); }
            .chat-form > button { background: #333; border: none; padding: 0 1rem; margin: 0.25rem; border-radius: 3px; outline: none; color: #fff; }

            .messages { list-style-type: none; margin: 0; padding: 0; flex:1; overflow-y: scroll;}
            .messages > li { padding: 0.5rem 1rem;}
            .messages > li:nth-child(odd) { background: #efefef; }
        </style>


        <title>Laravel</title>
    </head>
    <body style="height:100%">
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
            <div style="background-color: green; flex:9 ; margin: 50px 0px ; display:flex; align-items:center; justify-content:center">
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
    </body>
    <script src="js/chessB.js"></script>
</html>