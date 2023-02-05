<?php

namespace Main\UniqueSymbols;

use Exception;

class FindValue
{
    private string $value;
    private ?CacheClass $cache;
    private ?UniqueSymbolsClass $symbols;

    public function __construct(?CacheClass $cache,?UniqueSymbolsClass $symbols,string $value)
    {
        $this->symbols = $symbols;
        $this->cache = $cache;
        $this->value = $value;
    }

    /**
     * @throws Exception
     */
    public function findOrCompute(): int
    {
        if ($this->cache->hasKey($this->value)) {
            echo 'caching';
            return $this->cache->get($this->value);
        } else {
            echo 'computing';
            $result = $this->symbols->getUniqueSymbols($this->value);
            $this->cache->set($this->value, $this->symbols->getUniqueSymbols($this->value));
            return $result;
        }
    }
}
