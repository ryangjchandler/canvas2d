<?php

namespace Imagewind\Styles;

class Padding
{
    public function __construct(
        public ?int $t = null,
        public ?int $r = null,
        public ?int $b = null,
        public ?int $l = null,
    ) {}
}
