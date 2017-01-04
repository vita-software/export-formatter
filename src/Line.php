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
     * @var array
     */
    protected $data;

    /**
     * @var int
     */
    protected $order;

    /**
     * Line constructor.
     * @param Field[] $fields
     * @param array $data
     * @param int $order
     */
    public function __construct(array $fields, array &$data, int $order = 1)
    {
        $this->fields = $fields;
        $this->data = $data;
        $this->order = $order;
    }


    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }


}