<ul id="mes-par" class="collection with-header">
    <li class="collection-header"><h4><?php echo $thread_title['Category']['name']; ?></h4></li>
    <?php foreach($messages as $message): ?>
        <li id="mes-chi" class="collection-item">
            <?php echo $message['Post']['message']; ?>
        </li>
    <?php endforeach; ?>
</ul>

<form class="input-field" id="messageForm">
    <input id="messageInput" type="text" class="input-field" placeHolder="Message" required/>
    <button id="button-form" class="btn waves-effect waves-light" type="submit">
        SUBMIT<i class="mdi-content-send right"></i>
    </button>
</form>




<?php echo $this->Html->script('node_modules/socket.io/node_modules/socket.io-client/socket.io.js'); ?>

<script type="text/javascript">
    var socket = io.connect('http://' + location.hostname + ':8080');

    getParam = function() {
        var param = location.href.match(/\d*$/);
        return param[0];
    }

    $("#messageForm").submit(function() {
        var msg = $("#messageInput").val();

        socket.emit('init', {'room': getParam()});

        var button = $("#button-form");
        button.attr("disabled", true);
        // Ajax call for saving datas
        var json = {
            "message" : msg,
            "category_id" : getParam()
        }
        $.ajax({
            url: "http://" + location.hostname + "/media/posts/add",
            type: "POST",
            data: json,
            success: function(data) {
                socket.emit('message', {message: msg});
                $("#messageInput").val('');
                //console.log(data);
            },
            error: function(data) {
                $("li:last-child").remove();
                alert("通信エラーです。再度ログインするか、しばらく経ってから送信してください。");
            },
            complete: function() {
                button.attr("disabled", false);
            }
        });

        return false;
    });

    socket.on('message', function(data) {
        //console.log(data.message);
        getText = function() {
            // ベタ書きしかできません
            return '<li class="collection-item">' + data.message + '</li>';
        }
        $(getText()).appendTo("#mes-par").hide().fadeIn(1000);
    });
</script>