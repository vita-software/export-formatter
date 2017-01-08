<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

/**
 * Class Group
 * @package Vita\ExportFormatter
 */
class Group
{
    /**
     * @var Line[]
     */
    protected $lines;

    /**
     * @var array
     */
    protected $data;

    /**
     * Group constructor.
     * @param Line[] $lines
     * @param array $data
     */
    public function __construct(array $lines, array $data)
    {
        $this->lines = $lines;
        $this->data = $data;
    }

    /**
     * @return Line[]
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }


}