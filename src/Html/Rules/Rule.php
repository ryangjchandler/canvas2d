<?php

namespace Imagewind\Html\Rules;

use Imagewind\Html\Nodes\ClassList;
use Imagewind\Html\Nodes\Node;

interface Rule
{
    public function shouldValidate(Node | ClassList $node): bool;

    /**
     * @throws \Imagewind\Exceptions\HtmlValidationException
     */
    public function validate(Node | ClassList $node): void;
}
