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
    client.on('init', function(request) {
        io.sockets.emit('room', request.room + "into");
        client.join(request.room);
    });
    client.on('message', function(data) {
        console.log(data);
        console.log('Message received ' + data.message + ' from ' + data.username + 'of' + data.id);
        io.sockets.in(client.rooms[1]).emit('message', {message: data.message, username: data.username, id: data.id});
    });
});

server.listen(8080);