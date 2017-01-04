<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

/**
 * Interface Type
 * @package Vita\ExportFormatter
 */
interface Type
{
    public function getName(): string;

    public function isValid(Field $field, $value): bool;

    public function mask(Archive $archive, Field $field, $value): string;
}