<?php
declare(strict_types=1);

namespace Parentheses;

class Lexer implements LexerInterface
{
    /**
     * @param $string
     *
     * @return array
     */
    public function getTokens($string): array
    {
        mb_internal_encoding('UTF-8');
        $tokens = [];
        $arr = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($arr as $pos => $char) {
            if (!Token::isValid($char)) {
                throw new \InvalidArgumentException("Unexpected symbol $char at position $pos");
            }

            $tokens[] = new Token($char);
        }

        return $tokens;
    }
}
