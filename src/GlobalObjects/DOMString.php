<?php declare(strict_types=1);

namespace DOMTree\GlobalObjects;

final class DOMString
{
    private string $value;

    public readonly int $length;

    public function __construct($value = '')
    {
        $this->value = (string)$value;
        $this->length = strlen($this->value);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
