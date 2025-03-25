<?php

namespace Imagewind\Html\Nodes;

/** @internal */
class Div implements Node
{
    /**
     * @param Node[] $children
     */
    public function __construct(
        public array $children = [],
        public ClassList $classes = new ClassList(),
    ) {}
}
