<?php

use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

$server = new Server("0.0.0.0", 8080);

$server->on("message", function (Server $server, Frame $frame) {
    $server->push($frame->fd, "Someone said: " . $frame->data);
});

$server->start();
