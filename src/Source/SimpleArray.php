<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Source;

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
     * @param int $entry
     * @param string $key
     * @return mixed|null
     */
    public function getValue(int $entry, string $key)
    {
        return $this->data[$entry][$key] ?? null;
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