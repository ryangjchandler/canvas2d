<?php

namespace Imagewind\Html\Nodes;

/** @internal */
class P implements Node, HasChildren, HasClasses
{
    /**
     * @param Node[] $children
     */
    public function __construct(
        public array $children = [],
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
