<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

use Symfony\Component\Yaml\Parser;

/**
 * Class Factory
 * @package Vita\ExportFormatter
 */
class Factory
{

    /**
     * @var Parser
     */
    protected $parser;

    /**
     * Factory constructor.
     * @param Parser $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function factory(string $configFile) : Archive
    {
        $data = $this->parser->parse(file_get_contents($configFile));
        var_dump($data);
        exit;
    }
}