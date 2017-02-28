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
     * @param array $entry
     * @param string $key
     * @return mixed
     */
    public function getValueFromSource(array $entry, string $key)
    {
        return $this->source->getValue($entry, $key);
    }

    public function getEntryLines(Line $line, int $entry): array
    {
        return $this->source->getEntryLines($line, $entry);
    }

    public function getCountEntries(): int
    {
        return $this->source->count();
    }

    public function getEntriesKeys(): array
    {
        return $this->source->getEntriesKeys();
    }

}