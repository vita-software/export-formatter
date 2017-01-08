<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter\Exception;

use LogicException;

/**
 * Class EmptyFieldsException
 * @package Vita\ExportFormatter\Exception
 */
class EmptyFieldsException extends LogicException
{
    protected $message = 'Fields must be passed to factory.';
}