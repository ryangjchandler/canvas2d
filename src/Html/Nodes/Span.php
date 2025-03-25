<?php

namespace Imagewind\Html\Nodes;

class Span implements Node
{
    public function __construct(
        public array $children,
        public ClassList $classes = new ClassList(),
    ) {}
}
