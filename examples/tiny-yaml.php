<?php
declare(strict_types = 1);

use Vita\ExportFormatter\ArchiveBuilder;
use Symfony\Component\Yaml\Parser;
use Vita\ExportFormatter\Converter\StringConverter;
use Vita\ExportFormatter\Source\SimpleArray;

require_once __DIR__ . '/../vendor/autoload.php';

$parser = new Parser();
$builder = new ArchiveBuilder($parser);

$builder->setConfig(__DIR__ . '/yaml/config.yml');
$builder->addGroup(__DIR__ . '/yaml/line-test.yml', new SimpleArray(include_once __DIR__ . '/yaml/data.php'));
$archive = $builder->build();

$stringConverter = new StringConverter();
echo $stringConverter->converter($archive);