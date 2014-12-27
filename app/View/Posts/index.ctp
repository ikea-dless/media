<div id="messages">
    <?php foreach($messages as $message): ?>
        <li><?php echo $message['Post']['name']; ?> :
        <?php echo $message['Post']['message']; ?></li>
    <?php endforeach; ?>
</div>

<form class="input-field" id="messageForm">
    <input id="nameInput" type="text" class="input-field" placeholder="Name" />
    <input id="messageInput" type="text" class="input-field" placeHolder="Message" />

    <input type="submit" value="Send" />
</form>




<?php echo $this->Html->script('node_modules/socket.io/node_modules/socket.io-client/socket.io.js'); ?>

<script type="text/javascript">
    var socket = io.connect( 'http://192.168.33.11:8080' );

    $("#messageForm").submit(function() {
        var nameVal = $("#nameInput").val();
        var msg = $("#messageInput").val();

        socket.emit('message', {name: nameVal, message: msg});

        // Ajax call for saving datas
        var json = {
            "name" : nameVal,
            "message" : msg
        }
        $.ajax({
            url: "http://" + location.hostname + "/media/posts/add",
            type: "POST",
            data: json,
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
                alert("error " + data);
            }
        });

        return false;
    });

    socket.on('message', function(data) {
//        var actualContent = $( "#messages" ).html();
//        var newMsgContent = '<li> <strong>' + data.name + '</strong> : ' + data.message + '</li>';
//        var content = newMsgContent + actualContent;
//
//        $("#messages").html(content);
        var msg = data.message;
        $("#messages").append($('<li>').text(msg));
    });
</script>