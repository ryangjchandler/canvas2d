<?php

namespace Imagewind\Styles;

class Space
{
    public function __construct(
        public ?int $x = null,
        public ?int $y = null,
    ) {}
}
