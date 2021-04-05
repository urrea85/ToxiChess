
var form = document.getElementById('form');
var message = document.getElementById('message');
var messages = document.getElementById('messages');

Echo.channel('chat')
    .listen('NewMessage', (e) => {
        var item = document.createElement('li');
        item.textContent = e.message;
        messages.appendChild(item);
        window.scrollTo(0,document.body.scrollHeight);
    });

form.addEventListener('submit', function(e){
    e.preventDefault();
    if (message.value){
        axios.post('sendMessage',{message : message.value});
        message.value = "";
    }
});