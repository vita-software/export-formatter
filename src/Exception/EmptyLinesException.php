<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Exception;

use LogicException;

/**
 * Class EmptyLinesException
 * @package Vita\ExportFormatter\Exception
 */
class EmptyLinesException extends LogicException
{
    protected $message = 'Lines must be passed.';
}