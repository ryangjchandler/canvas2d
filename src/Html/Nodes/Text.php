<?php

namespace Imagewind\Html\Nodes;

class Text implements Node
{
    public function __construct(
        public string $content,
    ) {}
}
