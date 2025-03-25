<?php

use Imagewind\Html\Nodes\ClassList;
use Imagewind\Html\Nodes\Div;
use Imagewind\Html\Nodes\Node;
use Imagewind\Html\Nodes\Span;
use Imagewind\Html\Nodes\Text;
use Imagewind\Html\Parser;
use Imagewind\Html\Traverser;

it('traverses nodes', function () {
    $node = (new Parser)->parse('<div><span class="foo">Hello, world!</span></div>');
    $buffer = [];

    (new Traverser)->traverse($node, function (Node | ClassList $node) use (&$buffer) {
        $buffer[] = $node::class;
    });

    expect($buffer)
        ->toBe([
            Div::class,
            ClassList::class,
            Span::class,
            ClassList::class,
            Text::class,
        ]);
});
