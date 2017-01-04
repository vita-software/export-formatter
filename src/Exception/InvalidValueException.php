<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Exception;

use InvalidArgumentException;

class InvalidValueException extends InvalidArgumentException
{
    protected $message = 'O valor informado é inválido';
}