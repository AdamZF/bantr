var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

http.listen(3000, function() {
  console.log('listening on 3000');
});


io.on('connection', function (socket) {
  socket.on('notifications.connect', function(data) {
    data = JSON.parse(data);
    console.log(data);
    console.log(data['key']);
    socket.join('notifications-'+data['key']);
  });

  socket.on('conversation_connect', function(data) {
    socket.join('messaging-'+data['convo']);
    console.log("joined " + data['convo']);
  });

});



redis.subscribe('notifications.send');
redis.subscribe('messages.send');

  redis.on("message", function(channel, data) {
    data = JSON.parse(data);
    console.log(channel);
    if (channel === "notifications.send") {
      console.log("sending new");
      if(data['type'] === "follow") {
        console.log("sending follow");
        io.in('notifications-'+data['key']).emit("newnotification", data);

      } else if(data['type'] === "mention") {

      }
    }

    else if(channel === "messages.send") {
      console.log("message_sent");
      io.in('messaging-'+data['conversation_key']).emit("newmessage", data);
    }
  });


  // On every new connection, we emit a welcome event.


/**
redis.subscribe('test-channel', function(err, count) {

});


redis.on('message', function(channel, message) {
   console.log('Message Recieved: ' + message);

    message = JSON.parse(message);

    io.emit(channel + ':' + message.event, message.data);

});

http.listen(3000, function(){
    console.log('Listening on Port 3000');
});
**/
