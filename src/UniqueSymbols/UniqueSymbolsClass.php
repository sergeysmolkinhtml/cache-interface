<?php

declare(strict_types=1);


namespace Main\UniqueSymbols;

class UniqueSymbolsClass implements UniqueSymbolsInterface
{
    /**
     * @param string $string
     * @return integer
     */
    public function getUniqueSymbols(string $string): int
    {
        if ($string === '') {
            return 0;
        }

        $computed = self::countCharacters($string);
        $uniqueCharacters = 0;

        foreach ($computed as $character => $total) {
            if ($total === 1) {
                $uniqueCharacters++;
            }
        }

        return $uniqueCharacters;
    }

    private static function countCharacters(string $string): array
    {
        if ($string === '') {
            return [];
        }

        $characters = str_split($string);
        $counted = [];

        foreach ($characters as $character) {
            $counted[$character] = isset($counted[$character]) ? ++$counted[$character] : 1;
        }

        return $counted;
    }
}

