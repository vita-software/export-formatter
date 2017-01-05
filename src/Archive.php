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
     * @var Line[]
     */
    protected $lines;

    /**
     * @var bool
     */
    protected $ordered;

    /**
     * Archive constructor.
     * @param Separator $separator
     * @param Line[] $lines
     * @param bool $ordered
     */
    public function __construct(Separator $separator, array $lines, bool $ordered = false)
    {
        $this->separator = $separator;
        $this->lines = $lines;
        $this->ordered = $ordered;
    }

    /**
     * @return Separator
     */
    public function getSeparator(): Separator
    {
        return $this->separator;
    }

    /**
     * @return Line[]
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    public function getNewLineCharacter() : string
    {
        return $this->separator->getNewLineCharacter();
    }

    public function isFixed() : bool
    {
        return $this->separator->isFixed();
    }

    public function getSeparatorCharacter() : string
    {
        return $this->separator->getSeparator();
    }
}