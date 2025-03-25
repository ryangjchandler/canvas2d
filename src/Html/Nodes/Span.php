<?php

namespace Imagewind\Html\Nodes;

class Span implements Node, HasChildren, HasClasses
{
    public function __construct(
        public array $children,
        public ClassList $classes = new ClassList(),
    ) {}

    public function children(): array
    {
        return $this->children;
    }

    public function classes(): ClassList
    {
        return $this->classes;
    }
}
