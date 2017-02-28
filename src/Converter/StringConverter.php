<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Converter;

use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Group;

/**
 * Class StringConverter
 * @package Vita\ExportFormatter\Converter
 */
class StringConverter implements Converter
{

    public function converter(Archive $archive): string
    {
        $lines = [];

        foreach ($archive->getGroups() as $group) {
            $lines = array_merge($lines, $this->createLines($archive, $group));
        }

        return implode($archive->getNewLineCharacter(), $lines);
    }

    protected function createLines(Archive $archive, Group $group): array
    {
        $newLines = [];

        foreach ($group->getEntriesKeys() as $entry) {
            $lineData = [];
            foreach ($group->getLines() as $line) {
                $entryLines = $group->getEntryLines($line, $entry);
                foreach ($entryLines as $entryLine) {
                    foreach ($line->getFields() as $field) {
                        $lineData[] = $field->getValueFromData($archive, $group, $entryLine);
                    }
                    $newLines[] = implode($archive->getSeparatorCharacter(), $lineData);
                }
            }
        }

        return $newLines;
    }
}