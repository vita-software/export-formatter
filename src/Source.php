<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

/**
 * Interface Source
 * @package Vita\ExportFormatter
 */
interface Source
{

    /**
     * @param array $entry
     * @param string $key
     * @return mixed
     */
    public function getValue(array $entry, string $key);

    /**
     * @param Line $line
     * @param int $entry
     * @return array
     */
    public function getEntryLines(Line $line, int $entry): array;

    /**
     * @return array
     */
    public function getEntriesKeys(): array;

    /**
     * @return int
     */
    public function count(): int;
}