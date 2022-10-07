<?php

declare(strict_types=1);

namespace App\Tests\Feature;

use Dredd\Hooks;

abstract class AbstractDreddHook
{
    abstract public function handle();

    protected function before(string $path, $methodOrCallable)
    {
        if (is_callable($methodOrCallable)) {
            Hooks::before($path, $methodOrCallable);

            return null;
        }

        $this->methodExists($methodOrCallable);
        Hooks::before($path, function(&$transaction) use ($methodOrCallable) {
            return $this->{$methodOrCallable}($transaction);
        });
    }

    private function methodExists(string $methodName): void
    {
        if (!method_exists($this, $methodName)) {
            throw new \InvalidArgumentException(sprintf('Method does not exist: %s::%s', get_class($this), $methodName));
        }
    }
}
