<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

/**
 * Class Line
 * @package Vita\ExportFormatter
 */
class Line
{

    /**
     * @var Field[]
     */
    protected $fields;

    /**
     * Line constructor.
     * @param Field[] $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}