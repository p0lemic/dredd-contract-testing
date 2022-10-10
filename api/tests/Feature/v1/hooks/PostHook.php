<?php

declare(strict_types=1);

namespace App\Tests\Feature\v1\hooks;

use App\Tests\Feature\AbstractDreddHook;

class PostHook extends AbstractDreddHook
{
    public function handle()
    {
        $this->before('/product > GET > 200 > application/json', 'product');
    }

    public function product(&$transaction)
    {
        echo "/product > GET > 200 > application/json";
    }
}
