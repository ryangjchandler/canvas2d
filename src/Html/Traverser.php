<?php

namespace Imagewind\Html;

use Closure;
use Imagewind\Html\Nodes\HasChildren;
use Imagewind\Html\Nodes\HasClasses;
use Imagewind\Html\Nodes\Node;

readonly class Traverser
{
    /**
     * @param Closure(Node | ClassList): void $callback
     */
    public function traverse(Node $node, Closure $callback): void
    {
        $callback($node);

        if ($node instanceof HasClasses) {
            $callback($node->classes());
        }

        if ($node instanceof HasChildren) {
            foreach ($node->children() as $child) {
                $this->traverse($child, $callback);
            }
        }
    }
}
