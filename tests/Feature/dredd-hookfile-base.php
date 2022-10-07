<?php

use App\Kernel;
use Dredd\Hooks;

require __DIR__ . '/../../vendor/autoload.php';

$kernel = new Kernel('test',false);
$kernel->boot();

Hooks::beforeEach(function (&$transaction) {
    echo 'before each hook handled' . PHP_EOL;
});

Hooks::afterEach(function (&$transaction) {
    echo 'after each hook handled' . PHP_EOL;
});
