<?php
declare(strict_types=1);

namespace Parentheses\Tests;

use Parentheses\Token;
use PHPUnit\Framework\TestCase;

final class LexerTest extends TestCase
{
    /**
     * @dataProvider getTokensProvider
     */
    public function testGetTokens($string, $expected)
    {
        $lexer = new \Parentheses\Lexer();
        $this->assertEquals($expected, $lexer->getTokens($string));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testException()
    {
        $lexer = new \Parentheses\Lexer();
        $lexer->getTokens('(abcd123)');
    }

    public function getTokensProvider()
    {
        return [
            ['(', [new Token(Token::OPEN_PARENTHESES)]],
            [
                "(\n\r\t)",
                [
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::NEW_LINE),
                    new Token(Token::CARRIAGE_RETURN),
                    new Token(Token::TAB),
                    new Token(Token::CLOSE_PARENTHESES)
                ]
            ],
        ];
    }
}
