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
     * @var string
     */
    protected $name;

    /**
     * @var Field[]
     */
    protected $fields;

    /**
     * Line constructor.
     * @param string $name
     * @param Field[] $fields
     */
    public function __construct(string $name, array $fields)
    {
        $this->name = $name;
        $this->fields = $fields;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}