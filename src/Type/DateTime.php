<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Type;


use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Exception\InvalidTypeException;
use Vita\ExportFormatter\Field;
use Vita\ExportFormatter\Type;
use DateTime as NativeDateTime;

class DateTime implements Type
{
    const DATE_TIME = 'date_time';

    /**
     * @var string
     */
    protected $fromFormat;

    /**
     * @var string
     */
    protected $toFormat;

    /**
     * DateTime constructor.
     * @param string $fromFormat
     * @param string $toFormat
     */
    public function __construct(string $fromFormat, string $toFormat)
    {
        $this->fromFormat = $fromFormat;
        $this->toFormat = $toFormat;
    }


    public function getName(): string
    {
        return static::DATE_TIME;
    }

    public function isValid(Field $field, $value): bool
    {
        return (false !== $this->createDateTime($value));
    }

    public function mask(Archive $archive, Field $field, $value): string
    {
        if (!$this->isValid($field, $value)) {
            throw new InvalidTypeException();
        }

        return $this->createDateTime($value)->format($this->toFormat);
    }

    /**
     * @param mixed $value
     * @return bool|NativeDateTime
     */
    protected function createDateTime($value)
    {
        return NativeDateTime::createFromFormat('!' . $this->fromFormat, $value);
    }
}