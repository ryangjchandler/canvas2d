<?php

namespace Imagewind\Styles;

class Style
{
    public function __construct(
        public ?int $width = null,
        public ?int $height = null,
        public ?string $backgroundColor = null,
        public ?string $color = null,
        public ?string $fontFamily = null,
        public ?int $fontSize = null,
        public ?FontWeight $fontWeight = null,
        public ?TextDecoration $textDecoration = null,
        public ?TextTransform $textTransform = null,
        public ?TextAlign $textAlign = null,
        public ?Margin $margin = null,
        public ?Padding $padding = null,
        public ?Space $space = null,
    ) {}
}
