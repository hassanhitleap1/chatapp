var socket=require('socket.io');
var app = require('express')();
var http = require('http');
var io = require('socket.io')(http);
var logger = require('winston');

 logger.remove(logger.transports.Console);
 logger.add(new logger.transports.Console,{colorize:true,timestamp:true});
 logger.info(' Socet lessing in port 3001 ');


var http_server=  http.createServer(app).listen(3001);

function emmitNewOrder(http_server){
    var io = socket.listen(http_server);

    io.sockets.on("connection",function(socket){
        socket.on("new_order",function(data){
          io.emit("new_order",data);
          console.log("message lessin");
        });
    });
}

emmitNewOrder(http_server);