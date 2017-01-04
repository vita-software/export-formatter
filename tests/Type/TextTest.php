<?php
declare(strict_types = 1);
namespace Vita\ExportFormatter\Type;

use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Field;
use Vita\ExportFormatter\Length;

/**
 * Class TextTest
 * @package Vita\ExportFormatter\Type
 */
class TextTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Text
     */
    protected $type;

    public function setUp()
    {
        $this->type = new Text();
    }

    public function assertPreConditions()
    {
        $this->assertInstanceOf(Text::class, $this->type);
    }

    public function testGetNameMustReturnTheTypeName()
    {
        $this->assertEquals(Text::TEXT, $this->type->getName());
    }

    public function testIsValidMustReturnTrueWhenTheValueIsWithTheCorrectLenght()
    {
        $this->assertTrue($this->isValid(1, 4, 'Bla'));
    }

    public function testIsValidMustReturnFalseWhenTheValueLengthIsLessThanMinimum()
    {
        $this->assertFalse($this->isValid(5, 10, 'A'));
    }

    public function testIsValidMustReturnFalseWhenTheValueLengthIsGreaterThanMaximum()
    {
        $this->assertFalse($this->isValid(1, 2, 'ABB'));
    }

    /**
     * @expectedException \Vita\ExportFormatter\Exception\InvalidValueException
     */
    public function testMaskInvalidValueMustThrowInvalidValueException()
    {
        $this->maskValue('AAAAAAAAAAAAAAAA');
    }

    public function testMaskMustReturnStringOnUppercase()
    {
        $maskedValue = $this->maskValue('ABC', 1, 3);

        $this->assertEquals('ABC', $maskedValue);
    }

    protected function isValid(int $min, int $max, string $value): bool
    {
        return $this->type->isValid($this->createField($min, $max), $value);
    }

    protected function maskValue(string $value, int $min = 1, int $max = 5): string
    {
        $field = $this->createField($min, $max);
        $archive = $this->createArchive();

        return $this->type->mask($archive, $field, $value);
    }

    protected function createLength(int $min, int $max): Length
    {
        return new Length($min, $max);
    }

    protected function createArchive(): Archive
    {
        $archive = $this->prophesize(Archive::class);

        return $archive->reveal();
    }

    protected function createField(int $min = 1, int $max = 5): Field
    {
        $length = $this->createLength($min, $max);

        $field = $this->prophesize(Field::class);
        $field->getLength()->willReturn($length);
        return $field->reveal();
    }
}
