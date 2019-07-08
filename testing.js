var socket    = require('socket.io');
var express   = require('express');
var app       = express();
var server    = require('http').createServer(app);
var io        = socket.listen( server );
var port      = process.env.PORT || 8000;

server.listen(port, function(){
  console.log('Server Listening at port %d', port);
});

io.on('connection', function(socket) {
 console.log('make socket.io', socket.id);
  socket.on( 'new', function( data ) {
    io.sockets.emit('new', data);
    console.log(data);
  });

  socket.on('delete', function(data) {
    io.sockets.emit('delete', data);
    console.log(data);
  });

  socket.on('edit', function(data) {
    io.sockets.emit('edit', data);
    console.log(data);
  });

});