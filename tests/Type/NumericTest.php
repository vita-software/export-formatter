<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Tests\Type;

use Vita\ExportFormatter\Tests\TypeTest;
use Vita\ExportFormatter\Type\Numeric;

/**
 * Class NumericTest
 * @package Knife\ExportFormatter\Type
 */
class NumericTest extends TypeTest
{

    /**
     * @var Numeric
     */
    protected $type;

    protected function setUp()
    {
        $this->type = new Numeric(2, '.', '');
    }

    protected function assertPreConditions()
    {
        $this->assertInstanceOf(Numeric::class, $this->type);
    }

    public function testGetPrecisionMustReturnThePrecision()
    {
        $this->assertEquals(2, $this->type->getPrecision());
    }

    public function testGetDecimalSeparatorMustReturnTheDecimalSeparator()
    {
        $this->assertEquals('.', $this->type->getDecimalSeparator());
    }

    public function testGetThousandSeparatorMustReturnTheThousandSeparator()
    {
        $this->assertEquals('', $this->type->getThousandSeparator());
    }

    public function testGetNameMustReturnTheNameOfTypeNumeric()
    {
        $this->assertEquals(Numeric::NUMERIC, $this->type->getName());
    }

    public function testIsValidMustReturnTrueWhenTheValueIsValid()
    {
        $this->assertTrue($this->isValid(1, 30, 100));
    }

    public function testIsValidMustReturnFalseWhenTheValueIsNotNumeric()
    {
        $this->assertFalse($this->isValid(1, 5, 'AB'));
    }

    public function testMaskMustReturnTheValueWithDots()
    {
        $this->assertEquals('100.00', $this->maskValue(100));
    }

    public function testMaskMustReturnTheValueWithZerosToLeftWhenTheArchiveSeparatorIsFixed()
    {
        $this->assertSame('00100.00', $this->maskValue(100, 1, 8, true));
    }
}
