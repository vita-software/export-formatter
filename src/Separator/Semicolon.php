<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Separator;

use Vita\ExportFormatter\Separator;

/**
 * Class Semicolon
 * @package Vita\ExportFormatter\Separator
 */
class Semicolon implements Separator
{
    const SEMICOLON = ';';

    public function isFixed(): bool
    {
        return false;
    }

    public function getSeparator(): string
    {
        return self::SEMICOLON;
    }

    public function getNewLineCharacter(): string
    {
        return PHP_EOL;
    }
}