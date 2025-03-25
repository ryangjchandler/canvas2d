<?php

namespace Imagewind\Exceptions;

use Exception;

class UnreachableException extends Exception
{
    public function __construct()
    {
        parent::__construct('Entered unreachable code.');
    }
}
