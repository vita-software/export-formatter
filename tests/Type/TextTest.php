<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Tests\Type;

use Vita\ExportFormatter\Tests\TypeTest;
use Vita\ExportFormatter\Type\Text;

/**
 * Class TextTest
 * @package Vita\ExportFormatter\Type
 */
class TextTest extends TypeTest
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
        $maskedValue = $this->maskValue('abc', 1, 3);

        $this->assertEquals('ABC', $maskedValue);
    }

    public function testMaskMustReturnStringWithSpacesWhenSeparatorIsFixed()
    {
        $maskedValue = $this->maskValue('ABC', 1, 5, true);

        $this->assertEquals('ABC  ', $maskedValue);
    }

}
