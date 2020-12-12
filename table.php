<?php

use Swoole\Table;

$table = new Table(1024);
$table->column("id", Table::TYPE_INT);
$table->column("name", Table::TYPE_STRING, 50);
$table->create();

$table->set("hido", ["id" => 1, "name" => "Hidayet Doğan"]);

$table["diger_hido"] = ["id" => 2, "name" => "Hidayet Ok"];

var_dump($table->get("hido"));

var_dump($table["diger_hido"]);

foreach ($table as $row) {
    var_dump($row);
}
