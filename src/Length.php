<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

/**
 * Class Length
 * @package Vita\ExportFormatter
 */
class Length
{

    /**
     * @var int
     */
    protected $minimum;

    /**
     * @var int
     */
    protected $maximum;

    /**
     * Length constructor.
     * @param int $minimum
     * @param int|null $maximum
     */
    public function __construct(int $minimum, int $maximum = null)
    {
        $this->minimum = $minimum;
        $this->maximum = $maximum ?? $minimum;
    }

    /**
     * @return int
     */
    public function getMinimum(): int
    {
        return $this->minimum;
    }

    /**
     * @return int
     */
    public function getMaximum(): int
    {
        return $this->maximum;
    }


}