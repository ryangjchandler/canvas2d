<?php

namespace Imagewind\Html;

use Imagewind\Html\Nodes\ClassList;
use Imagewind\Html\Nodes\Node;
use Imagewind\Html\Rules\ValidImgSrcRule;

readonly class Validator
{
    /**
     * @var Rules\Rule[]
     */
    private array $rules;

    public function __construct()
    {
        $this->rules = [
            new ValidImgSrcRule,
        ];
    }

    public function validate(Node $node): void
    {
        $traverser = new Traverser;

        $traverser->traverse($node, function (Node | ClassList $node): void {
            foreach ($this->rules as $rule) {
                if (! $rule->shouldValidate($node)) {
                    continue;
                }

                $rule->validate($node);
            }
        });
    }
}
