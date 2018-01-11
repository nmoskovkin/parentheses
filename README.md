This lib checks parentheses inside a string.

Usage:
$lexer = new \Parentheses\Lexer();

$validator = new \Parentheses\Validator($lexer);

$validator->validate('()'); 
