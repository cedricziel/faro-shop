<?php

namespace App\O11y;

use Symfony\Component\Messenger\Stamp\StampInterface;

class OpenTelemetryStamp implements StampInterface, \ArrayAccess
{
    private array $carrier;

    public function __construct()
    {
        $this->carrier = [];
    }

    public function offsetExists(mixed $offset): bool
    {
        return $this->carrier[$offset] ?? false;
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->carrier[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->carrier[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->carrier[$offset]);
    }
}
