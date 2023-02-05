<?php

declare(strict_types=1);

namespace Tests\UniqueSymbols;

use Main\UniqueSymbols\UniqueSymbolsClass;
use PHPUnit\Framework\TestCase;


class UniqueSymbolsTest extends TestCase
{
    /**
     * @dataProvider provideSimpleData
     */
    public function testMainMethod(int $expectedOutput, string $input): void
    {
        $output = (new UniqueSymbolsClass())->findOrCompute($input);

        self::assertSame($expectedOutput, $output);
    }

    public function provideSimpleData(): array
    {
        return [
            'data_1' => [ 3, 'abbbccdf' ],
            'data_2' => [ 2, 'abc1cb' ],
            'empty'  => [ 0, '' ],
        ];
    }

    /**
     * @dataProvider provideSingleString
     */
    public function testThatCacheDidntBrokeSomething(string $input): void
    {
        $counter = new UniqueSymbolsClass();

        $result1 = $counter->findOrCompute($input);
        $result2 = $counter->findOrCompute($input);

        self::assertSame($result1, $result2);
    }

    public function provideSingleString(): array
    {
        return [
            ['abcb'],
            ['aabbccd'],
        ];
    }
}
