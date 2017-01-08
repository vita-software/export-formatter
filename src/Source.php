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
     * @param int $entry
     * @param string $key
     * @return mixed
     */
    public function getValue(int $entry, string $key);

    /**
     * @return array
     */
    public function getEntriesKeys() : array;

    /**
     * @return int
     */
    public function count() : int;
}