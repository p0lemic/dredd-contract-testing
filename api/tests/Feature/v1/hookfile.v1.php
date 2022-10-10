<?php

use App\Tests\Feature\v1\hooks\PostHook;

require_once __DIR__ . '/../dredd-hookfile-base.php';

$hooks = [
    PostHook::class,
];

foreach ($hooks as $hook) {
    (new $hook())->handle();
}
