<?php
declare(strict_types=1);

namespace Parentheses;

class Validator
{
    /**
     * @var LexerInterface
     */
    private $lexer;

    /**
     * @param LexerInterface $lexer
     */
    public function __construct(LexerInterface $lexer)
    {
        $this->lexer = $lexer;
    }

    /**
     * @param $string
     *
     * @return bool
     */
    public function validate($string)
    {
        $opened = $closed = 0;
        $openToken = new Token(Token::OPEN_PARENTHESES);
        $closeToken = new Token(Token::CLOSE_PARENTHESES);
        foreach ($this->lexer->getTokens($string) as $token) {
            if ($token == $openToken) {
                $opened++;
            } elseif ($token == $closeToken) {
                $closed++;
            }

            if ($closed > $opened) {
                return false;
            }
        }

        return $closed == $opened;
    }
}
