<?php declare(strict_types=1);

namespace DOMTree;

use DOMTree\Abstract\Node;
use DOMTree\GlobalObjects\Iterator;

final class NodeList
{
    /**
     * @var Node[]
     */
    private array $nodeList;

    public readonly int $length;

    /**
     * @param Node[] $nodeList
     */
    public function __construct(array $nodeList = [])
    {
        $this->nodeList = array_map(
            fn (Node $node): Node => $node,
            $nodeList
        );
        $this->length = count($this->nodeList);
    }

    public function item($index): ?Node
    {
        return $this->nodeList[$index] ?? null;
    }

    public function entries(): Iterator
    {
        return new Iterator($this->nodeList);
    }

    /**
     * @param callable(Node $currentValue, int $index, Node[] $array): void $callback
     * @return void
     */
    public function forEach(callable $callback): void
    {
        foreach ($this->nodeList as $index => $node) {
            $callback($node, $index, $this->nodeList);
        }
    }

    public function keys(): Iterator
    {
        return new Iterator(array_keys($this->nodeList));
    }

    public function values(): Iterator
    {
        return new Iterator(array_values($this->nodeList));
    }
}
