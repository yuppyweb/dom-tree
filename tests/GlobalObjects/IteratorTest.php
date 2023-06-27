<?php declare(strict_types=1);

namespace DOMTree\Tests\GlobalObjects;

use DOMTree\GlobalObjects\Iterator;
use PHPUnit\Framework\TestCase;

class IteratorTest extends TestCase
{
    /**
     * @dataProvider iteratorDataProvider
     */
    public function testIterator(array $data, array $expectedResult): void
    {
        $actualResult = [];
        $iterator = new Iterator($data);

        foreach ($iterator as $key => $value) {
            $actualResult[$key] = $value;
        }

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @dataProvider nextDataProvider
     */
    public function testNext(array $data, array $expectedResult): void
    {
        $actualResult = [];
        $iterator = new Iterator($data);

        $actualResult[] = $iterator->next();
        $actualResult[] = $iterator->next();
        $actualResult[] = $iterator->next();

        $this->assertEquals($expectedResult, $actualResult);
    }

    public static function iteratorDataProvider(): array
    {
        return [
            [
                [],
                []
            ],
            [
                [1],
                [1]
            ],
            [
                [1, 2, 3, 5, 7],
                [1, 2, 3, 5, 7]
            ],
            [
                [1 => 'php', 3 => 'js', 'test' => 5],
                [1 => 'php', 3 => 'js', 'test' => 5]
            ],
        ];
    }

    public static function nextDataProvider(): array
    {
        return [
            [
                [],
                [
                    (object)['value' => null, 'done' => true],
                    (object)['value' => null, 'done' => true],
                    (object)['value' => null, 'done' => true],
                ]
            ],
            [
                [1],
                [
                    (object)['value' => 1, 'done' => true],
                    (object)['value' => null, 'done' => true],
                    (object)['value' => null, 'done' => true],
                ]
            ],
            [
                [1, 2],
                [
                    (object)['value' => 1, 'done' => false],
                    (object)['value' => 2, 'done' => true],
                    (object)['value' => null, 'done' => true],
                ]
            ],
            [
                [1 => 'php', 3 => 'js', 'test' => 5],
                [
                    (object)['value' => 'php', 'done' => false],
                    (object)['value' => 'js', 'done' => false],
                    (object)['value' => 5, 'done' => true],
                ]
            ],
        ];
    }
}
