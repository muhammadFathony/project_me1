var socket  = require( 'socket.io' );
var express = require('express');
var app     = express();

var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port1    = process.env.PORT || 3000;

var SerialPort = require('serialport');
var port = new SerialPort('COM5', {
  baudRate: 57600
});

port.on('data', function(data){
  console.log('data', data.toString('hex'));
  io.emit('text',{
  	text : data.toString('hex')
  });
});

// buat server
server.listen(port1, function () {
  console.log('Server listening at port %d', port1);
});
