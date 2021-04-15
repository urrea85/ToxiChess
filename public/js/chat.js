var side = "b"
var form = document.getElementById('form-b');
var message = document.getElementById('message-b');
var messages = document.getElementById('messages-b');
changeSide("w")



/*Echo.channel('chat')
    .listen('NewMessage', (e) => {
        var item = document.createElement('li');
        item.textContent = e.message;
        messages.appendChild(item);
        window.scrollTo(0,document.body.scrollHeight);
    });*/

/*form.addEventListener('submit', function(e){
    e.preventDefault();
    if (message.value){
        axios.post('sendMessage',{message : message.value});
        message.value = "";
    }
});*/

function receiveMessage(event){
    var item = document.createElement('li');
    item.textContent = event.message;
    messages.appendChild(item);
}

function sendMessage(event){
    event.preventDefault();
    if (message.value){
        axios.post('sendMessage',{message : message.value, side : side});
        message.value = "";
    }
}

function changeSideE(event){
    if (side=="w"){
        changeSide("b")
    }
    else{
        changeSide("w")
    }
}

function changeSide(newSide){
    var oldContainer = document.getElementById("chat-container-" + side)
    var newContainer = document.getElementById("chat-container-" + newSide)
    form.removeEventListener('submit',sendMessage);
    messages.innerHTML = ""

    oldContainer.addEventListener('click',changeSideE);
    oldContainer.classList.add("darken")
    newContainer.classList.remove("darken")
    newContainer.removeEventListener('click',changeSideE);

    window.form = document.getElementById('form-'+newSide);
    window.message = document.getElementById('message-'+newSide);
    window.messages = document.getElementById('messages-'+newSide);

    form.addEventListener('submit',sendMessage);
    Echo.leaveChannel("chat-" + side)
    Echo.channel("chat-"+newSide).listen("NewMessage",receiveMessage);

    side = newSide
}