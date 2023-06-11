<?php

declare(strict_types=1);

namespace DOMTree\Abstract;

use DOMTree\NodeList;

abstract class Node
{
    public readonly NodeList $childNodes;
}
