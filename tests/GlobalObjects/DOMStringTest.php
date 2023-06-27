<?php

declare(strict_types=1);

namespace DOMTree\Tests\GlobalObjects;

use DOMTree\GlobalObjects\DOMString;
use PHPUnit\Framework\TestCase;

class DOMStringTest extends TestCase
{
    /**
     * @dataProvider DOMStringDataProvider
     */
    public function testDOMString($value, int $expectedLength, string $expectedValue): void
    {
        $DOMString = new DOMString($value);

        $this->assertEquals($expectedLength, $DOMString->length);
        $this->assertStringContainsString($expectedValue, (string)$DOMString);
    }

    public static function DOMStringDataProvider(): array
    {
        return [
            ['', 0, ''],
            [[], 5, 'Array'],
            [0, 1, '0'],
            [1, 1, '1'],
            [3.14, 4, '3.14'],
            [true, 1, '1'],
            [false, 0, ''],
            [null, 0, ''],
            [12345, 5, '12345'],
            ['string', 6, 'string'],
            [' DOM Tree ', 10, ' DOM Tree '],
        ];
    }
}
