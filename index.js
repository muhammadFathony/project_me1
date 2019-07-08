var socket  = require( 'socket.io' );
var express = require('express');
var app     = express();
//var com     = require('serialport');
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

const SerialPort = require('serialport')
const ByteLength = require('@serialport/parser-byte-length')
const port1 = new SerialPort('COM5',57600)
const parser = port1.pipe(new ByteLength({length: 4}))
//parser.on('data', console.log) // will have 8 bytes per data event
// port
//var serialPort = new com("COM5",57600); 

parser.on('data', function(data){
    console.log(data.toString('hex'));
    io.sockets.emit('new_message',{
        new_message: data.toString('hex')
    });
});

parser.on('data', function(data){
    console.log(data.toString('hex'));
    io.sockets.emit('save',{
        save: data.toString('hex')
    });
});
// buat server
server.listen(port, function () {
  console.log('Server listening at port %d', port);
});

