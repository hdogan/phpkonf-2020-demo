<?php

use Swoole\Coroutine\WaitGroup;

Co\run(function () {
    $waitgroup = new WaitGroup();
    $results   = [];

    for ($i = 0; $i < 10; $i++) {
        go(function () use ($i, $waitgroup, &$results) {
            $waitgroup->add();

            // Birşeyler yaptık...
            Co::sleep(mt_rand(1, 3));
            $results[] = "$i. nolu işlem sonucu.\n";

            $waitgroup->done();
        });
    }

    $waitgroup->wait();

    foreach ($results as $result) {
        echo $result;
    }
});
