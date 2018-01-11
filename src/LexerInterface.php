<?php
declare(strict_types=1);

namespace Parentheses;

interface LexerInterface
{
    /**
     * @param $string
     *
     * @return array
     */
    public function getTokens($string): array;
}
