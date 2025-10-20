<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Throwable;

trait HasLogging
{
    protected function logSuccess(string $method, array $context = []): void
    {
        Log::info(sprintf('%s::%s executed successfully', static::class, $method), $context);
    }

    protected function logError(string $method, Throwable $e, array $context = []): void
    {
        Log::error(sprintf('%s::%s failed: %s', static::class, $method, $e->getMessage()), [
            'exception' => $e,
            'context' => $context,
        ]);
    }

    protected function tryWithLogging(string $method, callable $callback, array $context = [])
    {
        try {
            $result = $callback();
            $this->logSuccess($method, $context);
            return $result;
        } catch (Throwable $e) {
            $this->logError($method, $e, $context);
            throw $e;
        }
    }
}
