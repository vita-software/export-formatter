<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Exception;

use LogicException;

/**
 * Class EmptyTypesException
 * @package Vita\ExportFormatter\Exception
 */
class EmptyTypesException extends LogicException
{
    protected $message = 'Types must be passed to factory.';
}