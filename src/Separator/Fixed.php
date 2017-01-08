<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Separator;

use Vita\ExportFormatter\Separator;

/**
 * Class Fixed
 * @package Vita\ExportFormatter\Separator
 */
class Fixed implements Separator
{
    public function isFixed(): bool
    {
        return true;
    }

    public function getSeparator(): string
    {
        return '';
    }

    public function getNewLineCharacter(): string
    {
        return PHP_EOL;
    }

}