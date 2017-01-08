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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @return Length
     */
    public function getLength(): Length
    {
        return $this->length;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function getValueFromGroup(int $entry, Group $group, Archive $archive)
    {
        $value = $group->getValueFromSource($entry, $this->name);

        return $this->type->mask($archive, $this, $value);
    }

    public function getMaximumLength(): int
    {
        return $this->length->getMaximum();
    }

    public function getMinimumLength(): int
    {
        return $this->length->getMinimum();
    }
}