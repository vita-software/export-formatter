<?php
declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

use Vita\ExportFormatter\Length;
use Vita\ExportFormatter\Type;
use Vita\ExportFormatter\Field;
use Vita\ExportFormatter\Line;
use Vita\ExportFormatter\Archive;
use Vita\ExportFormatter\Separator;
use Vita\ExportFormatter\Converter\StringConverter;
use Vita\ExportFormatter\Group;

$typeText = new Type\Text();
$typeNumeric = new Type\Numeric(0);
$separatorSemicolon = new Separator\Semicolon();

$fields = [];
$fields[] = new Field('id', 1, $typeNumeric, new Length(1, 10));
$fields[] = new Field('serie', 2, $typeNumeric, new Length(3, 5));
$fields[] = new Field('numero', 2, $typeNumeric, new Length(3, 5));

$data = [
    [
        'id' => 134,
        'serie' => 2,
        'numero' => 12345,
    ],
    [
        'id' => 135,
        'serie' => 2,
        'numero' => 12346,
    ],
];

$lines = [];
$lines[] = new Line($fields, $data);
$groups = [new Group($lines, $data)];

$archive = new Archive($separatorSemicolon, $groups);

$stringConverter = new StringConverter();
echo $stringConverter->converter($archive);