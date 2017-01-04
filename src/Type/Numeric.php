<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Type;

use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Field;
use Vita\ExportFormatter\Type;

/**
 * Class Numeric
 * @package Vita\ExportFormatter\Type
 */
class Numeric implements Type
{
    const NUMERIC = 'numeric';

    public function getName(): string
    {
        return self::NUMERIC;
    }

    public function isValid(Field $field, $value): bool
    {
        if (is_numeric($value)) {
            return false;
        }

        return $field;
    }

    public function mask(Archive $archive, Field $field, $value): string
    {
        // TODO: Implement mask() method.
    }

}