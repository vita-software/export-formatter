<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Converter;

use Vita\ExportFormatter\Archive;

/**
 * Interface Converter
 * @package Vita\ExportFormatter\Converter
 */
interface Converter
{

    /**
     * @param Archive $archive
     * @return string
     */
    public function converter(Archive $archive): string;
}