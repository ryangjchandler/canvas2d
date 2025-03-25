<?php

namespace Imagewind\Html\Nodes;

interface HasChildren
{
    /**
     * @return Node[]
     */
    public function children(): array;
}
