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
     * @var Source
     */
    protected $source;

    /**
     * Group constructor.
     * @param Line[] $lines
     * @param Source $source
     */
    public function __construct(array $lines, Source $source)
    {
        $this->lines = $lines;
        $this->source = $source;
    }


    /**
     * @return Line[]
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @param int $entry
     * @param string $key
     * @return mixed
     */
    public function getValueFromSource(int $entry, string $key)
    {
        return $this->source->getValue($entry, $key);
    }

    public function getCountEntries(): int
    {
        return $this->source->count();
    }

}