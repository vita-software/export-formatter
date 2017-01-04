<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

/**
 * Interface Separator
 * @package Vita\ExportFormatter
 */
interface Separator
{
    public function isFixed(): bool;

    public function getSeparator(): string;

    public function getNewLineCharacter(): string;

}