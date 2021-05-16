@extends('masterPage')

@section('title', 'Perfil')

@section('sidebar')
    @parent

@endsection

@section('content')
<center>
<h4 class="sent-notification"></h4>
    <form id="contactForm" >

        <label>Nombre</label>
        <input id="name" type="text" placeholder="Enter Name">
        <br><br>
        <label>Email</label>
        <input id="email" type="text" placeholder="Enter Email">
        <br><br>
        <label>Asunto</label>
        <input id="subject" type="text" placeholder="Enter Subject">
        <br><br>
        <p>Mensaje</p>
        <textarea id="body" rows="5" placeholder="Type Message"></textarea>
        <br><br>
        <button type="button" onclick="sendEmail()" value="Enviar Email">Enviar</button>

    </form>
</center>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">

    function isNotEmpty(caller){
        if(caller.val()==""){
            caller.css('border', '1px solid red');
            return false;
        }
        else{
            caller.css('border', '');
            return true;
        }
    }

    function sendEmail(){
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");

        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
            $.ajax({
                url: 'sendEmail.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    name: name.val();
                    email: email.val();
                    body: body.val();
                    subject: subject.val();
                }, success: function(response){
                    $('#contactForm')[0].reset();
                    $('.sent-notification').text("Message sent successfully");
                }
            });
        }
    }
    

</script>




















@endsection