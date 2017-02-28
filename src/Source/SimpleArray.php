<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Source;

use Vita\ExportFormatter\Line;
use Vita\ExportFormatter\Source;

/**
 * Class SimpleArray
 * @package Vita\ExportFormatter\Source
 */
class SimpleArray implements Source
{
    /**
     * @var array
     */
    protected $data;

    /**
     * SimpleArray constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param Line $line
     * @param int $entry
     * @return array
     */
    public function getEntryLines(Line $line, int $entry): array
    {
        return $this->data[$entry][$line->getName()];
    }

    /**
     * @param array $entry
     * @param string $key
     * @return mixed|null
     */
    public function getValue(array $entry, string $key)
    {
        return $entry[$key] ?? null;
    }

    public function getEntriesKeys(): array
    {
        return array_keys($this->data);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }

}