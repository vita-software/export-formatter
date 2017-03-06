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
        if ($field->getMinimumLength() > strlen($value)) {
            return false;
        } elseif ($field->getMaximumLength() < strlen($value)) {
            return false;
        }

        return true;
    }

    public function mask(Archive $archive, Field $field, $value): string
    {
        $value = $value ?? '';
        
        if (!$this->isValid($field, $value)) {
            throw new InvalidValueException($field->getName());
        }

        if ($archive->isFixed()) {
            $value = str_pad($value, $field->getMaximumLength(), ' ', STR_PAD_RIGHT);
        }

        return (string)strtoupper($value);
    }

}