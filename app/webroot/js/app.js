/**
 * Created by ikea on 12/27/14.
 */
var socket = require('socket.io');
var express = require('express');
var http = require('http');

var app = express();
var server = http.createServer(app);

var io = socket.listen(server);

io.sockets.on('connection', function(client) {
    console.log("New client !");

    client.on('message', function(data) {
        console.log('Message received ' + data.name + ":" + data.message);

        io.sockets.emit('message', {name: data.name, message: data.message});
    });
});

server.listen(8080);