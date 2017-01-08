<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Exception;

use LogicException;

/**
 * Class EmptySeparatorException
 * @package Vita\ExportFormatter\Exception
 */
class EmptySeparatorException extends LogicException
{
    protected $message = 'Separator must be passed to factory';
}