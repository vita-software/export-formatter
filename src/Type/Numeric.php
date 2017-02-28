<?php
declare(strict_types = 0);

namespace Vita\ExportFormatter\Type;

use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Field;
use Vita\ExportFormatter\Type;

/**
 * Class Numeric
 * @package Vita\ExportFormatter\Type
 */
class Numeric implements Type
{
    const NUMERIC = 'numeric';

    /**
     * @var int
     */
    protected $precision;

    /**
     * @var string
     */
    protected $decimalSeparator;

    /**
     * @var string
     */
    protected $thousandSeparator;

    /**
     * Numeric constructor.
     * @param int $precision
     * @param string $decimalSeparator
     * @param string $thousandSeparator
     */
    public function __construct(int $precision = 2, string $decimalSeparator = '.', string $thousandSeparator = '')
    {
        $this->precision = $precision;
        $this->decimalSeparator = $decimalSeparator;
        $this->thousandSeparator = $thousandSeparator;
    }

    /**
     * @return int
     */
    public function getPrecision(): int
    {
        return $this->precision;
    }

    /**
     * @return string
     */
    public function getDecimalSeparator(): string
    {
        return $this->decimalSeparator;
    }

    /**
     * @return string
     */
    public function getThousandSeparator(): string
    {
        return $this->thousandSeparator;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::NUMERIC;
    }

    public function isValid(Field $field, $value): bool
    {
        if (!is_numeric($value)) {
            return false;
        }

        return true;
    }

    public function mask(Archive $archive, Field $field, $value): string
    {
        $value = number_format((float)$value, $this->precision, $this->decimalSeparator, $this->thousandSeparator);

        if ($archive->isFixed()) {
            $diffLength = $field->getMaximumLength() - strlen($value);
            if (0 < $diffLength) {
                $value = str_repeat('0', $diffLength) . $value;
            }
        }

        return $value;
    }

}