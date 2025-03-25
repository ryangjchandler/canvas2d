<?php

namespace Imagewind\Html\Nodes;

class ClassList
{
    /**
     * @param string[] $classes
     */
    public function __construct(
        protected array $classes = [],
    ) {}

    /**
     * @param string[] $classes
     */
    public function contains(string $class): bool
    {
        return in_array($class, $this->classes, strict: true);
    }

    /**
     * @return string[]
     */
    public function all(): array
    {
        return $this->classes;
    }
}
