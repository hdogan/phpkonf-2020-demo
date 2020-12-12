<?php

use Swoole\Coroutine\Http\Client;

$urls = [
    ['host' => 'github.com', 'port' => 443, 'path' => '/'],
    ['host' => 'hi.do', 'port' => 80, 'path' => '/'],
    ['host' => 'jotform.phpkonf.org', 'port' => 443, 'path' => '/'],
];

Co\run(function () use ($urls) {
    foreach ($urls as $url) {
        go(function () use ($url) {
            $client = new Client($url['host'], $url['port'], ($url['port'] === 443));
            $client->get($url['path']);

            if ($client->statusCode === 200) {
                echo $url['host'] . " is up\n";
            } else {
                echo $url['host'] . " is down\n";
            }

            $client->close();
        });
    }
});
