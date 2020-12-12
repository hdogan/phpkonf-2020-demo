<?php

use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$server = new Server("0.0.0.0", 8080);

$server->on("request", function (Request $request, Response $response) {
    $response->header("Content-Type", "text/html");
    $response->end("It works!\n");
});

$server->start();
