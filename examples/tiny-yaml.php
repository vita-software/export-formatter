<?php
declare(strict_types = 1);

use Vita\ExportFormatter\ArchiveBuilder;
use Symfony\Component\Yaml\Parser;
use Vita\ExportFormatter\Converter\StringConverter;

require_once __DIR__ . '/../vendor/autoload.php';

$parser = new Parser();
$builder = new ArchiveBuilder($parser);

$builder->setConfig(__DIR__ . '/yaml/config.yml');
$builder->addLine(__DIR__ . '/yaml/line-test.yml', include_once __DIR__ . '/yaml/data.php');
$archive = $builder->build();

$stringConverter = new StringConverter();
echo $stringConverter->converter($archive);