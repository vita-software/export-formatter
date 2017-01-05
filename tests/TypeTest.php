<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Tests;

use PHPUnit_Framework_TestCase as TestCase;
use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Field;

/**
 * Class TypeTest
 * @package Knife\ExportFormatter
 */
abstract class TypeTest extends TestCase
{

    protected function isValid(int $min, int $max, $value): bool
    {
        return $this->type->isValid($this->createField($min, $max), $value);
    }

    protected function maskValue($value, int $min = 1, int $max = 5, $fixed = false): string
    {
        $field = $this->createField($min, $max);
        $archive = $this->createArchive($fixed);

        return $this->type->mask($archive, $field, $value);
    }

    protected function createArchive($fixed = false): Archive
    {
        $archive = $this->prophesize(Archive::class);
        $archive->isFixed()->willReturn($fixed);

        return $archive->reveal();
    }

    protected function createField(int $min = 1, int $max = 5): Field
    {
        $field = $this->prophesize(Field::class);

        $field->getMaximumLength()->willReturn($max);
        $field->getMinimumLength()->willReturn($min);

        return $field->reveal();
    }
}