<?php

namespace Imagewind\Exceptions;

use Exception;

class HtmlValidationException extends Exception
{
    public static function make(string $message): self
    {
        return new self($message);
    }
}
