<?php

use Imagewind\Exceptions\HtmlValidationException;
use Imagewind\Html\Parser;
use Imagewind\Html\Validator;

describe('ValidImgSrcRule', function () {
    it('validates img src URLs', function () {
        $node = (new Parser)->parse('<img src="https://example.com/image.jpg">');

        expect(fn() => (new Validator)->validate($node))
            ->toThrow(HtmlValidationException::class, 'URLs are not supported as `src` attributes for <img> elements.');
    });

    it('validates unreadable img src files', function () {
        $node = (new Parser)->parse('<img src="foo.jpg">');

        expect(fn() => (new Validator)->validate($node))
            ->toThrow(HtmlValidationException::class, 'The `src` attribute for an <img> element must be a readable file.');
    });

    it('validates empty img src attributes', function () {
        $node = (new Parser)->parse('<img src="">');

        expect(fn() => (new Validator)->validate($node))
            ->toThrow(HtmlValidationException::class, 'An <img> element must have a non-empty src attribute.');
    });
});
