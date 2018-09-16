var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});

io.on('connection', function(socket){
  console.log('a user connected');
});

http.listen(3000, function(){
  console.log('listening on *:3000');
});

function emmitNewOrder(http_server){
    var io = socket.listen(http_server);

    io.socket.on("new_order",function(data){
        console.log(data);
    });
}

emmitNewOrder(http_server)