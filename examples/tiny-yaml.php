<?php
declare(strict_types = 1);

use Vita\ExportFormatter\Factory;
use Symfony\Component\Yaml\Parser;
use Vita\ExportFormatter\Converter\StringConverter;

require_once __DIR__ . '/../vendor/autoload.php';

$parser = new Parser();
$factory = new Factory($parser);

$archive = $factory->factory(__DIR__ . '/data/tests.yml');

$stringConverter = new StringConverter();
echo $stringConverter->converter($archive);