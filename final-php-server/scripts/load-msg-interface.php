<?php
    $content = <<<EOD
    <div id="msgUI">
        <div class="content" id="room-list">
            <h5>ROOM LIST</h5>
        </div>
        <div class="content" id="main">
            <h5>CHAT</h5>
            <div id="message-box">
            </div>
            <form id="chat-form">
                <input type="text" name="message" id="input-msg" placeholder="send message ...">
                <input type="submit" value="send" id="submit">
            </form>
        </div>
        <div class="content" id="room-info">
            <h5>ROOM INFO</h5>
        </div>
    </div>
    EOD;