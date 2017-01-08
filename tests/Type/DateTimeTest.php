<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Tests\Type;

use Vita\ExportFormatter\Tests\TypeTest;
use Vita\ExportFormatter\Type\DateTime;

/**
 * Class DateTimeTest
 * @package Vita\ExportFormatter\Tests\Type
 */
class DateTimeTest extends TypeTest
{

    /**
     * @var DateTime
     */
    protected $type;

    protected function setUp()
    {
        $this->type = new DateTime('Y-m-d', 'd/m/Y');
    }

    protected function assertPreConditions()
    {
        $this->assertInstanceOf(DateTime::class, $this->type);
    }

    public function testGetNameMustReturnTypeName()
    {
        $this->assertEquals(DateTime::DATE_TIME, $this->type->getName());
    }

    public function testIsValidMustReturnTrueWhenTheValueIsAValidDate()
    {
        $this->assertTrue($this->isValid(6, 6, '2016-05-10'));
    }

    public function testIsValidMustReturnFalseWhenTheValueIsADateWithInvalidFormat()
    {
        $this->assertFalse($this->isValid(6, 7, '2016/12/12'));
    }

    public function testMaskReturnDateWithCorrectFormat()
    {
        $this->assertEquals('01/01/2017', $this->maskValue('2017-01-01', 6, 6));
    }
}
