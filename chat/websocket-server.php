<?php
/**
 * Swoole WebSocket Server.
 */

use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

$server = new Server("0.0.0.0", 8080);

$server->on("open", function (Server $server, Request $request) {
    $data = json_encode([
        "time"    => time(),
        "message" => "Merhaba!",
    ]);

    $server->push($request->fd, $data);
});

$server->on("message", function (Server $server, Frame $frame) {
    $data = json_encode([
        "time"    => time(),
        "message" => htmlspecialchars($frame->data, ENT_NOQUOTES | ENT_HTML5, "UTF-8"),
    ]);

    foreach ($server->connections as $client) {
        $server->push($client, $data);
    }
});

$server->start();
