
var side = "b"
var form = document.getElementById('form-b');
var message = document.getElementById('message-b');
var messages = document.getElementById('messages-b');
changeSide("w")

var actualTime = time;
var startTime = Date.now()/1000.0;

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

function setTimer(){
    actualTime = time - (Date.now()/1000.0 - startTime);
    if (actualTime<=0.0) actualTime = 0.0;
    document.getElementById("timer").innerHTML = actualTime.toFixed(1) + " S";
}

setInterval(setTimer,100);

// ------------------------------Chess---------------------------------------------

var board = null
var game = new Chess()
game.load(fen);
var whiteSquareGrey = '#a9a9a9'
var blackSquareGrey = '#696969'

function removeGreySquares () {
  $('#myBoard .square-55d63').css('background', '')
}

function greySquare (square) {
  var $square = $('#myBoard .square-' + square)

  var background = whiteSquareGrey
  if ($square.hasClass('black-3c85d')) {
    background = blackSquareGrey
  }

  $square.css('background', background)
}

function onDragStart (source, piece) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return false

  // or if it's not that side's turn
  if ((game.turn() === 'w' && piece.search(/^b/) !== -1) ||
      (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
    return false
  }
}

function onDrop (source, target) {
  removeGreySquares()

  // see if the move is legal
  var move = game.move({
    from: source,
    to: target,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  })

  // illegal move
  if (move === null) return 'snapback'
}

function onMouseoverSquare (square, piece) {
  // get list of possible moves for this square
  var moves = game.moves({
    square: square,
    verbose: true
  })

  // exit if there are no moves available for this square
  if (moves.length === 0) return

  // highlight the square they moused over
  greySquare(square)

  // highlight the possible squares for this piece
  for (var i = 0; i < moves.length; i++) {
    greySquare(moves[i].to)
  }
}

function onMouseoutSquare (square, piece) {
  removeGreySquares()
}

function onSnapEnd () {
  board.position(game.fen())
}

var config = {
  draggable: true,
  position: fen,
  onDragStart: onDragStart,
  onDrop: onDrop,
  onMouseoutSquare: onMouseoutSquare,
  onMouseoverSquare: onMouseoverSquare,
  onSnapEnd: onSnapEnd
}
board = Chessboard('myBoard', config);
$(window).resize(board.resize);