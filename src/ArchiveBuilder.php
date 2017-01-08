<?php
declare(strict_types = 1);

namespace Vita\ExportFormatter;

use Symfony\Component\Yaml\Parser;
use Vita\ExportFormatter\Exception\EmptyFieldsException;
use Vita\ExportFormatter\Exception\EmptySeparatorException;
use Vita\ExportFormatter\Exception\EmptyTypesException;
use Vita\ExportFormatter\Exception\InvalidSeparatorException;
use Vita\ExportFormatter\Exception\InvalidTypeException;

/**
 * Class ArchiveBuilder
 * @package Vita\ExportFormatter
 */
class ArchiveBuilder
{

    /**
     * @var Parser
     */
    protected $parser;

    /**
     * @var Type[]
     */
    protected $types = [];

    /**
     * @var Line[]
     */
    protected $lines = [];

    /**
     * @var Separator
     */
    protected $separator;

    /**
     * Factory constructor.
     * @param Parser $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param string $configFile
     */
    public function setConfig(string $configFile)
    {
        $data = $this->parser->parse(file_get_contents($configFile));

        if (empty($data['separator'])) {
            throw new EmptySeparatorException();
        }

        if (empty($data['types'])) {
            throw new EmptyTypesException();
        }


        $this->types = $this->createTypes($data['types']);
        $this->separator = $this->createSeparator($data['separator']);
    }

    public function addLine(string $lineFile, array $data): void
    {
        $configLine = $this->parser->parse(file_get_contents($lineFile));

        if (empty($configLine['fields'])) {
            throw new EmptyFieldsException();
        }

        $fields = $this->createFields($configLine['fields']);

        $this->lines[] = new Line($fields, $data, count($this->lines) + 1);
    }

    public function build() : Archive
    {
        return new Archive($this->separator, $this->lines);
    }

    /**
     * Create a separator from a string name. The separator must exists in Separator namespace.
     * @param string $name
     * @return Separator
     */
    protected function createSeparator(string $name) : Separator
    {
        $className = __NAMESPACE__ . '\\Separator\\' . ucfirst($name);

        if (!class_exists($className)) {
            throw new InvalidSeparatorException();
        }

        return new $className;
    }

    /**
     * Create types
     * @param array $typesData
     * @return Type[]
     */
    protected function createTypes(array $typesData) : array
    {
        $types = [];

        foreach($typesData as $name => $typeData) {
            $className = __NAMESPACE__ . '\\Type\\' . ucfirst($typeData['type']);

            if (!class_exists($className)) {
                throw new InvalidTypeException();
            }

            $constructData = array_values($typeData['params'] ?? []);

            $types[$name] = new $className(...$constructData);
        }

        return $types;
    }

    /**
     * @param array $fieldsData
     * @return Field[]
     */
    protected function createFields(array $fieldsData) : array
    {
        $fields = [];

        $sequence = 1;

        foreach ($fieldsData as $name => $fieldData) {
            $length = new Length(...array_values($fieldData['length']));
            $type = $this->types[$fieldData['type']];
            $options = $fieldData['options'] ?? [];
            $fields[] = new Field($name, $sequence, $type, $length, $options);
            $sequence++;
        }

        return $fields;
    }
}