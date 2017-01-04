<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Type;

use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Exception\InvalidValueException;
use Vita\ExportFormatter\Field;
use Vita\ExportFormatter\Type;

/**
 * Class Text
 * @package Vita\ExportFormatter\Type
 */
class Text implements Type
{
    const TEXT = 'Text';

    public function getName(): string
    {
        return static::TEXT;
    }

    public function isValid(Field $field, $value): bool
    {
        $length = $field->getLength();

        if ($length->getMinimum() > strlen($value)) {
            return false;
        } elseif ($length->getMaximum() < strlen($value)) {
            return false;
        }

        return true;
    }

    public function mask(Archive $archive, Field $field, $value): string
    {
        if (!$this->isValid($field, $value)) {
            throw new InvalidValueException();
        }

        return (string) $value;
    }

}