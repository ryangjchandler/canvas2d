<?php

use Imagewind\Html\Nodes\Div;
use Imagewind\Html\Nodes\P;
use Imagewind\Html\Nodes\Span;
use Imagewind\Html\Nodes\Text;
use Imagewind\Html\Parser;

it('can parse text nodes', function () {
    $result = (new Parser)->parse('Hello, world!');

    expect($result)
        ->toBeInstanceOf(Text::class)
        ->toHaveProperty('content', 'Hello, world!');
});

it('can parse div nodes', function () {
    $result = (new Parser)->parse('<div></div>');

    expect($result)
        ->toBeInstanceOf(Div::class)
        ->toHaveProperty('children', []);
});

it('can parse p nodes', function () {
    $result = (new Parser)->parse('<p></p>');

    expect($result)
        ->toBeInstanceOf(P::class)
        ->toHaveProperty('children', []);
});

it('can parse img nodes', function () {
    $result = (new Parser)->parse('<img src="foo.jpg">');

    expect($result)
        ->toHaveProperty('src', 'foo.jpg');
});

it('can parse span nodes', function () {
    $result = (new Parser)->parse('<span></span>');

    expect($result)
        ->toBeInstanceOf(Span::class)
        ->toHaveProperty('children', []);
});

it('can parse nested structures', function () {
    $result = (new Parser)->parse('<div><p>Hello, world!</p></div>');

    expect($result)
        ->toEqualCanonicalizing(new Div([new P([new Text('Hello, world!')])]));
});

it('can create a class list for a node', function () {
    $result = (new Parser)->parse('<div class="foo bar baz"></div>');

    expect($result->classes->all())
        ->toEqual(['foo', 'bar', 'baz']);
});
