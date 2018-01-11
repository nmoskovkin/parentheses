<?php
declare(strict_types=1);

namespace Parentheses\Tests;

use Parentheses\Token;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_Builder_InvocationMocker;

final class ValidatorTest extends TestCase
{
    /**
     * @dataProvider validateDataProvider
     */
    public function testValidate($tokens, $expectedValidateResult)
    {

        /** @var \Parentheses\Lexer|PHPUnit_Framework_MockObject_Builder_InvocationMocker $lexer */
        $lexer = $this->createMock(\Parentheses\Lexer::class);
        $lexer->method('getTokens')
            ->willReturn($tokens);

        $validator = new \Parentheses\Validator($lexer);
        $validateResult = $validator->validate('The string is doesn\'t metter');
        $this->assertEquals($expectedValidateResult, $validateResult);
    }

    public function validateDataProvider()
    {
        return [
            [
                [
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES)
                ],
                true
            ],
            [
                [
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                ],
                true
            ],
            [
                [
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                ],
                false
            ],
            [
                [
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                ],
                false
            ],
            [
                [
                    new Token(Token::OPEN_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                    new Token(Token::CLOSE_PARENTHESES),
                ],
                false
            ],
        ];
    }
}
