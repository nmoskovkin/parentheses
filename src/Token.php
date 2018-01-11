<?php
declare(strict_types=1);

namespace Parentheses;

use MyCLabs\Enum\Enum;

class Token extends Enum
{
    const OPEN_PARENTHESES = '(';
    const CLOSE_PARENTHESES = ')';
    const NEW_LINE = "\n";
    const TAB = "\t";
    const CARRIAGE_RETURN = "\r";
}
