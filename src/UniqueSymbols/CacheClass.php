<?php

namespace Main\UniqueSymbols;


use Exception;
use Predis\Client;

class CacheClass implements CacheInterface
{

    private Client $redis;

    public function __construct(Client $redis)
    {
        $this->redis = new Client();
    }

    public function set(string $key, int $value): void
    {
        $this->redis->set($key,$value);
    }

    /**
     * @throws Exception
     */
    public function get(string $key): int
    {
        return $this->redis->get($key);
    }

    /**
     * @throws Exception
     */
    public function hasKey(string $key): bool
    {
        return (bool)$this->redis->exists($key);
    }
}

