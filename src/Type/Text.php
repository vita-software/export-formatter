<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Type;

use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Field;
use Vita\ExportFormatter\Type;

/**
 * Class Text
 * @package Vita\ExportFormatter\Type
 */
class Text implements Type
{
    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function isValid(Field $field, $value): bool
    {
        // TODO: Implement isValid() method.
    }

    public function mask(Archive $archive, Field $field, $value): string
    {
        // TODO: Implement mask() method.
    }

}