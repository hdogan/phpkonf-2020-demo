<?php

use Swoole\Coroutine\Channel;

Co\run(function () {
    $channel = new Channel();

    for ($i = 0; $i < 10; $i++) {
        go(function () use ($i, $channel) {
            // Birşeyler yaptık...
            Co::sleep(mt_rand(1, 3));
            $channel->push("$i. nolu işlem sonucu.\n");
        });
    }

    for ($i = 0; $i < 10; $i++) {
        echo $channel->pop();
    }
});
