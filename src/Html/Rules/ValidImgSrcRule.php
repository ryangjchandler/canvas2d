<?php

namespace Imagewind\Html\Rules;

use Imagewind\Exceptions\HtmlValidationException;
use Imagewind\Exceptions\UnreachableException;
use Imagewind\Html\Nodes\Node;
use Imagewind\Html\Nodes\ClassList;
use Imagewind\Html\Nodes\Img;

class ValidImgSrcRule implements Rule
{
    public function shouldValidate(Node|ClassList $node): bool
    {
        return $node instanceof Img;
    }

    public function validate(Node|ClassList $node): void
    {
        if (! $node instanceof Img) {
            throw new UnreachableException();
        }

        if ($node->src === '') {
            throw HtmlValidationException::make('An <img> element must have a non-empty src attribute.');    
        }

        if (filter_var($node->src, FILTER_VALIDATE_URL) !== false) {
            throw HtmlValidationException::make('URLs are not supported as `src` attributes for <img> elements.');
        }

        if (! is_readable($node->src)) {
            throw HtmlValidationException::make('The `src` attribute for an <img> element must be a readable file.');
        }
    }
}
