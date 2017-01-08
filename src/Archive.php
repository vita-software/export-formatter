<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

/**
 * Class Archive
 * @package Vita\ExportFormatter
 */
class Archive
{

    /**
     * @var Separator
     */
    protected $separator;

    /**
     * @var Group[]
     */
    protected $groups;

    /**
     * Archive constructor.
     * @param Separator $separator
     * @param Group[] $groups
     */
    public function __construct(Separator $separator, array $groups)
    {
        $this->separator = $separator;
        $this->groups = $groups;
    }

    /**
     * @return Separator
     */
    public function getSeparator(): Separator
    {
        return $this->separator;
    }

    /**
     * @return Group[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    public function getNewLineCharacter(): string
    {
        return $this->separator->getNewLineCharacter();
    }

    /**
     * @return bool
     */
    public function isFixed(): bool
    {
        return $this->separator->isFixed();
    }

    /**
     * @return string
     */
    public function getSeparatorCharacter(): string
    {
        return $this->separator->getSeparator();
    }
}