<?php

namespace Imagewind\Exceptions;

use Dom\Node;
use Exception;

class HtmlParserException extends Exception
{
    public static function multipleRootNodes(): self
    {
        return new self('The document must only have a single root node.');
    }

    public static function emptyDocument(): self
    {
        return new self('The document cannot be empty.');
    }

    public static function unsupportedNode(Node $node): self
    {
        return new self(sprintf('Unsupported node type: %s', get_class($node)));
    }
}
