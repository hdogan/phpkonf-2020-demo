<?php
/**
 * Swoole HTTP Server.
 */

use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$server = new Server("0.0.0.0", 80);
$html   = file_get_contents("chat.html");
$html   = str_replace(['{php_version}', '{swoole_version}'], [phpversion(), phpversion('swoole')], $html);

$server->on("request", function (Request $request, Response $response) use ($html) {
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end($html);
});

$server->start();
