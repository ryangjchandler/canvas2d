<?php

namespace Imagewind\Html\Nodes;

class Img implements Node
{
    public function __construct(
        public string $src,
        public ClassList $classes = new ClassList(),
    ) {}
}
