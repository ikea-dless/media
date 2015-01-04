<style>
</style>

<ul id="mes-par" class="collection with-header">
    <li class="collection-header"><h4><?php echo $thread_title['Category']['name']; ?></h4></li>
    <?php foreach($messages as $message): ?>
        <li id="mes-chi" class="collection-item"><a class="tooltipped" data-position="left" data-tooltip="解決する？" id="nav4" href="../../projects/add/<?php echo $message['Post']['id']; ?>">
            <div style="color: #b8b8b8">
                ID: <?php echo h($message['User']['username']); ?>
            </div>
            <?php //echo $this->Html->link($message['Post']['message'], array('controller' => 'projects', 'action' => 'add', $message['Post']['id'])); ?>
            <p style="color: black"><?php echo h($message['Post']['message']); ?></p>
            <div style="text-align: right; color: #b8b8b8;">
                <?php echo $message['Post']['created']; ?>
            </div>
        </a></li>
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
    $("#mes-chi").ready(function(){
        $('.tooltipped').tooltip({"delay": 50});
    });

    window.onload = function() {
        $.ajax({
            url: "../../users/getId",
            type: "GET",
            //data: json,
            success: function(data) {
                //console.log(data);
                uname = data;
            },
            error: function (data) {
            }
        });
    };

    var socket = io.connect('http://' + location.hostname + ':8080');

    getParam = function() {
        var param = location.href.match(/\d*$/);
        return param[0];
    }
    socket.emit('init', {'room': getParam()});

    $("#messageForm").submit(function() {
        var msg = $("#messageInput").val();

        var button = $("#button-form");
        button.attr("disabled", true);

        var json = {
            "message" : msg,
            "category_id" : getParam()
        }
        $.ajax({
            url: "../../posts/add",
            type: "POST",
            data: json,
            success: function(data) {
                socket.emit('message', {message: msg, username: uname});
                $("#messageInput").val('');
            },
            error: function(data) {
                alert("通信エラーです。再度ログインするか、しばらく経ってから送信してください。");
            },
            complete: function() {
                button.attr("disabled", false);
            }
        });

        return false;
    });

    socket.on('message', function(data) {
        //console.log(data);
        getStrTime = function() {
            var dd = new Date();
            return dd.getFullYear() + '-' + dd.getMonth()+1 + '-' + dd.getDate() + ' ' + dd.getHours() + ':' + dd.getMinutes() + ':' + dd.getSeconds();
        };
        getText = function() {
            return '<li class="collection-item"><div style="color: #b8b8b8">ID: ' + data.username + '<br> </div>'
                + data.message + '<div style="text-align: right; color: #b8b8b8;">' + getStrTime() + '</div></li>';
        };
        $(getText()).appendTo("#mes-par").hide().fadeIn(1000);
    });
</script>