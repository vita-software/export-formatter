<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Converter;

use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Line;
use Vita\ExportFormatter\Separator;

/**
 * Class StringConverter
 * @package Vita\ExportFormatter\Converter
 */
class StringConverter implements Converter
{

    public function converter(Archive $archive) : string
    {
        $lines = [];

        foreach($archive->getLines() as $line) {
            $lines = array_merge($lines, $this->createLines($archive, $line));
        }

        return implode($archive->getNewLineCharacter(), $lines);
    }

    protected function createLines(Archive $archive, Line $line) : array
    {
        $newLines = [];

        foreach ($line->getData() as $data) {
            $test = '';
            foreach ($line->getFields() as $field) {
                $test .= $field->getValueFromData($data, $archive);
            }
            $newLines[] = $test;
        }

        return $newLines;
    }
}