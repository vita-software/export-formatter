<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

/**
 * Class Field
 * @package Vita\ExportFormatter
 */
class Field
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $sequence;

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

    /**
     * Field constructor.
     * @param string $name
     * @param int $sequence
     * @param Type $type
     * @param Length $length
     * @param array $options
     */
    public function __construct(string $name, int $sequence, Type $type, Length $length, array $options = [])
    {
        $this->name = $name;
        $this->sequence = $sequence;
        $this->type = $type;
        $this->length = $length;
        $this->options = $options;
    }

    public function getValueFromData(array $data, Separator $separator)
    {
        $value = $data[$this->name] ?? null;

        if (!$this->type->isValid($this, $value)) {
            throw new
        }
        if ($separator->isFixed()) {

        }
        return $data[$this->name];
    }

}