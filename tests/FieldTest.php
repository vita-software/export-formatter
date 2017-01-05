<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Tests;

use PHPUnit_Framework_TestCase as TestCase;

/**
 * Class FieldTest
 * @package Vita\ExportFormatter
 */
class FieldTest
{

    /**
     * @var Type
     */
    protected $type;

    /**
     * @var Length
     */
    protected $length;

    /**
     * @var array
     */
    protected $options = [];

    protected function setUp()
    {

    }

    protected function createField(string $name, int $sequence)
    {
        return new Field($name, $sequence);
    }
}
