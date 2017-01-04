<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

use PHPUnit_Framework_TestCase as TestCase;

/**
 * Class LengthTest
 * @package Vita\ExportFormatter
 */
class LengthTest extends TestCase
{
    public function testGetMinimumMustReturnMinimum()
    {
        $length = $this->createLength(2);
        $this->assertEquals(2, $length->getMinimum());
    }

    public function testGetMaximumMustReturnMaximum()
    {
        $length = $this->createLength(2, 10);
        $this->assertEquals(10, $length->getMaximum());
    }

    protected function assertPreConditions()
    {
        $this->assertInstanceOf(Length::class, $this->createLength());
    }

    protected function createLength($min = 1, $max = 10): Length
    {
        return new Length($min, $max);
    }
}
