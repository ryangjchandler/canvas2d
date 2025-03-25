<?php

namespace Imagewind\Html\Nodes;

class Img implements Node, HasClasses
{
    public function __construct(
        public string $src,
        public ClassList $classes = new ClassList(),
    ) {}

    public function classes(): ClassList
    {
        return $this->classes;
    }
}
