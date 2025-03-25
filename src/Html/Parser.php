<?php

namespace Imagewind\Html;

use Dom\Element as DomElement;
use Dom\HTMLDocument;
use Dom\Node as DomNode;
use Dom\Text as DomText;
use Imagewind\Exceptions\HtmlParserException;
use Imagewind\Html\Nodes\ClassList;
use Imagewind\Html\Nodes\Div;
use Imagewind\Html\Nodes\Img;
use Imagewind\Html\Nodes\Node;
use Imagewind\Html\Nodes\P;
use Imagewind\Html\Nodes\Span;
use Imagewind\Html\Nodes\Text;

use const Dom\HTML_NO_DEFAULT_NS;

/** @internal */
class Parser
{
    /**
     * Parse the given HTML string and return a structured representation.
     * 
     * @throws \Imagewind\Html\ParseException
     */
    public function parse(string $html)
    {
        if (! str_contains($html, '<body>')) {
            $html = "<!DOCTYPE html><body>{$html}</body>";
        }

        $document = HTMLDocument::createFromString($html);
        $body = $document->body;

        if (! $body->hasChildNodes()) {
            throw HtmlParserException::emptyDocument();
        }

        if ($body->childElementCount > 1) {
            throw HtmlParserException::multipleRootNodes();
        }

        return $this->process($body->firstChild);
    }

    protected function process(DomNode $node): Node
    {
        if ($node instanceof DomText) {
            return new Text($node->textContent);
        }

        if (! $node instanceof DomElement) {
            throw HtmlParserException::unsupportedNode($node);
        }

        $children = [];

        if ($node->hasChildNodes()) {
            foreach ($node->childNodes as $child) {
                $children[] = $this->process($child);
            }
        }

        $classes = new ClassList(iterator_to_array($node->classList));

        return match (strtolower($node->tagName)) {
            'div' => new Div($children, $classes),
            'p' => new P($children, $classes),
            'span' => new Span($children, $classes),
            'img' => new Img($node->getAttribute('src'), $classes),
        };
    }
}
