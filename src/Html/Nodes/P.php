<?php

namespace Imagewind\Html\Nodes;

/** @internal */
class P implements Node
{
    /**
     * @param Node[] $children
     */
    public function __construct(
        public array $children = [],
        public ClassList $classes = new ClassList(),
    ) {}
}
